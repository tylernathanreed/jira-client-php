<?php

namespace App\Exceptions;

class ReservedWordException extends ClassGenerationException
{
    public function __construct(string $name)
    {
        return parent::__construct("The name [{$name}] is reserved by PHP.");
    }
}
