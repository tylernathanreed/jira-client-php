<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraUrlField extends Dto
{
    public function __construct(
        public string $fieldId,

        public string $url,
    ) {
    }
}
