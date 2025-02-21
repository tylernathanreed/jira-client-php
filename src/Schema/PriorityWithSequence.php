<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PriorityWithSequenceDoc
final readonly class PriorityWithSequence extends Dto
{
    public function __construct(
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

        /** The URL of the issue priority. */
        public ?string $self = null,

        /** The sequence of the issue priority. */
        public ?string $sequence = null,

        /** The color used to indicate the issue priority. */
        public ?string $statusColor = null,
    ) {
    }
}
