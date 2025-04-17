<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Field mapping for mandatory fields in target */
final class TargetMandatoryFields extends Dto
{
    public function __construct(
        /**
         * Contains the value of mandatory fields
         * 
         * @var array<string,Fields>
         */
        public array $fields,
    ) {
    }
}
