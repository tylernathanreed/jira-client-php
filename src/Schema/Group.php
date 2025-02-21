<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GroupDoc
final readonly class Group extends Dto
{
    public function __construct(
        /** Expand options that include additional group details in the response. */
        public ?string $expand = null,

        /**
         * The ID of the group, which uniquely identifies the group across all Atlassian products.
         * For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*.
         */
        public ?string $groupId = null,

        /** The name of group. */
        public ?string $name = null,

        /** The URL for these group details. */
        public ?string $self = null,

        /**
         * A paginated list of the users that are members of the group.
         * A maximum of 50 users is returned in the list, to access additional users append `[start-index:end-index]` to the expand request.
         * For example, to access the next 50 users, use`?expand=users[51:100]`.
         */
        public ?PagedListUserDetailsApplicationUser $users = null,
    ) {
    }
}
