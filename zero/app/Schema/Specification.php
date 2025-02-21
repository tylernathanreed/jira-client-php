<?php

namespace App\Schema;

class Specification
{
    protected static ?object $specification = null;

    public static function getSpecification(): object
    {
        return static::$specification ??= static::resolveSpecification();
    }

    protected static function resolveSpecification(): object
    {
        $filepath = 'https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json';

        return json_decode(file_get_contents($filepath));
    }
}
