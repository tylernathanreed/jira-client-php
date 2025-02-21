<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of editable field details. */
final readonly class IssueUpdateMetadata extends Dto
{
    public function __construct(
        public ?FieldMetadata $fields = null,
    ) {
    }
}
