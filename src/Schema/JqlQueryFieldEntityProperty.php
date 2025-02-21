<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryFieldEntityPropertyDoc
final readonly class JqlQueryFieldEntityProperty extends Dto
{
    public function __construct(
        /**
         * The object on which the property is set.
         * 
         * @example 'issue'
         */
        public string $entity,

        /**
         * The key of the property.
         * 
         * @example 'stats'
         */
        public string $key,

        /**
         * The path in the property value to query.
         * 
         * @example 'comments.count'
         */
        public string $path,

        /**
         * The type of the property value extraction.
         * Not available if the extraction for the property is not registered on the instance with the "Entity property" module.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/modules/entity-property/
         * 
         * @var 'number'|'string'|'text'|'date'|'user'|null
         * 
         * @example 'number'
         */
        public ?string $type = null,
    ) {
    }
}
