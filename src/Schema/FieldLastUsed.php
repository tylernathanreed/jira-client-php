<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

/** Information about the most recent use of a field. */
final readonly class FieldLastUsed extends Dto
{
    public function __construct(
        /**
         * Last used value type:
         * 
         *  - *TRACKED*: field is tracked and a last used date is available
         *  - *NOT\_TRACKED*: field is not tracked, last used date is not available
         *  - *NO\_INFORMATION*: field is tracked, but no last used date is available.
         * 
         * @var 'TRACKED'|'NOT_TRACKED'|'NO_INFORMATION'|null
         */
        public ?string $type = null,

        /** The date when the value of the field last changed. */
        public ?DateTimeImmutable $value = null,
    ) {
    }
}
