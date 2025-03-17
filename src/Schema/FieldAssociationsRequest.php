<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of field associations with projects. */
final readonly class FieldAssociationsRequest extends Dto
{
    public function __construct(
        /**
         * Contexts to associate/unassociate the fields with.
         * 
         * @var list<AssociationContextObject>
         */
        public array $associationContexts,

        /**
         * Fields to associate/unassociate with projects.
         * 
         * @var list<FieldIdentifierObject>
         */
        public array $fields,
    ) {
    }
}
