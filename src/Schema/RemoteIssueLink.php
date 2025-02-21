<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RemoteIssueLinkDoc
final readonly class RemoteIssueLink extends Dto
{
    public function __construct(
        /** Details of the remote application the linked item is in. */
        public ?Application $application = null,

        /** The global ID of the link, such as the ID of the item on the remote system. */
        public ?string $globalId = null,

        /** The ID of the link. */
        public ?int $id = null,

        /** Details of the item linked to. */
        public ?RemoteObject $object = null,

        /** Description of the relationship between the issue and the linked item. */
        public ?string $relationship = null,

        /** The URL of the link. */
        public ?string $self = null,
    ) {
    }
}
