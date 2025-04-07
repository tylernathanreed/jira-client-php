<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class Error extends Dto
{
    public function __construct(
        public ?int $count = null,

        /** @var ?list<string> */
        public ?array $issueIdsOrKeys = null,

        public ?string $message = null,
    ) {
    }
}
