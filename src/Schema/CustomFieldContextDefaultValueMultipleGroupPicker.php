<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a multiple group picker custom field. */
final readonly class CustomFieldContextDefaultValueMultipleGroupPicker extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /**
         * The IDs of the default groups.
         * 
         * @var list<string>
         */
        public array $groupIds,

        public string $type,
    ) {
    }

}
