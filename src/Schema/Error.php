<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ErrorDoc
final readonly class Error extends Dto
{
    public function __construct(
        public ?int $count = null,

        public ?array $issueIdsOrKeys = null,

        public ?string $message = null,
    ) {
    }
}
