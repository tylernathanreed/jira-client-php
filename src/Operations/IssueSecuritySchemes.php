<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueSecuritySchemes
{
    /**
     * Returns all "issue security schemes"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/J4lKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getIssueSecuritySchemes(): Schema\SecuritySchemes
    {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes',
            method: 'get',
            success: 200,
            schema: Schema\SecuritySchemes::class,
        );
    }

    /**
     * Creates a security scheme with security scheme levels and levels' members.
     * You can create up to 100 security scheme levels and security scheme levels' members per request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createIssueSecurityScheme(
        Schema\CreateIssueSecuritySchemeDetails $request,
    ): Schema\SecuritySchemeId {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\SecuritySchemeId::class,
        );
    }

    /**
     * Returns a "paginated" list of issue security levels
     * 
     * Only issue security levels in the context of classic projects are returned
     * 
     * Filtering using IDs is inclusive: if you specify both security scheme IDs and level IDs, the result will include both specified issue security levels and all issue security levels from the specified schemes
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of issue security scheme level IDs.
     *                          To include multiple issue security levels, separate IDs with an ampersand: `id=10000&id=10001`.
     * @param ?list<string> $schemeId The list of issue security scheme IDs.
     *                                To include multiple issue security schemes, separate IDs with an ampersand: `schemeId=10000&schemeId=10001`.
     * @param bool $onlyDefault When set to true, returns multiple default levels for each security scheme containing a default.
     *                          If you provide scheme and level IDs not associated with the default, returns an empty page.
     *                          The default value is false.
     */
    public function getSecurityLevels(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?array $schemeId = null,
        ?bool $onlyDefault = false,
    ): Schema\PageBeanSecurityLevel {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/level',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'schemeId', 'onlyDefault'),
            success: 200,
            schema: Schema\PageBeanSecurityLevel::class,
        );
    }

    /**
     * Sets default issue security levels for schemes
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setDefaultLevels(
        Schema\SetDefaultLevelsRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/level/default',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of issue security level members
     * 
     * Only issue security level members in the context of classic projects are returned
     * 
     * Filtering using parameters is inclusive: if you specify both security scheme IDs and level IDs, the result will include all issue security level members from the specified schemes and levels
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of issue security level member IDs.
     *                          To include multiple issue security level members separate IDs with an ampersand: `id=10000&id=10001`.
     * @param ?list<string> $schemeId The list of issue security scheme IDs.
     *                                To include multiple issue security schemes separate IDs with an ampersand: `schemeId=10000&schemeId=10001`.
     * @param ?list<string> $levelId The list of issue security level IDs.
     *                               To include multiple issue security levels separate IDs with an ampersand: `levelId=10000&levelId=10001`.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about the custom field granted the permission
     *                        - `group` Returns information about the group that is granted the permission
     *                        - `projectRole` Returns information about the project role granted the permission
     *                        - `user` Returns information about the user who is granted the permission
     */
    public function getSecurityLevelMembers(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?array $schemeId = null,
        ?array $levelId = null,
        ?string $expand = null,
    ): Schema\PageBeanSecurityLevelMember {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/level/member',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'schemeId', 'levelId', 'expand'),
            success: 200,
            schema: Schema\PageBeanSecurityLevelMember::class,
        );
    }

    /**
     * Returns a "paginated" mapping of projects that are using security schemes.
     * You can provide either one or multiple security scheme IDs or project IDs to filter by.
     * If you don't provide any, this will return a list of all mappings.
     * Only issue security schemes in the context of classic projects are supported.
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $issueSecuritySchemeId The list of security scheme IDs to be filtered out.
     * @param ?list<string> $projectId The list of project IDs to be filtered out.
     */
    public function searchProjectsUsingSecuritySchemes(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $issueSecuritySchemeId = null,
        ?array $projectId = null,
    ): Schema\PageBeanIssueSecuritySchemeToProjectMapping {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/project',
            method: 'get',
            query: compact('startAt', 'maxResults', 'issueSecuritySchemeId', 'projectId'),
            success: 200,
            schema: Schema\PageBeanIssueSecuritySchemeToProjectMapping::class,
        );
    }

    /**
     * Associates an issue security scheme with a project and remaps security levels of issues to the new levels, if provided
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function associateSchemesToProjects(
        Schema\AssociateSecuritySchemeWithProjectDetails $request,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/project',
            method: 'put',
            body: $request,
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }

    /**
     * Returns a "paginated" list of issue security schemes.
     *  
     * If you specify the project ID parameter, the result will contain issue security schemes and related project IDs you filter by.
     * Use \{@link IssueSecuritySchemeResource\#searchProjectsUsingSecuritySchemes(String, String, Set, Set)\} to obtain all projects related to scheme
     * 
     * Only issue security schemes in the context of classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of issue security scheme IDs.
     *                          To include multiple issue security scheme IDs, separate IDs with an ampersand: `id=10000&id=10001`.
     * @param ?list<string> $projectId The list of project IDs.
     *                                 To include multiple project IDs, separate IDs with an ampersand: `projectId=10000&projectId=10001`.
     */
    public function searchSecuritySchemes(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?array $projectId = null,
    ): Schema\PageBeanSecuritySchemeWithProjects {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/search',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'projectId'),
            success: 200,
            schema: Schema\PageBeanSecuritySchemeWithProjects::class,
        );
    }

    /**
     * Returns an issue security scheme along with its security levels
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission"
     *  - *Administer Projects* "project permission" for a project that uses the requested issue security scheme.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the issue security scheme.
     *                Use the "Get issue security schemes" operation to get a list of issue security scheme IDs.
     */
    public function getIssueSecurityScheme(
        int $id,
    ): Schema\SecurityScheme {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\SecurityScheme::class,
        );
    }

    /**
     * Updates the issue security scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the issue security scheme.
     */
    public function updateIssueSecurityScheme(
        Schema\UpdateIssueSecuritySchemeRequestBean $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue security scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme.
     */
    public function deleteSecurityScheme(
        string $schemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}',
            method: 'delete',
            path: compact('schemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Adds levels and levels' members to the issue security scheme.
     * You can add up to 100 levels per request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme.
     */
    public function addSecurityLevel(
        Schema\AddSecuritySchemeLevelsRequestBean $request,
        string $schemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}/level',
            method: 'put',
            body: $request,
            path: compact('schemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates the issue security level
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme level belongs to.
     * @param string $levelId The ID of the issue security level to update.
     */
    public function updateSecurityLevel(
        Schema\UpdateIssueSecurityLevelDetails $request,
        string $schemeId,
        string $levelId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}',
            method: 'put',
            body: $request,
            path: compact('schemeId', 'levelId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes an issue security level
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme.
     * @param string $levelId The ID of the issue security level to remove.
     * @param string $replaceWith The ID of the issue security level that will replace the currently selected level.
     */
    public function removeLevel(
        string $schemeId,
        string $levelId,
        ?string $replaceWith = null,
    ): Schema\TaskProgressBeanObject {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}',
            method: 'delete',
            query: compact('replaceWith'),
            path: compact('schemeId', 'levelId'),
            success: 303,
            schema: Schema\TaskProgressBeanObject::class,
        );
    }

    /**
     * Adds members to the issue security level.
     * You can add up to 100 members per request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme.
     * @param string $levelId The ID of the issue security level.
     */
    public function addSecurityLevelMembers(
        Schema\SecuritySchemeMembersRequest $request,
        string $schemeId,
        string $levelId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}/member',
            method: 'put',
            body: $request,
            path: compact('schemeId', 'levelId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes an issue security level member from an issue security scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $schemeId The ID of the issue security scheme.
     * @param string $levelId The ID of the issue security level.
     * @param string $memberId The ID of the issue security level member to be removed.
     */
    public function removeMemberFromSecurityLevel(
        string $schemeId,
        string $levelId,
        string $memberId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}/member/{memberId}',
            method: 'delete',
            path: compact('schemeId', 'levelId', 'memberId'),
            success: 204,
            schema: true,
        );
    }
}
