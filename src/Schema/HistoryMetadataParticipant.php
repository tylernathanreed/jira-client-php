<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of user or system associated with a issue history metadata item. */
final readonly class HistoryMetadataParticipant extends Dto
{
    public function __construct(
        /** The URL to an avatar for the user or system associated with a history record. */
        public ?string $avatarUrl = null,

        /** The display name of the user or system associated with a history record. */
        public ?string $displayName = null,

        /** The key of the display name of the user or system associated with a history record. */
        public ?string $displayNameKey = null,

        /** The ID of the user or system associated with a history record. */
        public ?string $id = null,

        /** The type of the user or system associated with a history record. */
        public ?string $type = null,

        /** The URL of the user or system associated with a history record. */
        public ?string $url = null,
    ) {
    }
}
