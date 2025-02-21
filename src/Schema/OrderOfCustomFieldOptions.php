<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An ordered list of custom field option IDs and information on where to move them. */
final readonly class OrderOfCustomFieldOptions extends Dto
{
    public function __construct(
        /**
         * A list of IDs of custom field options to move.
         * The order of the custom field option IDs in the list is the order they are given after the move.
         * The list must contain custom field options or cascading options, but not both.
         * 
         * @var list<string>
         */
        public array $customFieldOptionIds,

        /**
         * The ID of the custom field option or cascading option to place the moved options after.
         * Required if `position` isn't provided.
         */
        public ?string $after = null,

        /**
         * The position the custom field options should be moved to.
         * Required if `after` isn't provided.
         * 
         * @var 'First'|'Last'|null
         */
        public ?string $position = null,
    ) {
    }
}
