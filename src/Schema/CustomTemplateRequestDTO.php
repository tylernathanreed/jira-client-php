<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The specific request object for creating a project with template. */
final class CustomTemplateRequestDTO extends Dto
{
    public function __construct(
        public ?BoardsPayload $boards = null,

        public ?FieldCapabilityPayload $field = null,

        public ?IssueTypeProjectCreatePayload $issueType = null,

        public ?NotificationSchemePayload $notification = null,

        public ?PermissionPayloadDTO $permissionScheme = null,

        public ?ProjectPayload $project = null,

        public ?RolesCapabilityPayload $role = null,

        public ?ScopePayload $scope = null,

        public ?SecuritySchemePayload $security = null,

        public ?WorkflowCapabilityPayload $workflow = null,
    ) {
    }
}
