<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraUrlField extends Dto
{
    public function __construct(
        public string $fieldId,

        public string $url,
    ) {
    }
}
