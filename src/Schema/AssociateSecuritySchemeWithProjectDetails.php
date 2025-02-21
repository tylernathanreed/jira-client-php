<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AssociateSecuritySchemeWithProjectDetailsDoc
final readonly class AssociateSecuritySchemeWithProjectDetails extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $projectId,

        /**
         * The ID of the issue security scheme.
         * Providing null will clear the association with the issue security scheme.
         */
        public string $schemeId,

        /**
         * The list of scheme levels which should be remapped to new levels of the issue security scheme.
         * 
         * @var ?list<OldToNewSecurityLevelMappingsBean>
         */
        public ?array $oldToNewSecurityLevelMappings = null,
    ) {
    }
}
