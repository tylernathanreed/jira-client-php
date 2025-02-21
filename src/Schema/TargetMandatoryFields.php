<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Field mapping for mandatory fields in target */
final readonly class TargetMandatoryFields extends Dto
{
    public function __construct(
        /** Contains the value of mandatory fields */
        public Fields $fields,
    ) {
    }
}
