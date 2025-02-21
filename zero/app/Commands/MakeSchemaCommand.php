<?php

namespace App\Commands;

use App\Generators\Generator;
use App\Generators\SchemaGenerator;

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
