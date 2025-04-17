<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraNumberField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?float $value = null,
    ) {
    }
}
