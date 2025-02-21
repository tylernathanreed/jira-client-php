<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusDetailsDoc
final readonly class StatusDetails extends Dto
{
    public function __construct(
        /** The description of the status. */
        public ?string $description = null,

        /** The URL of the icon used to represent the status. */
        public ?string $iconUrl = null,

        /** The ID of the status. */
        public ?string $id = null,

        /** The name of the status. */
        public ?string $name = null,

        /** The scope of the field. */
        public ?Scope $scope = null,

        /** The URL of the status. */
        public ?string $self = null,

        /** The category assigned to the status. */
        public ?StatusCategory $statusCategory = null,
    ) {
    }
}
