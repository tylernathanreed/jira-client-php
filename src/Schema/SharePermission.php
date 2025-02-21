<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a share permission for the filter. */
final readonly class SharePermission extends Dto
{
    public function __construct(
        /**
         * The type of share permission:
         * 
         *  - `user` Shared with a user
         *  - `group` Shared with a group.
         * If set in a request, then specify `sharePermission.group` as well
         *  - `project` Shared with a project.
         * If set in a request, then specify `sharePermission.project` as well
         *  - `projectRole` Share with a project role in a project.
         * This value is not returned in responses.
         * It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`
         *  - `global` Shared globally.
         * If set in a request, no other `sharePermission` properties need to be specified
         *  - `loggedin` Shared with all logged-in users.
         * Note: This value is set in a request by specifying `authenticated` as the `type`
         *  - `project-unknown` Shared with a project that the user does not have access to.
         * Cannot be set in a request.
         * 
         * @var 'user'|'group'|'project'|'projectRole'|'global'|'loggedin'|'authenticated'|'project-unknown'
         */
        public string $type,

        /**
         * The group that the filter is shared with.
         * For a request, specify the `groupId` or `name` property for the group.
         * As a group's name can change, use of `groupId` is recommended.
         */
        public ?GroupName $group = null,

        /** The unique identifier of the share permission. */
        public ?int $id = null,

        /**
         * The project that the filter is shared with.
         * This is similar to the project object returned by "Get project" but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.
         *  
         * For a request, specify the `id` for the project.
         */
        public ?Project $project = null,

        /**
         * The project role that the filter is shared with.
         *  
         * For a request, specify the `id` for the role.
         * You must also specify the `project` object and `id` for the project that the role is in.
         */
        public ?ProjectRole $role = null,

        /**
         * The user account ID that the filter is shared with.
         * For a request, specify the `accountId` property for the user.
         */
        public ?UserBean $user = null,
    ) {
    }
}
