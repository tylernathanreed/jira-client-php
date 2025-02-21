<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PropertyKeysDoc
final readonly class PropertyKeys extends Dto
{
    public function __construct(
        /**
         * Property key details.
         * 
         * @var ?list<PropertyKey>
         */
        public ?array $keys = null,
    ) {
    }
}
