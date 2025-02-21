<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateCustomFieldContextDoc
final readonly class CreateCustomFieldContext extends Dto
{
    public function __construct(
        /** The name of the context. */
        public string $name,

        /** The description of the context. */
        public ?string $description = null,

        /** The ID of the context. */
        public ?string $id = null,

        /**
         * The list of issue types IDs for the context.
         * If the list is empty, the context refers to all issue types.
         * 
         * @var ?list<string>
         */
        public ?array $issueTypeIds = null,

        /**
         * The list of project IDs associated with the context.
         * If the list is empty, the context is global.
         * 
         * @var ?list<string>
         */
        public ?array $projectIds = null,
    ) {
    }
}
