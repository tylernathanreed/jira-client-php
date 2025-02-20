<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class Application extends Dto
{
    public function __construct(
        /**
         * The name of the application.
         * Used in conjunction with the (remote) object icon title to display a tooltip for the link's icon.
         * The tooltip takes the format "\[application name\] icon title".
         * Blank items are excluded from the tooltip title.
         * If both items are blank, the icon tooltop displays as "Web Link".
         * Grouping and sorting of links may place links without an application name last.
         */
        public ?string $name = null,

        /** The name-spaced type of the application, used by registered rendering apps. */
        public ?string $type = null,
    ) {
    }
}
