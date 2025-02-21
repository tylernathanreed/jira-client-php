<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SecuritySchemeWithProjectsDoc
final readonly class SecuritySchemeWithProjects extends Dto
{
    public function __construct(
        /** The ID of the issue security scheme. */
        public int $id,

        /** The name of the issue security scheme. */
        public string $name,

        /** The URL of the issue security scheme. */
        public string $self,

        /** The default level ID of the issue security scheme. */
        public ?int $defaultLevel = null,

        /** The description of the issue security scheme. */
        public ?string $description = null,

        /**
         * The list of project IDs associated with the issue security scheme.
         * 
         * @var ?list<int>
         */
        public ?array $projectIds = null,
    ) {
    }
}
