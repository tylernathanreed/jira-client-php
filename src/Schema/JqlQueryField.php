<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A field used in a JQL query.
 * See "Advanced searching - fields reference" for more information about fields in JQL queries.
 * 
 * @link https://confluence.atlassian.com/x/dAiiLQ
 */
final readonly class JqlQueryField extends Dto
{
    public function __construct(
        /** The name of the field. */
        public string $name,

        /** The encoded name of the field, which can be used directly in a JQL query. */
        public ?string $encodedName = null,

        /**
         * When the field refers to a value in an entity property, details of the entity property value.
         * 
         * @var ?list<JqlQueryFieldEntityProperty>
         */
        public ?array $property = null,
    ) {
    }
}
