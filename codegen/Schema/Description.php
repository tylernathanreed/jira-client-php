<?php

namespace Jira\CodeGen\Schema;

/**
 * @phpstan-type TDocTag array{0:?string,1:string}
 * @phpstan-type TDocTags list<TDocTag>
 */
final class Description extends AbstractSchema
{
    public function __construct(
        public readonly ?string $description
    ) {
    }

    /** @param TDocTags $tags */
    public function render(int $indent = 0, array $tags = []): ?string
    {
        if (empty($this->description) && empty($tags)) {
            return null;
        }

        $indent = str_repeat(' ', $indent);

        [$lines, $links] = $this->build();

        $content = array_values(array_filter([
            ...array_map(fn($line) => [null, $line], $lines),
            ...array_map(fn($line) => ['link', $line], $links),
            ...$tags,
        ], fn ($tag) => ! is_null($tag[1])));

        if (empty($content)) {
            return null;
        }

        $doc = [];
        $previous = $content[0][0];

        foreach ($content as $line) {
            [$tag, $value] = $line;

            if ($tag != $previous) {
                $doc[] = '';
                $previous = $tag;
            }

            $doc[] = $tag
                ? "@{$tag} {$value}"
                : $value;
        }

        if (count($doc) === 1) {
            return "{$indent}/** {$doc[0]} */\n";
        }

        return $indent . implode("\n" . $indent, [
            '/**',
            ...array_map(fn($d) => " * {$d}", $doc),
            " */\n",
        ]);
    }

    /** @return array{0:list<string>,1:TDocTags} */
    protected function build(): array
    {
        if (is_null($this->description)) {
            return [[], []];
        }

        [$description, $links] = $this->extractLinks($this->description);

        $description = preg_replace(
            ['/\.?(\n+)/', '/\. /', '/ \*  /', '/\*\//'],
            ['$1', ".\n", ' - ', '* /'],
            $description
        );

        $lines = explode("\n", rtrim($description, "\n"));

        return [$lines, $links];
    }

    /** @return array{0:string,1:TDocTags} */
    protected function extractLinks(string $description): array
    {
        $result = preg_match_all('/\[(?<label>[^\]]+)\]\((?<link>[^\)]+)\)/', $description, $matches);

        if (! $result) {
            return [$description, []];
        }

        $links = array_combine($matches['label'], $matches['link']);

        foreach ($links as $label => $link) {
            $description = str_replace("[{$label}]({$link})", "\"{$label}\"", $description);
        }

        $links = array_filter($links, fn($link) => ! str_starts_with($link, '#'));

        return [$description, array_values($links)];
    }
}
