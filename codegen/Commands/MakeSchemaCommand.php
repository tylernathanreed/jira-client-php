<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\SchemaGenerator;
use Jira\CodeGen\Schema\Schema;
use Symfony\Component\Console\Attribute\AsCommand;

/** @extends GeneratorCommand<Schema> */
#[AsCommand('make:schema', 'Generates a new schema class')]
class MakeSchemaCommand extends GeneratorCommand
{
    public function generator(): Generator
    {
        return new SchemaGenerator();
    }
}
