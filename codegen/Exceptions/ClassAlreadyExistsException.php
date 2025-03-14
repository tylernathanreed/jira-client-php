<?php

namespace Jira\CodeGen\Exceptions;

class ClassAlreadyExistsException extends ClassGenerationException
{
    public function __construct(string $type, string $name)
    {
        parent::__construct("The {$type} [{$name}] already exists.");
    }
}
