<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the time tracking provider. */
final readonly class TimeTrackingProvider extends Dto
{
    public function __construct(
        /**
         * The key for the time tracking provider.
         * For example, *JIRA*.
         */
        public string $key,

        /**
         * The name of the time tracking provider.
         * For example, *JIRA provided time tracking*.
         */
        public ?string $name = null,

        /**
         * The URL of the configuration page for the time tracking provider app.
         * For example, */example/config/url*.
         * This property is only returned if the `adminPageKey` property is set in the module descriptor of the time tracking provider app.
         */
        public ?string $url = null,
    ) {
    }
}
