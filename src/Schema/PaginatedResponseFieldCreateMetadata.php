<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PaginatedResponseFieldCreateMetadataDoc
final readonly class PaginatedResponseFieldCreateMetadata extends Dto
{
    public function __construct(
        public ?int $maxResults = null,

        public ?array $results = null,

        public ?int $startAt = null,

        public ?int $total = null,
    ) {
    }
}
