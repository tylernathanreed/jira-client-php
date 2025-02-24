<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectRoles
{
    /**
     * Returns a list of "project roles" for the project returning the name and self URL for each role
     * 
     * Note that all project roles are shared with all projects in Jira Cloud.
     * See "Get all project roles" for more information
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Projects* "project permission" for any project on the site or *Administer Jira* "global permission".
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function getProjectRoles(
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/role',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a project role's details and actors associated with the project.
     * The list of actors is sorted by display name
     * 
     * To check whether a user belongs to a role based on their group memberships, use "Get user" with the `groups` expand parameter selected.
     * Then check whether the user keys and groups match with the actors returned for the project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     * @param bool $excludeInactiveUsers Exclude inactive users.
     */
    public function getProjectRole(
        string $projectIdOrKey,
        int $id,
        ?bool $excludeInactiveUsers = false,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/role/{id}',
            method: 'get',
            query: compact('excludeInactiveUsers'),
            path: compact('projectIdOrKey', 'id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Returns all "project roles" and the details for each role.
     * Note that the list of project roles is common to all projects
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer projects* "project permission" for the project.
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param bool $currentMember Whether the roles should be filtered to include only those the user is assigned to.
     * @param bool $excludeConnectAddons 
     */
    public function getProjectRoleDetails(
        string $projectIdOrKey,
        ?bool $currentMember = false,
        ?bool $excludeConnectAddons = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/roledetails',
            method: 'get',
            query: compact('currentMember', 'excludeConnectAddons'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Gets a list of all project roles, complete with project role details and default actors
     * 
     * ### About project roles ###
     * 
     * "Project roles" are a flexible way to to associate users and groups with projects.
     * In Jira Cloud, the list of project roles is shared globally with all projects, but each project can have a different set of actors associated with it (unlike groups, which have the same membership throughout all Jira applications)
     * 
     * Project roles are used in "permission schemes", "email notification schemes", "issue security levels", "comment visibility", and workflow conditions
     * 
     * #### Members and actors ####
     * 
     * In the Jira REST API, a member of a project role is called an *actor*.
     * An *actor* is a group or user associated with a project role
     * 
     * Actors may be set as "default members" of the project role or set at the project level:
     * 
     *  - Default actors: Users and groups that are assigned to the project role for all newly created projects.
     * The default actors can be removed at the project level later if desired
     *  - Actors: Users and groups that are associated with a project role for a project, which may differ from the default actors.
     * This enables you to assign a user to different roles in different projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/
     * @link https://support.atlassian.com/jira-cloud-administration/docs/manage-project-roles/#Specifying-'default-members'-for-a-project-role
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getAllProjectRoles(): true
    {
        return $this->call(
            uri: '/rest/api/3/role',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates a new project role with no "default actors".
     * You can use the "Add default actors to project role" operation to add default actors to the project role after creating it
     * 
     * *Note that although a new project role is available to all projects upon creation, any default actors that are associated with the project role are not added to projects that existed prior to the role being created.*<
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createProjectRole(
        Schema\CreateUpdateRoleRequestBean $request,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Gets the project role details and the default actors associated with the role.
     * The list of default actors is sorted by display name
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function getProjectRoleById(
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Updates the project role's name and description.
     * You must include both a name and a description in the request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function fullyUpdateProjectRole(
        Schema\CreateUpdateRoleRequestBean $request,
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Updates either the project role's name or its description
     * 
     * You cannot update both the name and description at the same time using this operation.
     * If you send a request with a name and a description only the name is updated
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function partialUpdateProjectRole(
        Schema\CreateUpdateRoleRequestBean $request,
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Deletes a project role.
     * You must specify a replacement project role if you wish to delete a project role that is in use
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role to delete.
     *                Use "Get all project roles" to get a list of project role IDs.
     * @param int $swap The ID of the project role that will replace the one being deleted.
     *                  The swap will attempt to swap the role in schemes (notifications, permissions, issue security), workflows, worklogs and comments.
     */
    public function deleteProjectRole(
        int $id,
        ?int $swap = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/role/{id}',
            method: 'delete',
            query: compact('swap'),
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }
}
