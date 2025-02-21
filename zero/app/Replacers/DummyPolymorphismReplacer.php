<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\Schema;

class DummyPolymorphismReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        if (! $schema->isPolymorphic()) {
            return str_replace("\n\n    // DummyPolymorphism", '', $stub);
        }

        $map = '';
        $indent = str_repeat(' ', 12);

        foreach ($schema->discriminatorMap as $key => $class) {
            $map .= "{$indent}'{$key}' => {$class}::class,\n";
        }

        $map = rtrim($map, "\n");

        $stub = str_replace("    // DummyPolymorphism\n", <<<DOC
            public static function discriminator(): string
            {
                return '{$schema->discriminatorKey}';
            }

            /** @return array<string,class-string<Dto>> */
            public static function discriminatorMap(): array
            {
                return [
        {$map}
                ];
            }

        DOC, $stub);

        return str_replace(<<<DOC

            public function __construct(

            ) {
            }

        DOC, '', $stub);
    }
}
