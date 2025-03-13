<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait PermissionSchemes
{
    /**
     * Returns all permission schemes
     * 
     * ### About permission schemes and grants ###
     * 
     * A permission scheme is a collection of permission grants.
     * A permission grant consists of a `holder` and a `permission`
     * 
     * #### Holder object ####
     * 
     * The `holder` object contains information about the user or group being granted the permission.
     * For example, the *Administer projects* permission is granted to a group named *Teams in space administrators*.
     * In this case, the type is `"type": "group"`, and the parameter is the group name, `"parameter": "Teams in space administrators"` and the value is group ID, `"value": "ca85fac0-d974-40ca-a615-7af99c48d24f"`
     * 
     * The `holder` object is defined by the following properties:
     * 
     *  - `type` Identifies the user or group (see the list of types below)
     *  - `parameter` As a group's name can change, use of `value` is recommended.
     * The value of this property depends on the `type`.
     * For example, if the `type` is a group, then you need to specify the group name
     *  - `value` The value of this property depends on the `type`.
     * If the `type` is a group, then you need to specify the group ID.
     * For other `type` it has the same value as `parameter`
     * 
     * The following `types` are available.
     * The expected values for `parameter` and `value` are given in parentheses (some types may not have a `parameter` or `value`):
     * 
     *  - `anyone` Grant for anonymous users
     *  - `applicationRole` Grant for users with access to the specified application (application name, application name).
     * See "Update product access settings" for more information
     *  - `assignee` Grant for the user currently assigned to an issue
     *  - `group` Grant for the specified group (`parameter` : group name, `value` : group ID)
     *  - `groupCustomField` Grant for a user in the group selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID)
     *  - `projectLead` Grant for a project lead
     *  - `projectRole` Grant for the specified project role (`parameter` :project role ID, `value` : project role ID)
     *  - `reporter` Grant for the user who reported the issue
     *  - `sd.customer.portal.only` Jira Service Desk only.
     * Grants customers permission to access the customer portal but not Jira.
     * See "Customizing Jira Service Desk permissions" for more information
     *  - `user` Grant for the specified user (`parameter` : user ID - historically this was the userkey but that is deprecated and the account ID should be used, `value` : user ID)
     *  - `userCustomField` Grant for a user selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID)
     * 
     * #### Built-in permissions ####
     * 
     * The "built-in Jira permissions" are listed below.
     * Apps can also define custom permissions.
     * See the "project permission" and "global permission" module documentation for more information
     * 
     * **Administration permissions**
     * 
     *  - `ADMINISTER_PROJECTS`
     *  - `EDIT_WORKFLOW`
     *  - `EDIT_ISSUE_LAYOUT`
     * 
     * **Project permissions**
     * 
     *  - `BROWSE_PROJECTS`
     *  - `MANAGE_SPRINTS_PERMISSION` (Jira Software only)
     *  - `SERVICEDESK_AGENT` (Jira Service Desk only)
     *  - `VIEW_DEV_TOOLS` (Jira Software only)
     *  - `VIEW_READONLY_WORKFLOW`
     * 
     * **Issue permissions**
     * 
     *  - `ASSIGNABLE_USER`
     *  - `ASSIGN_ISSUES`
     *  - `CLOSE_ISSUES`
     *  - `CREATE_ISSUES`
     *  - `DELETE_ISSUES`
     *  - `EDIT_ISSUES`
     *  - `LINK_ISSUES`
     *  - `MODIFY_REPORTER`
     *  - `MOVE_ISSUES`
     *  - `RESOLVE_ISSUES`
     *  - `SCHEDULE_ISSUES`
     *  - `SET_ISSUE_SECURITY`
     *  - `TRANSITION_ISSUES`
     * 
     * **Voters and watchers permissions**
     * 
     *  - `MANAGE_WATCHERS`
     *  - `VIEW_VOTERS_AND_WATCHERS`
     * 
     * **Comments permissions**
     * 
     *  - `ADD_COMMENTS`
     *  - `DELETE_ALL_COMMENTS`
     *  - `DELETE_OWN_COMMENTS`
     *  - `EDIT_ALL_COMMENTS`
     *  - `EDIT_OWN_COMMENTS`
     * 
     * **Attachments permissions**
     * 
     *  - `CREATE_ATTACHMENTS`
     *  - `DELETE_ALL_ATTACHMENTS`
     *  - `DELETE_OWN_ATTACHMENTS`
     * 
     * **Time tracking permissions**
     * 
     *  - `DELETE_ALL_WORKLOGS`
     *  - `DELETE_OWN_WORKLOGS`
     *  - `EDIT_ALL_WORKLOGS`
     *  - `EDIT_OWN_WORKLOGS`
     *  - `WORK_ON_ISSUES`
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://confluence.atlassian.com/x/3YxjL
     * @link https://confluence.atlassian.com/x/24dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/
     * 
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are included when you specify any value.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function getAllPermissionSchemes(
        ?string $expand = null,
    ): Schema\PermissionSchemes {
        return $this->call(
            uri: '/rest/api/3/permissionscheme',
            method: 'get',
            query: compact('expand'),
            success: 200,
            schema: Schema\PermissionSchemes::class,
        );
    }

    /**
     * Creates a new permission scheme.
     * You can create a permission scheme with or without defining a set of permission grants
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are always included when you specify any value.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function createPermissionScheme(
        Schema\PermissionScheme $request,
        ?string $expand = null,
    ): Schema\PermissionScheme {
        return $this->call(
            uri: '/rest/api/3/permissionscheme',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 201,
            schema: Schema\PermissionScheme::class,
        );
    }

    /**
     * Returns a permission scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $schemeId The ID of the permission scheme to return.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are included when you specify any value.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function getPermissionScheme(
        int $schemeId,
        ?string $expand = null,
    ): Schema\PermissionScheme {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}',
            method: 'get',
            query: compact('expand'),
            path: compact('schemeId'),
            success: 200,
            schema: Schema\PermissionScheme::class,
        );
    }

    /**
     * Updates a permission scheme.
     * Below are some important things to note when using this resource:
     * 
     *  - If a permissions list is present in the request, then it is set in the permission scheme, overwriting *all existing* grants
     *  - If you want to update only the name and description, then do not send a permissions list in the request
     *  - Sending an empty list will remove all permission grants from the permission scheme
     * 
     * If you want to add or delete a permission grant instead of updating the whole list, see "Create permission grant" or "Delete permission scheme entity"
     * 
     * See "About permission schemes and grants" for more details
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link ../api-group-permission-schemes/#about-permission-schemes-and-grants
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The ID of the permission scheme to update.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are always included when you specify any value.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function updatePermissionScheme(
        Schema\PermissionScheme $request,
        int $schemeId,
        ?string $expand = null,
    ): Schema\PermissionScheme {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}',
            method: 'put',
            body: $request,
            query: compact('expand'),
            path: compact('schemeId'),
            success: 200,
            schema: Schema\PermissionScheme::class,
        );
    }

    /**
     * Deletes a permission scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The ID of the permission scheme being deleted.
     */
    public function deletePermissionScheme(
        int $schemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}',
            method: 'delete',
            path: compact('schemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns all permission grants for a permission scheme
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $schemeId The ID of the permission scheme.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are always included when you specify any value.
     *                       Expand options include:
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `user` Returns information about the user who is granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `all` Returns all expandable information.
     */
    public function getPermissionSchemeGrants(
        int $schemeId,
        ?string $expand = null,
    ): Schema\PermissionGrants {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}/permission',
            method: 'get',
            query: compact('expand'),
            path: compact('schemeId'),
            success: 200,
            schema: Schema\PermissionGrants::class,
        );
    }

    /**
     * Creates a permission grant in a permission scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The ID of the permission scheme in which to create a new permission grant.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are always included when you specify any value.
     *                       Expand options include:
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `user` Returns information about the user who is granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `all` Returns all expandable information.
     */
    public function createPermissionGrant(
        Schema\PermissionGrant $request,
        int $schemeId,
        ?string $expand = null,
    ): Schema\PermissionGrant {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}/permission',
            method: 'post',
            body: $request,
            query: compact('expand'),
            path: compact('schemeId'),
            success: 201,
            schema: Schema\PermissionGrant::class,
        );
    }

    /**
     * Returns a permission grant
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $schemeId The ID of the permission scheme.
     * @param int $permissionId The ID of the permission grant.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that permissions are always included when you specify any value.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `permissions` Returns all permission grants for each permission scheme
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission.
     */
    public function getPermissionSchemeGrant(
        int $schemeId,
        int $permissionId,
        ?string $expand = null,
    ): Schema\PermissionGrant {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}',
            method: 'get',
            query: compact('expand'),
            path: compact('schemeId', 'permissionId'),
            success: 200,
            schema: Schema\PermissionGrant::class,
        );
    }

    /**
     * Deletes a permission grant from a permission scheme.
     * See "About permission schemes and grants" for more details
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link ../api-group-permission-schemes/#about-permission-schemes-and-grants
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $schemeId The ID of the permission scheme to delete the permission grant from.
     * @param int $permissionId The ID of the permission grant to delete.
     */
    public function deletePermissionSchemeEntity(
        int $schemeId,
        int $permissionId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}',
            method: 'delete',
            path: compact('schemeId', 'permissionId'),
            success: 204,
            schema: true,
        );
    }
}
