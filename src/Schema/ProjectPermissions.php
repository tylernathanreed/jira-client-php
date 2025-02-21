<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectPermissionsDoc
final readonly class ProjectPermissions extends Dto
{
    public function __construct(
        /** Whether the logged user can edit the project. */
        public ?bool $canEdit = null,
    ) {
    }
}
