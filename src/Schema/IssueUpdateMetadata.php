<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A list of editable field details. */
final readonly class IssueUpdateMetadata extends Dto
{
    public function __construct(
        /** @var array<string,FieldMetadata> */
        public ?array $fields = null,
    ) {
    }
}
