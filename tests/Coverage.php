<?php

namespace Tests;

use RuntimeException;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Node\Directory;
use SebastianBergmann\CodeCoverage\Node\File;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Terminal;

final class Coverage
{
    public static function getPath(): string
    {
        return implode(DIRECTORY_SEPARATOR, [
            __DIR__,
            '..',
            '.cache',
            'phpunit',
            'coverage.php',
        ]);
    }

    public static function report(OutputInterface $output, bool $compact = false): float
    {
        $width = (new Terminal)->getWidth();

        $coverage = static::coverage();

        $totalCoverage = $coverage->percentageOfExecutedLines();

        foreach ($coverage->getIterator() as $file) {
            if (! $file instanceof File) {
                continue;
            }

            $dirname = dirname($file->id());
            $basename = basename($file->id(), '.php');

            $name = $dirname === '.' ? $basename : implode(DIRECTORY_SEPARATOR, [
                $dirname,
                $basename,
            ]);

            $percentage = $file->numberOfExecutableLines() === 0
                ? '100.0'
                : number_format($file->percentageOfExecutedLines()->asFloat(), 1, '.', '');

            if ($percentage === '100.0' && $compact) {
                continue;
            }

            $uncoveredLines = '';

            $percentageOfExecutedLinesAsString = $file->percentageOfExecutedLines()->asString();

            if (! in_array($percentageOfExecutedLinesAsString, ['0.00%', '100.00%', '100.0%', ''], true)) {
                $uncoveredLines = trim(implode(', ', self::getMissingCoverage($file)));
            }

            static::writeCoverageLn($output, $name, $uncoveredLines, $percentage, $width);
        }

        $totalCoverageAsString = $totalCoverage->asFloat() === 0.0
            ? '0.0'
            : number_format(floor($totalCoverage->asFloat() * 10) / 10, 1, '.', '');

        $output->writeLn(sprintf(
            '<fg=gray>%s</>',
            '  ' . str_repeat("\u{2581}", $width - 4)
        ));

        $output->writeLn('');
        $output->writeLn(sprintf(
            '<fg=white;options=bold>  %sTotal: %s%%</>',
            str_repeat(' ', $width - strlen('Total: %') - strlen($totalCoverageAsString) - 4),
            $totalCoverageAsString
        ));

        return $totalCoverage->asFloat();
    }

    protected static function writeCoverageLn(
        OutputInterface $output,
        string $name,
        string $uncoveredLines,
        string $percentage,
        int $width,
    ): void {
        $truncateAt = max(1, $width - 12);
        $name = substr($name, 0, $truncateAt);

        $dots = $width - (
            2 + // Margin
            strlen($name) +
            strlen($percentage) +
            2 + // Dot Spacing
            strlen($uncoveredLines) +
            (! empty($uncoveredLines) ? 3 : 0) + // " / "
            1 + // %
            2   // Margin
        );

        $color = $percentage === '100.0' ? 'green' : ($percentage === '0.0' ? 'red' : 'yellow');

        $output->writeLn(strtr('  {name} {dots} {coverage}', [
            '{name}' => $name,
            '{dots}' => '<fg=gray>' . str_repeat('.', $dots) . '</>',
            '{coverage}' => ! empty($uncoveredLines)
                ? "<fg={$color}>{$uncoveredLines}</> <fg=gray>/</> <fg={$color}>{$percentage}%</>"
                : "<fg={$color}>{$percentage}%</>",
        ]));
    }

    /** @return Directory<File|Directory> */
    protected static function coverage(): Directory
    {
        if (! file_exists($reportPath = self::getPath())) {
            throw new RuntimeException(sprintf(
                'Coverage not found in path: %s',
                $reportPath,
            ));
        }

        /** @var CodeCoverage $codeCoverage */
        $codeCoverage = require $reportPath;

        return $codeCoverage->getReport();
    }

    /**
     * @return list<string>
     * @example ['11', '20..25', '50', '60..80']
     */
    protected static function getMissingCoverage(File $file): array
    {
        $shouldBeNewLine = true;

        $eachLine = function (array $array, array $tests, int $line) use (&$shouldBeNewLine): array {
            if ($tests !== []) {
                $shouldBeNewLine = true;

                return $array;
            }

            if ($shouldBeNewLine) {
                $array[] = (string) $line;
                $shouldBeNewLine = false;

                return $array;
            }

            $lastKey = count($array) - 1;

            if (array_key_exists($lastKey, $array) && str_contains((string) $array[$lastKey], '..')) {
                [$from] = explode('..', (string) $array[$lastKey]);
                $array[$lastKey] = $line > $from ? sprintf('%s..%s', $from, $line) : sprintf('%s..%s', $line, $from);

                return $array;
            }

            $array[$lastKey] = sprintf('%s..%s', $array[$lastKey], $line);

            return $array;
        };

        $array = [];
        foreach (array_filter($file->lineCoverageData(), is_array(...)) as $line => $tests) {
            $array = $eachLine($array, $tests, $line);
        }

        return $array;
    }
}
