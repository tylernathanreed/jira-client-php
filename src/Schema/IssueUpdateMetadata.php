<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueUpdateMetadataDoc
final readonly class IssueUpdateMetadata extends Dto
{
    public function __construct(
        public ?FieldMetadata $fields = null,
    ) {
    }
}
