<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraVersionField extends Dto
{
    public function __construct(
        public ?string $versionId = null,
    ) {
    }
}
