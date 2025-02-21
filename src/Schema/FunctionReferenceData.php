<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of functions that can be used in advanced searches. */
final readonly class FunctionReferenceData extends Dto
{
    public function __construct(
        /** The display name of the function. */
        public ?string $displayName = null,

        /**
         * Whether the function can take a list of arguments.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $isList = null,

        /**
         * Whether the function supports both single and list value operators.
         * 
         * @var 'true'|'false'|null
         */
        public ?string $supportsListAndSingleValueOperators = null,

        /**
         * The data types returned by the function.
         * 
         * @var ?list<string>
         */
        public ?array $types = null,

        /** The function identifier. */
        public ?string $value = null,
    ) {
    }
}
