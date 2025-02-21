<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue type scheme. */
final readonly class IssueTypeScheme extends Dto
{
    public function __construct(
        /** The ID of the issue type scheme. */
        public string $id,

        /** The name of the issue type scheme. */
        public string $name,

        /** The ID of the default issue type of the issue type scheme. */
        public ?string $defaultIssueTypeId = null,

        /** The description of the issue type scheme. */
        public ?string $description = null,

        /** Whether the issue type scheme is the default. */
        public ?bool $isDefault = null,
    ) {
    }
}
