<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FoundGroupDoc
final readonly class FoundGroup extends Dto
{
    public function __construct(
        /**
         * The ID of the group, which uniquely identifies the group across all Atlassian products.
         * For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
         */
        public ?string $groupId = null,

        /** The group name with the matched query string highlighted with the HTML bold tag. */
        public ?string $html = null,

        public ?array $labels = null,

        /**
         * The name of the group.
         * The name of a group is mutable, to reliably identify a group use ``groupId`.`
         */
        public ?string $name = null,
    ) {
    }
}
