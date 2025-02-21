<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueMultipleOptionDoc
final readonly class CustomFieldContextDefaultValueMultipleOption extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /**
         * The list of IDs of the default options.
         * 
         * @var list<string>
         */
        public array $optionIds,

        public string $type,
    ) {
    }
}
