<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectCategories
{
    /**
     * Returns all project categories
     * 
     * **"Permissions" required:** Permission to access Jira.
     */
    public function getAllProjectCategories(): true
    {
        return $this->call(
            uri: '/rest/api/3/projectCategory',
            method: 'get',
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates a project category
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createProjectCategory(
        Schema\ProjectCategory $request,
    ): Schema\ProjectCategory {
        return $this->call(
            uri: '/rest/api/3/projectCategory',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\ProjectCategory::class,
        );
    }

    /**
     * Returns a project category
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $id The ID of the project category.
     */
    public function getProjectCategoryById(
        int $id,
    ): Schema\ProjectCategory {
        return $this->call(
            uri: '/rest/api/3/projectCategory/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectCategory::class,
        );
    }

    /**
     * Updates a project category
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id 
     */
    public function updateProjectCategory(
        Schema\ProjectCategory $request,
        int $id,
    ): Schema\UpdatedProjectCategory {
        return $this->call(
            uri: '/rest/api/3/projectCategory/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\UpdatedProjectCategory::class,
        );
    }

    /**
     * Deletes a project category
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id ID of the project category to delete.
     */
    public function removeProjectCategory(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/projectCategory/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }
}
