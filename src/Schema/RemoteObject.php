<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The linked item. */
final readonly class RemoteObject extends Dto
{
    public function __construct(
        /** The title of the item. */
        public string $title,

        /** The URL of the item. */
        public string $url,

        /**
         * Details of the icon for the item.
         * If no icon is defined, the default link icon is used in Jira.
         */
        public ?Icon $icon = null,

        /** The status of the item. */
        public ?Status $status = null,

        /** The summary details of the item. */
        public ?string $summary = null,
    ) {
    }
}
