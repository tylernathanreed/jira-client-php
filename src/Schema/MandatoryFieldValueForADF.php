<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An object notation input */
final readonly class MandatoryFieldValueForADF extends Dto
{
    public function __construct(
        /**
         * Value for each field.
         * Accepts Atlassian Document Format (ADF) for rich text fields like `description`, `environments`.
         * For ADF format details, refer to: "Atlassian Document Format"
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/apis/document/structure
         * 
         * @var array<string,mixed>
         */
        public array $value,

        /**
         * Will treat as `MandatoryFieldValueForADF` if type is `adf`
         * 
         * @var 'adf'|'raw'
         */
        public string $type = 'raw',

        /** If `true`, will try to retain original non-null issue field values on move. */
        public ?bool $retain = true,
    ) {
    }
}
