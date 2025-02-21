<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateNotificationSchemeDetailsDoc
final readonly class UpdateNotificationSchemeDetails extends Dto
{
    public function __construct(
        /** The description of the notification scheme. */
        public ?string $description = null,

        /**
         * The name of the notification scheme.
         * Must be unique.
         */
        public ?string $name = null,
    ) {
    }
}
