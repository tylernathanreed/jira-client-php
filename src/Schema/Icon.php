<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IconDoc
final readonly class Icon extends Dto
{
    public function __construct(
        /**
         * The URL of the tooltip, used only for a status icon.
         * If not set, the status icon in Jira is not clickable.
         */
        public ?string $link = null,

        /**
         * The title of the icon.
         * This is used as follows:
         * 
         *  - For a status icon it is used as a tooltip on the icon.
         * If not set, the status icon doesn't display a tooltip in Jira
         *  - For the remote object icon it is used in conjunction with the application name to display a tooltip for the link's icon.
         * The tooltip takes the format "\[application name\] icon title".
         * Blank itemsare excluded from the tooltip title.
         * If both items are blank, the icon tooltop displays as "Web Link".
         */
        public ?string $title = null,

        /** The URL of an icon that displays at 16x16 pixel in Jira. */
        public ?string $url16x16 = null,
    ) {
    }
}
