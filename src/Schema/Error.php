<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class Error extends Dto
{
    public function __construct(
        public ?int $count = null,

        /** @var ?list<string> */
        public ?array $issueIdsOrKeys = null,

        public ?string $message = null,
    ) {
    }
}
