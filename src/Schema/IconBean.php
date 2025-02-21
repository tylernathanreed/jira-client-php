<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IconBeanDoc
final readonly class IconBean extends Dto
{
    public function __construct(
        /** The URL of the tooltip, used only for a status icon. */
        public ?string $link = null,

        /** The title of the icon, for use as a tooltip on the icon. */
        public ?string $title = null,

        /** The URL of a 16x16 pixel icon. */
        public ?string $url16x16 = null,
    ) {
    }
}
