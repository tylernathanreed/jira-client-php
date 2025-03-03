<?php

namespace Jira\CodeGen\Generators;

abstract class TestGenerator
{
    public function generate(string $name, bool $force = false): string
    {
        return '';
    }
}
