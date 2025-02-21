<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of custom field options for a context. */
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
