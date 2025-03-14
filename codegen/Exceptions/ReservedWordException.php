<?php

namespace Jira\CodeGen\Exceptions;

class ReservedWordException extends ClassGenerationException
{
    public function __construct(string $name)
    {
        parent::__construct("The name [{$name}] is reserved by PHP.");
    }
}
