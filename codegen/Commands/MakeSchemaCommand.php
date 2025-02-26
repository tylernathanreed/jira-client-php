<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\SchemaGenerator;

class MakeSchemaCommand extends GeneratorCommand
{
    /** @var string */
    protected $name = 'make:schema';

    /** @var string */
    protected $description = 'Generates a new schema class';

    public function generator(): Generator
    {
        return $this->laravel->make(SchemaGenerator::class);
    }
}
