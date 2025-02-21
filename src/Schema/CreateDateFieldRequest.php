<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateDateFieldRequestDoc
final readonly class CreateDateFieldRequest extends Dto
{
    public function __construct(
        /**
         * The date field type.
         * This must be "DueDate", "TargetStartDate", "TargetEndDate" or "DateCustomField".
         * 
         * @var 'DueDate'|'TargetStartDate'|'TargetEndDate'|'DateCustomField'
         */
        public string $type,

        /**
         * A date custom field ID.
         * This is required if the type is "DateCustomField".
         */
        public ?int $dateCustomFieldId = null,
    ) {
    }
}
