<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraColorField extends Dto
{
    public function __construct(
        public JiraColorInput $color,

        public string $fieldId,
    ) {
    }
}
