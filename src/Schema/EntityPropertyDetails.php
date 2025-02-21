<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class EntityPropertyDetails extends Dto
{
    public function __construct(
        /**
         * The entity property ID.
         * 
         * @example 123
         */
        public float $entityId,

        /**
         * The entity property key.
         * 
         * @example 'mykey'
         */
        public string $key,

        /**
         * The new value of the entity property.
         * 
         * @example 'newValue'
         */
        public string $value,
    ) {
    }
}
