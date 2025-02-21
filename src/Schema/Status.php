<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusDoc
final readonly class Status extends Dto
{
    public function __construct(
        /**
         * Details of the icon representing the status.
         * If not provided, no status icon displays in Jira.
         */
        public ?Icon $icon = null,

        /**
         * Whether the item is resolved.
         * If set to "true", the link to the issue is displayed in a strikethrough font, otherwise the link displays in normal font.
         */
        public ?bool $resolved = null,
    ) {
    }
}
