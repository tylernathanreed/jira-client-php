<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * An entity property, for more information see "Entity properties".
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/
 */
final readonly class EntityProperty extends Dto
{
    public function __construct(
        /**
         * The key of the property.
         * Required on create and update.
         */
        public ?string $key = null,

        /**
         * The value of the property.
         * Required on create and update.
         */
        public mixed $value = null,
    ) {
    }
}
