<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JQLReferenceDataDoc
final readonly class JQLReferenceData extends Dto
{
    public function __construct(
        /**
         * List of JQL query reserved words.
         * 
         * @var ?list<string>
         */
        public ?array $jqlReservedWords = null,

        /**
         * List of fields usable in JQL queries.
         * 
         * @var ?list<FieldReferenceData>
         */
        public ?array $visibleFieldNames = null,

        /**
         * List of functions usable in JQL queries.
         * 
         * @var ?list<FunctionReferenceData>
         */
        public ?array $visibleFunctionNames = null,
    ) {
    }
}
