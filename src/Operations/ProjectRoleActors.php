<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectRoleActors
{
    /**
     * Sets the actors for a project role for a project, replacing all existing actors
     * 
     * To add actors to the project without overwriting the existing list, use "Add actors to project role"
     * 
     * **"Permissions" required:** *Administer Projects* "project permission" for the project or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function setActors(
        Schema\ProjectRoleActorsUpdateBean $request,
        string $projectIdOrKey,
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/role/{id}',
            method: 'put',
            body: $request,
            path: compact('projectIdOrKey', 'id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Adds actors to a project role for the project
     * 
     * To replace all actors for the project, use "Set actors for project role"
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
     */
    public function addActorUsers(
        Schema\ActorsMap $request,
        string $projectIdOrKey,
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/role/{id}',
            method: 'post',
            body: $request,
            path: compact('projectIdOrKey', 'id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Deletes actors from a project role for the project
     * 
     * To remove default actors from the project role, use "Delete default actors from project role"
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
     * @param string $user The user account ID of the user to remove from the project role.
     * @param string $group The name of the group to remove from the project role.
     *                      This parameter cannot be used with the `groupId` parameter.
     *                      As a group's name can change, use of `groupId` is recommended.
     * @param string $groupId The ID of the group to remove from the project role.
     *                        This parameter cannot be used with the `group` parameter.
     */
    public function deleteActor(
        string $projectIdOrKey,
        int $id,
        ?string $user = null,
        ?string $group = null,
        ?string $groupId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/role/{id}',
            method: 'delete',
            query: compact('user', 'group', 'groupId'),
            path: compact('projectIdOrKey', 'id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the "default actors" for the project role
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function getProjectRoleActorsForRole(
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}/actors',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Adds "default actors" to a role.
     * You may add groups or users, but you cannot add groups and users in the same request
     * 
     * Changing a project role's default actors does not affect project role members for projects already created
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     */
    public function addProjectRoleActorsToRole(
        Schema\ActorInputBean $request,
        int $id,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}/actors',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }

    /**
     * Deletes the "default actors" from a project role.
     * You may delete a group or user, but you cannot delete a group and a user in the same request
     * 
     * Changing a project role's default actors does not affect project role members for projects already created
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the project role.
     *                Use "Get all project roles" to get a list of project role IDs.
     * @param string $user The user account ID of the user to remove as a default actor.
     * @param string $groupId The group ID of the group to be removed as a default actor.
     *                        This parameter cannot be used with the `group` parameter.
     * @param string $group The group name of the group to be removed as a default actor.This parameter cannot be used with the `groupId` parameter.
     *                      As a group's name can change, use of `groupId` is recommended.
     */
    public function deleteProjectRoleActorsFromRole(
        int $id,
        ?string $user = null,
        ?string $groupId = null,
        ?string $group = null,
    ): Schema\ProjectRole {
        return $this->call(
            uri: '/rest/api/3/role/{id}/actors',
            method: 'delete',
            query: compact('user', 'groupId', 'group'),
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectRole::class,
        );
    }
}
