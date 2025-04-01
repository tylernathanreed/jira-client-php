<?php

namespace Jira\CodeGen;

class Utils
{
    public static function slug(string $value): string
    {
        return str_replace(['{', '}'], '', str_replace(['/', '(', ')'], '-', static::kebab($value)));
    }

    public static function kebab(string $value): string
    {
        return static::snake($value, '-');
    }

    public static function snake(string $value, string $delimiter = '_'): string
    {
        return strtolower(
            preg_replace(
                pattern: '/(.)(?=[A-Z])/u',
                replacement: '$1' . $delimiter,
                subject: preg_replace('/\s+/u', '', ucwords($value)) ?: ''
            ) ?: ''
        );
    }

    public static function title(string $value): string
    {
        return mb_convert_case(
            static::snake($value, ' '),
            MB_CASE_TITLE,
            'UTF-8'
        );
    }
}
