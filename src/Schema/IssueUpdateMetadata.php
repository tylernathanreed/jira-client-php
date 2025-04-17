<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A list of editable field details. */
final class IssueUpdateMetadata extends Dto
{
    public function __construct(
        /** @var array<string,FieldMetadata> */
        public ?array $fields = null,
    ) {
    }
}
