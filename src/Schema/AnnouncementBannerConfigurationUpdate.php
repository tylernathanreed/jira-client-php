<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Configuration of the announcement banner. */
final readonly class AnnouncementBannerConfigurationUpdate extends Dto
{
    public function __construct(
        /** Flag indicating if the announcement banner can be dismissed by the user. */
        public ?bool $isDismissible = null,

        /** Flag indicating if the announcement banner is enabled or not. */
        public ?bool $isEnabled = null,

        /** The text on the announcement banner. */
        public ?string $message = null,

        /**
         * Visibility of the announcement banner.
         * Can be public or private.
         */
        public ?string $visibility = null,
    ) {
    }
}
