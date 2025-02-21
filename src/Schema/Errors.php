<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ErrorsDoc
final readonly class Errors extends Dto
{
    public function __construct(
        public ?Error $issueIsSubtask = null,

        public ?Error $issuesInArchivedProjects = null,

        public ?Error $issuesInUnlicensedProjects = null,

        public ?Error $issuesNotFound = null,

        public ?Error $userDoesNotHavePermission = null,
    ) {
    }
}
