<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueEntityPropertiesDoc
final readonly class IssueEntityProperties extends Dto
{
    public function __construct(
        /**
         * A list of entity property IDs.
         * 
         * @var ?list<int>
         */
        public ?array $entitiesIds = null,

        /** A list of entity property keys and values. */
        public ?JsonNode $properties = null,
    ) {
    }
}
