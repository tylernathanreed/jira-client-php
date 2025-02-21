<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of custom field options for a context. */
final readonly class CustomFieldCreatedContextOptionsList extends Dto
{
    public function __construct(
        /**
         * The created custom field options.
         * 
         * @var ?list<CustomFieldContextOption>
         */
        public ?array $options = null,
    ) {
    }
}
