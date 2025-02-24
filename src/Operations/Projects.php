<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Projects
{
    /**
     * Returns all projects visible to the user.
     * Deprecated, use " Get projects paginated" that supports search and pagination
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Projects are returned only where the user has *Browse Projects* or *Administer projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expanded options include:
     *                        - `description` Returns the project description
     *                        - `issueTypes` Returns all issue types associated with the project
     *                        - `lead` Returns information about the project lead
     *                        - `projectKeys` Returns all project keys associated with the project.
     * @param int $recent Returns the user's most recently accessed projects.
     *                    You may specify the number of results to return up to a maximum of 20.
     *                    If access is anonymous, then the recently accessed projects are based on the current HTTP session.
     * @param ?list<string> $properties A list of project properties to return for the project.
     *                                  This parameter accepts a comma-separated list.
     */
    public function getAllProjects(
        ?string $expand = null,
        ?int $recent = null,
        ?array $properties = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project',
            method: 'get',
            query: compact('expand', 'recent', 'properties'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates a project based on a project type template, as shown in the following table:
     * 
     * | Project Type Key | Project Template Key |  
     * |--|--|  
     * | `business` | `com.atlassian.jira-core-project-templates:jira-core-simplified-content-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval`, `com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking`, `com.atlassian.jira-core-project-templates:jira-core-simplified-process-control`, `com.atlassian.jira-core-project-templates:jira-core-simplified-procurement`, `com.atlassian.jira-core-project-templates:jira-core-simplified-project-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment`, `com.atlassian.jira-core-project-templates:jira-core-simplified-task-tracking` |  
     * | `service_desk` | `com.atlassian.servicedesk:simplified-it-service-management`, `com.atlassian.servicedesk:simplified-general-service-desk-it`, `com.atlassian.servicedesk:simplified-general-service-desk-business`, `com.atlassian.servicedesk:simplified-external-service-desk`, `com.atlassian.servicedesk:simplified-hr-service-desk`, `com.atlassian.servicedesk:simplified-facilities-service-desk`, `com.atlassian.servicedesk:simplified-legal-service-desk`, `com.atlassian.servicedesk:simplified-analytics-service-desk`, `com.atlassian.servicedesk:simplified-marketing-service-desk`, `com.atlassian.servicedesk:simplified-design-service-desk`, `com.atlassian.servicedesk:simplified-sales-service-desk`, `com.atlassian.servicedesk:simplified-blank-project-business`, `com.atlassian.servicedesk:simplified-blank-project-it`, `com.atlassian.servicedesk:simplified-finance-service-desk`, `com.atlassian.servicedesk:next-gen-it-service-desk`, `com.atlassian.servicedesk:next-gen-hr-service-desk`, `com.atlassian.servicedesk:next-gen-legal-service-desk`, `com.atlassian.servicedesk:next-gen-marketing-service-desk`, `com.atlassian.servicedesk:next-gen-facilities-service-desk`, `com.atlassian.servicedesk:next-gen-general-it-service-desk`, `com.atlassian.servicedesk:next-gen-general-business-service-desk`, `com.atlassian.servicedesk:next-gen-analytics-service-desk`, `com.atlassian.servicedesk:next-gen-finance-service-desk`, `com.atlassian.servicedesk:next-gen-design-service-desk`, `com.atlassian.servicedesk:next-gen-sales-service-desk` |  
     * | `software` | `com.pyxis.greenhopper.jira:gh-simplified-agility-kanban`, `com.pyxis.greenhopper.jira:gh-simplified-agility-scrum`, `com.pyxis.greenhopper.jira:gh-simplified-basic`, `com.pyxis.greenhopper.jira:gh-simplified-kanban-classic`, `com.pyxis.greenhopper.jira:gh-simplified-scrum-classic` |  
     * The project types are available according to the installed Jira features as follows:
     * 
     *  - Jira Core, the default, enables `business` projects
     *  - Jira Service Management enables `service_desk` projects
     *  - Jira Software enables `software` projects
     * 
     * To determine which features are installed, go to **Jira settings** > **Apps** > **Manage apps** and review the System Apps list.
     * To add Jira Software or Jira Service Management into a JIRA instance, use **Jira settings** > **Apps** > **Finding new apps**.
     * For more information, see " Managing add-ons"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/S31NLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createProject(
        Schema\CreateProjectDetails $request,
    ): Schema\ProjectIdentifiers {
        return $this->call(
            uri: '/rest/api/3/project',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\ProjectIdentifiers::class,
        );
    }

    /**
     * Returns a list of up to 20 projects recently viewed by the user that are still visible to the user
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Projects are returned only where the user has one of:
     * 
     *  - *Browse Projects* "project permission" for the project
     *  - *Administer Projects* "project permission" for the project
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expanded options include:
     *                        - `description` Returns the project description
     *                        - `projectKeys` Returns all project keys associated with a project
     *                        - `lead` Returns information about the project lead
     *                        - `issueTypes` Returns all issue types associated with the project
     *                        - `url` Returns the URL associated with the project
     *                        - `permissions` Returns the permissions associated with the project
     *                        - `insight` EXPERIMENTAL.
     *                       Returns the insight details of total issue count and last issue update time for the project
     *                        - `*` Returns the project with all available expand options.
     * @param ?list<StringList> $properties EXPERIMENTAL.
     *                                      A list of project properties to return for the project.
     *                                      This parameter accepts a comma-separated list.
     *                                      Invalid property names are ignored.
     */
    public function getRecent(
        ?string $expand = null,
        ?array $properties = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/recent',
            method: 'get',
            query: compact('expand', 'properties'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of projects visible to the user
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Projects are returned only where the user has one of:
     * 
     *  - *Browse Projects* "project permission" for the project
     *  - *Administer Projects* "project permission" for the project
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param 'category'|'-category'|'+category'|'key'|'-key'|'+key'|'name'|'-name'|'+name'|'owner'|'-owner'|'+owner'|'issueCount'|'-issueCount'|'+issueCount'|'lastIssueUpdatedDate'|'-lastIssueUpdatedDate'|'+lastIssueUpdatedDate'|'archivedDate'|'+archivedDate'|'-archivedDate'|'deletedDate'|'+deletedDate'|'-deletedDate'|null $orderBy
     *        "Order" the results by a field
     *         - `category` Sorts by project category.
     *        A complete list of category IDs is found using "Get all project categories"
     *         - `issueCount` Sorts by the total number of issues in each project
     *         - `key` Sorts by project key
     *         - `lastIssueUpdatedTime` Sorts by the last issue update time
     *         - `name` Sorts by project name
     *         - `owner` Sorts by project lead
     *         - `archivedDate` EXPERIMENTAL.
     *        Sorts by project archived date
     *         - `deletedDate` EXPERIMENTAL.
     *        Sorts by project deleted date.
     * @param ?list<int> $id The project IDs to filter the results by.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     *                       Up to 50 project IDs can be provided.
     * @param ?list<string> $keys The project keys to filter the results by.
     *                            To include multiple keys, provide an ampersand-separated list.
     *                            For example, `keys=PA&keys=PB`.
     *                            Up to 50 project keys can be provided.
     * @param string $query Filter the results using a literal string.
     *                      Projects with a matching `key` or `name` are returned (case insensitive).
     * @param string $typeKey Orders results by the "project type".
     *                        This parameter accepts a comma-separated list.
     *                        Valid values are `business`, `service_desk`, and `software`.
     *                        @link https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes
     * @param int $categoryId The ID of the project's category.
     *                        A complete list of category IDs is found using the "Get all project categories" operation.
     * @param 'view'|'browse'|'edit'|'create'|null $action
     *        Filter results by projects for which the user can:
     *         - `view` the project, meaning that they have one of the following permissions:
     *            
     *             - *Browse projects* "project permission" for the project
     *             - *Administer projects* "project permission" for the project
     *             - *Administer Jira* "global permission"
     *         - `browse` the project, meaning that they have the *Browse projects* "project permission" for the project
     *         - `edit` the project, meaning that they have one of the following permissions:
     *            
     *             - *Administer projects* "project permission" for the project
     *             - *Administer Jira* "global permission"
     *         - `create` the project, meaning that they have the *Create issues* "project permission" for the project in which the issue is created.
     *        @link https://confluence.atlassian.com/x/yodKLg
     *        @link https://confluence.atlassian.com/x/x4dKLg
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expanded options include:
     *                        - `description` Returns the project description
     *                        - `projectKeys` Returns all project keys associated with a project
     *                        - `lead` Returns information about the project lead
     *                        - `issueTypes` Returns all issue types associated with the project
     *                        - `url` Returns the URL associated with the project
     *                        - `insight` EXPERIMENTAL.
     *                       Returns the insight details of total issue count and last issue update time for the project.
     * @param ?list<'live'|'archived'|'deleted'> $status EXPERIMENTAL.
     *                                                   Filter results by project status:
     *                                                    - `live` Search live projects
     *                                                    - `archived` Search archived projects
     *                                                    - `deleted` Search deleted projects, those in the recycle bin.
     * @param ?list<StringList> $properties EXPERIMENTAL.
     *                                      A list of project properties to return for the project.
     *                                      This parameter accepts a comma-separated list.
     * @param string $propertyQuery EXPERIMENTAL.
     *                              A query string used to search properties.
     *                              The query string cannot be specified using a JSON object.
     *                              For example, to search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `[thepropertykey].something.nested=1`.
     *                              Note that the propertyQuery key is enclosed in square brackets to enable searching where the propertyQuery key includes dot (.) or equals (=) characters.
     *                              Note that `thepropertykey` is only returned when included in `properties`.
     */
    public function searchProjects(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $orderBy = 'key',
        ?array $id = null,
        ?array $keys = null,
        ?string $query = null,
        ?string $typeKey = null,
        ?int $categoryId = null,
        ?string $action = 'view',
        ?string $expand = null,
        ?array $status = null,
        ?array $properties = null,
        ?string $propertyQuery = null,
    ): Schema\PageBeanProject {
        return $this->call(
            uri: '/rest/api/3/project/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'orderBy', 'id', 'keys', 'query', 'typeKey', 'categoryId', 'action', 'expand', 'status', 'properties', 'propertyQuery'),
            success: 200,
            schema: Schema\PageBeanProject::class,
        );
    }

    /**
     * Returns the "project details" for a project
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/ahLpNw
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that the project description, issue types, and project lead are included in all responses by default.
     *                       Expand options include:
     *                        - `description` The project description
     *                        - `issueTypes` The issue types associated with the project
     *                        - `lead` The project lead
     *                        - `projectKeys` All project keys associated with the project
     *                        - `issueTypeHierarchy` The project issue type hierarchy.
     * @param ?list<string> $properties A list of project properties to return for the project.
     *                                  This parameter accepts a comma-separated list.
     */
    public function getProject(
        string $projectIdOrKey,
        ?string $expand = null,
        ?array $properties = null,
    ): Schema\Project {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}',
            method: 'get',
            query: compact('expand', 'properties'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\Project::class,
        );
    }

    /**
     * Updates the "project details" of a project
     * 
     * All parameters are optional in the body of the request.
     * Schemes will only be updated if they are included in the request, any omitted schemes will be left unchanged
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * is only needed when changing the schemes or project key.
     * Otherwise you will only need *Administer Projects* "project permission"
     * 
     * @link https://confluence.atlassian.com/x/ahLpNw
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Note that the project description, issue types, and project lead are included in all responses by default.
     *                       Expand options include:
     *                        - `description` The project description
     *                        - `issueTypes` The issue types associated with the project
     *                        - `lead` The project lead
     *                        - `projectKeys` All project keys associated with the project.
     */
    public function updateProject(
        Schema\UpdateProjectDetails $request,
        string $projectIdOrKey,
        ?string $expand = null,
    ): Schema\Project {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}',
            method: 'put',
            body: $request,
            query: compact('expand'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\Project::class,
        );
    }

    /**
     * Deletes a project
     * 
     * You can't delete a project if it's archived.
     * To delete an archived project, restore the project and then delete it.
     * To restore a project, use the Jira UI
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param bool $enableUndo Whether this project is placed in the Jira recycle bin where it will be available for restoration.
     */
    public function deleteProject(
        string $projectIdOrKey,
        ?bool $enableUndo = true,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}',
            method: 'delete',
            query: compact('enableUndo'),
            path: compact('projectIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Archives a project.
     * You can't delete a project if it's archived.
     * To delete an archived project, restore the project and then delete it.
     * To restore a project, use the Jira UI
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function archiveProject(
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/archive',
            method: 'post',
            path: compact('projectIdOrKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a project asynchronously
     * 
     * This operation is:
     * 
     *  - transactional, that is, if part of the delete fails the project is not deleted
     *  - "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function deleteProjectAsynchronously(
        string $projectIdOrKey,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/delete',
            method: 'post',
            path: compact('projectIdOrKey'),
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }

    /**
     * Restores a project that has been archived or placed in the Jira recycle bin
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission"for Company managed projects
     *  - *Administer Jira* "global permission" or *Administer projects* "project permission" for the project for Team managed projects.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function restore(
        string $projectIdOrKey,
    ): Schema\Project {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/restore',
            method: 'post',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\Project::class,
        );
    }

    /**
     * Returns the valid statuses for a project.
     * The statuses are grouped by issue type, as each project has a set of valid issue types and each issue type has a set of valid statuses
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     */
    public function getAllStatuses(
        string $projectIdOrKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/statuses',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Get the issue type hierarchy for a next-gen project
     * 
     * The issue type hierarchy for a project consists of:
     * 
     *  - *Epic* at level 1 (optional)
     *  - One or more issue types at level 0 such as *Story*, *Task*, or *Bug*.
     * Where the issue type *Epic* is defined, these issue types are used to break down the content of an epic
     *  - *Subtask* at level -1 (optional).
     * This issue type enables level 0 issue types to be broken down into components.
     * Issues based on a level -1 issue type must have a parent issue
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $projectId The ID of the project.
     */
    public function getHierarchy(
        int $projectId,
    ): Schema\ProjectIssueTypeHierarchy {
        return $this->call(
            uri: '/rest/api/3/project/{projectId}/hierarchy',
            method: 'get',
            path: compact('projectId'),
            success: 200,
            schema: Schema\ProjectIssueTypeHierarchy::class,
        );
    }

    /**
     * Gets a "notification scheme" associated with the project
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission".
     * 
     * @link https://confluence.atlassian.com/x/8YdKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about any custom fields assigned to receive an event
     *                        - `group` Returns information about any groups assigned to receive an event
     *                        - `notificationSchemeEvents` Returns a list of event associations.
     *                       This list is returned for all expandable information
     *                        - `projectRole` Returns information about any project roles assigned to receive an event
     *                        - `user` Returns information about any users assigned to receive an event
     */
    public function getNotificationSchemeForProject(
        string $projectKeyOrId,
        ?string $expand = null,
    ): Schema\NotificationScheme {
        return $this->call(
            uri: '/rest/api/3/project/{projectKeyOrId}/notificationscheme',
            method: 'get',
            query: compact('expand'),
            path: compact('projectKeyOrId'),
            success: 200,
            schema: Schema\NotificationScheme::class,
        );
    }
}
