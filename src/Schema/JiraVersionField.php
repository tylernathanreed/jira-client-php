<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraVersionField extends Dto
{
    public function __construct(
        public ?string $versionId = null,
    ) {
    }
}
