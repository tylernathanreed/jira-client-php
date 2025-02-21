<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldUpdatedContextOptionsListDoc
final readonly class CustomFieldUpdatedContextOptionsList extends Dto
{
    public function __construct(
        /**
         * The updated custom field options.
         * 
         * @var ?list<CustomFieldOptionUpdate>
         */
        public ?array $options = null,
    ) {
    }
}
