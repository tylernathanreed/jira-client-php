<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraNumberField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?float $value = null,
    ) {
    }
}
