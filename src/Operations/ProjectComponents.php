<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectComponents
{
    /**
     * Returns a "paginated" list of all components in a project, including global (Compass) components when applicable
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param ?list<string> $projectIdsOrKeys The project IDs and/or project keys (case sensitive).
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param 'description'|'-description'|'+description'|'name'|'-name'|'+name'|null $orderBy
     *        "Order" the results by a field:
     *         - `description` Sorts by the component description
     *         - `name` Sorts by component name.
     * @param string $query Filter the results using a literal string.
     *                      Components with a matching `name` or `description` are returned (case insensitive).
     */
    public function findComponentsForProjects(
        ?array $projectIdsOrKeys = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $orderBy = null,
        ?string $query = null,
    ): Schema\PageBean2ComponentJsonBean {
        return $this->call(
            uri: '/rest/api/3/component',
            method: 'get',
            query: compact('projectIdsOrKeys', 'startAt', 'maxResults', 'orderBy', 'query'),
            success: 200,
            schema: Schema\PageBean2ComponentJsonBean::class,
        );
    }

    /**
     * Creates a component.
     * Use components to provide containers for issues within a project.
     * Use components to provide containers for issues within a project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer projects* "project permission" for the project in which the component is created or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createComponent(
        Schema\ProjectComponent $request,
    ): Schema\ProjectComponent {
        return $this->call(
            uri: '/rest/api/3/component',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\ProjectComponent::class,
        );
    }

    /**
     * Returns a component
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for project containing the component.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the component.
     */
    public function getComponent(
        string $id,
    ): Schema\ProjectComponent {
        return $this->call(
            uri: '/rest/api/3/component/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectComponent::class,
        );
    }

    /**
     * Updates a component.
     * Any fields included in the request are overwritten.
     * If `leadAccountId` is an empty string ("") the component lead is removed
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer projects* "project permission" for the project containing the component or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the component.
     */
    public function updateComponent(
        Schema\ProjectComponent $request,
        string $id,
    ): Schema\ProjectComponent {
        return $this->call(
            uri: '/rest/api/3/component/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\ProjectComponent::class,
        );
    }

    /**
     * Deletes a component
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer projects* "project permission" for the project containing the component or *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the component.
     * @param string $moveIssuesTo The ID of the component to replace the deleted component.
     *                             If this value is null no replacement is made.
     */
    public function deleteComponent(
        string $id,
        ?string $moveIssuesTo = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/component/{id}',
            method: 'delete',
            query: compact('moveIssuesTo'),
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the counts of issues assigned to the component
     * 
     * This operation can be accessed anonymously
     * 
     * **Deprecation notice:** The required OAuth 2.0 scopes will be updated on June 15, 2024
     * 
     *  - **Classic**: `read:jira-work`
     *  - **Granular**: `read:field:jira`, `read:project.component:jira`
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $id The ID of the component.
     */
    public function getComponentRelatedIssues(
        string $id,
    ): Schema\ComponentIssuesCount {
        return $this->call(
            uri: '/rest/api/3/component/{id}/relatedIssueCounts',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\ComponentIssuesCount::class,
        );
    }

    /**
     * Returns a "paginated" list of all components in a project.
     * See the "Get project components" resource if you want to get a full list of versions without pagination
     * 
     * If your project uses Compass components, this API will return a list of Compass components that are linked to issues in that project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param 'description'|'-description'|'+description'|'issueCount'|'-issueCount'|'+issueCount'|'lead'|'-lead'|'+lead'|'name'|'-name'|'+name'|null $orderBy
     *        "Order" the results by a field:
     *         - `description` Sorts by the component description
     *         - `issueCount` Sorts by the count of issues associated with the component
     *         - `lead` Sorts by the user key of the component's project lead
     *         - `name` Sorts by component name.
     * @param 'jira'|'compass'|'auto'|null $componentSource
     *        The source of the components to return.
     *        Can be `jira` (default), `compass` or `auto`.
     *        When `auto` is specified, the API will return connected Compass components if the project is opted into Compass, otherwise it will return Jira components.
     *        Defaults to `jira`.
     * @param string $query Filter the results using a literal string.
     *                      Components with a matching `name` or `description` are returned (case insensitive).
     */
    public function getProjectComponentsPaginated(
        string $projectIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $orderBy = null,
        ?string $componentSource = 'jira',
        ?string $query = null,
    ): Schema\PageBeanComponentWithIssueCount {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/component',
            method: 'get',
            query: compact('startAt', 'maxResults', 'orderBy', 'componentSource', 'query'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\PageBeanComponentWithIssueCount::class,
        );
    }

    /**
     * Returns all components in a project.
     * See the "Get project components paginated" resource if you want to get a full list of components with pagination
     * 
     * If your project uses Compass components, this API will return a paginated list of Compass components that are linked to issues in that project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param 'jira'|'compass'|'auto'|null $componentSource
     *        The source of the components to return.
     *        Can be `jira` (default), `compass` or `auto`.
     *        When `auto` is specified, the API will return connected Compass components if the project is opted into Compass, otherwise it will return Jira components.
     *        Defaults to `jira`.
     */
    public function getProjectComponents(
        string $projectIdOrKey,
        ?string $componentSource = 'jira',
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/components',
            method: 'get',
            query: compact('componentSource'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: true,
        );
    }
}
