<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectPermissionSchemes
{
    /**
     * Returns the "issue security scheme" associated with the project
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or the *Administer Projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     */
    public function getProjectIssueSecurityScheme(
        string $projectKeyOrId,
    ): Schema\SecurityScheme {
        return $this->call(
            uri: '/rest/api/3/project/{projectKeyOrId}/issuesecuritylevelscheme',
            method: 'get',
            path: compact('projectKeyOrId'),
            success: 200,
            schema: Schema\SecurityScheme::class,
        );
    }

    /**
     * Gets the "permission scheme" associated with the project
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
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
    public function getAssignedPermissionScheme(
        string $projectKeyOrId,
        ?string $expand = null,
    ): Schema\PermissionScheme {
        return $this->call(
            uri: '/rest/api/3/project/{projectKeyOrId}/permissionscheme',
            method: 'get',
            query: compact('expand'),
            path: compact('projectKeyOrId'),
            success: 200,
            schema: Schema\PermissionScheme::class,
        );
    }

    /**
     * Assigns a permission scheme with a project.
     * See "Managing project permissions" for more information about permission schemes
     * 
     * **"Permissions" required:** *Administer Jira* "global permission"
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
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
    public function assignPermissionScheme(
        Schema\IdBean $request,
        string $projectKeyOrId,
        ?string $expand = null,
    ): Schema\PermissionScheme {
        return $this->call(
            uri: '/rest/api/3/project/{projectKeyOrId}/permissionscheme',
            method: 'put',
            body: $request,
            query: compact('expand'),
            path: compact('projectKeyOrId'),
            success: 200,
            schema: Schema\PermissionScheme::class,
        );
    }

    /**
     * Returns all "issue security" levels for the project that the user has access to
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "global permission" for the project, however, issue security levels are only returned for authenticated user with *Set Issue Security* "global permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     */
    public function getSecurityLevelsForProject(
        string $projectKeyOrId,
    ): Schema\ProjectIssueSecurityLevels {
        return $this->call(
            uri: '/rest/api/3/project/{projectKeyOrId}/securitylevel',
            method: 'get',
            path: compact('projectKeyOrId'),
            success: 200,
            schema: Schema\ProjectIssueSecurityLevels::class,
        );
    }
}
