<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TargetMandatoryFieldsDoc
final readonly class TargetMandatoryFields extends Dto
{
    public function __construct(
        /** Contains the value of mandatory fields */
        public Fields $fields,
    ) {
    }
}
