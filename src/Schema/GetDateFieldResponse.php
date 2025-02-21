<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GetDateFieldResponseDoc
final readonly class GetDateFieldResponse extends Dto
{
    public function __construct(
        /**
         * The date field type.
         * This is "DueDate", "TargetStartDate", "TargetEndDate" or "DateCustomField".
         * 
         * @var 'DueDate'|'TargetStartDate'|'TargetEndDate'|'DateCustomField'
         */
        public string $type,

        /**
         * A date custom field ID.
         * This is returned if the type is "DateCustomField".
         */
        public ?int $dateCustomFieldId = null,
    ) {
    }
}
