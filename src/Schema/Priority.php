<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PriorityDoc
final readonly class Priority extends Dto
{
    public function __construct(
        /**
         * The avatarId of the avatar for the issue priority.
         * This parameter is nullable and when set, this avatar references the universal avatar APIs.
         */
        public ?int $avatarId = null,

        /** The description of the issue priority. */
        public ?string $description = null,

        /** The URL of the icon for the issue priority. */
        public ?string $iconUrl = null,

        /** The ID of the issue priority. */
        public ?string $id = null,

        /** Whether this priority is the default. */
        public ?bool $isDefault = null,

        /** The name of the issue priority. */
        public ?string $name = null,

        /** Priority schemes associated with the issue priority. */
        public ?ExpandPrioritySchemePage $schemes = null,

        /** The URL of the issue priority. */
        public ?string $self = null,

        /** The color used to indicate the issue priority. */
        public ?string $statusColor = null,
    ) {
    }
}
