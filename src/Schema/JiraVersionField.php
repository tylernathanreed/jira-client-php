<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraVersionField extends Dto
{
    public function __construct(
        public ?string $versionId = null,
    ) {
    }
}
