<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of projects in which a user is granted permissions. */
final readonly class PermittedProjects extends Dto
{
    public function __construct(
        /**
         * A list of projects.
         * 
         * @var ?list<ProjectIdentifierBean>
         */
        public ?array $projects = null,
    ) {
    }
}
