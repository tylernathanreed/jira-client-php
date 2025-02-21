<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Permissions which a user has on a project. */
final readonly class ProjectPermissions extends Dto
{
    public function __construct(
        /** Whether the logged user can edit the project. */
        public ?bool $canEdit = null,
    ) {
    }
}
