<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AnnouncementBannerConfiguration extends Dto
{
    public function __construct(
        /**
         * Hash of the banner data.
         * The client detects updates by comparing hash IDs.
         */
        public ?string $hashId = null,

        /** Flag indicating if the announcement banner can be dismissed by the user. */
        public ?bool $isDismissible = null,

        /** Flag indicating if the announcement banner is enabled or not. */
        public ?bool $isEnabled = null,

        /** The text on the announcement banner. */
        public ?string $message = null,

        /**
         * Visibility of the announcement banner.
         *
         * @var 'PUBLIC'|'PRIVATE'|null
         */
        public ?string $visibility = null,
    ) {
    }
}
