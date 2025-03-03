<?php

namespace Jira\CodeGen\Contracts;

use Jira\CodeGen\Generators\TestGenerator;

interface SupportsTestGenerator
{
    public function getTestGenerator(): TestGenerator;
}
