<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MandatoryFieldValueDoc
final readonly class MandatoryFieldValue extends Dto
{
    public function __construct(
        /**
         * Value for each field.
         * Provide a `list of strings` for non-ADF fields.
         * 
         * @var list<string>
         */
        public array $value,

        /** If `true`, will try to retain original non-null issue field values on move. */
        public ?bool $retain = 1,

        /**
         * Will treat as `MandatoryFieldValue` if type is `raw` or `empty`
         * 
         * @var 'adf'|'raw'|null
         */
        public ?string $type = 'raw',
    ) {
    }
}
