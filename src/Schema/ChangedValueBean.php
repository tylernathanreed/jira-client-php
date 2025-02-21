<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of names changed in the record event. */
final readonly class ChangedValueBean extends Dto
{
    public function __construct(
        /** The value of the field before the change. */
        public ?string $changedFrom = null,

        /** The value of the field after the change. */
        public ?string $changedTo = null,

        /** The name of the field changed. */
        public ?string $fieldName = null,
    ) {
    }
}
