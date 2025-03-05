<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectVersions
{
    /**
     * Returns a "paginated" list of all versions in a project.
     * See the "Get project versions" resource if you want to get a full list of versions without pagination
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
     * @param 'description'|'-description'|'+description'|'name'|'-name'|'+name'|'releaseDate'|'-releaseDate'|'+releaseDate'|'sequence'|'-sequence'|'+sequence'|'startDate'|'-startDate'|'+startDate'|null $orderBy
     *        "Order" the results by a field:
     *         - `description` Sorts by version description
     *         - `name` Sorts by version name
     *         - `releaseDate` Sorts by release date, starting with the oldest date.
     *        Versions with no release date are listed last
     *         - `sequence` Sorts by the order of appearance in the user interface
     *         - `startDate` Sorts by start date, starting with the oldest date.
     *        Versions with no start date are listed last.
     * @param string $query Filter the results using a literal string.
     *                      Versions with matching `name` or `description` are returned (case insensitive).
     * @param string $status A list of status values used to filter the results by version status.
     *                       This parameter accepts a comma-separated list.
     *                       The status values are `released`, `unreleased`, and `archived`.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `issuesstatus` Returns the number of issues in each status category for each version
     *                        - `operations` Returns actions that can be performed on the specified version
     *                        - `driver` Returns the Atlassian account ID of the version driver
     *                        - `approvers` Returns a list containing the approvers for this version.
     */
    public function getProjectVersionsPaginated(
        string $projectIdOrKey,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $orderBy = null,
        ?string $query = null,
        ?string $status = null,
        ?string $expand = null,
    ): Schema\PageBeanVersion {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/version',
            method: 'get',
            query: compact('startAt', 'maxResults', 'orderBy', 'query', 'status', 'expand'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\PageBeanVersion::class,
        );
    }

    /**
     * Returns all versions in a project.
     * The response is not paginated.
     * Use "Get project versions paginated" if you want to get the versions in a project with pagination
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse Projects* "project permission" for the project.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts `operations`, which returns actions that can be performed on the version.
     * 
     * @return list<Schema\Version>
     */
    public function getProjectVersions(
        string $projectIdOrKey,
        ?string $expand = null,
    ): array {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/versions',
            method: 'get',
            query: compact('expand'),
            path: compact('projectIdOrKey'),
            success: 200,
            schema: [Schema\Version::class],
        );
    }

    /**
     * Creates a project version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project the version is added to.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function createVersion(
        Schema\Version $request,
    ): Schema\Version {
        return $this->call(
            uri: '/rest/api/3/version',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\Version::class,
        );
    }

    /**
     * Returns a project version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project containing the version.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version.
     * @param string $expand Use "expand" to include additional information about version in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `operations` Returns the list of operations available for this version
     *                        - `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*.
     *                       The *unmapped* property represents the number of issues with a status other than *to do*, *in progress*, and *done*
     *                        - `driver` Returns the Atlassian account ID of the version driver
     *                        - `approvers` Returns a list containing the Atlassian account IDs of approvers for this version.
     */
    public function getVersion(
        string $id,
        ?string $expand = null,
    ): Schema\Version {
        return $this->call(
            uri: '/rest/api/3/version/{id}',
            method: 'get',
            query: compact('expand'),
            path: compact('id'),
            success: 200,
            schema: Schema\Version::class,
        );
    }

    /**
     * Updates a project version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version.
     */
    public function updateVersion(
        Schema\Version $request,
        string $id,
    ): Schema\Version {
        return $this->call(
            uri: '/rest/api/3/version/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\Version::class,
        );
    }

    /**
     * Deletes a project version
     * 
     * Deprecated, use " Delete and replace version" that supports swapping version values in custom fields, in addition to the swapping for `fixVersion` and `affectedVersion` provided in this resource
     * 
     * Alternative versions can be provided to update issues that use the deleted version in `fixVersion` or `affectedVersion`.
     * If alternatives are not provided, occurrences of `fixVersion` and `affectedVersion` that contain the deleted version are cleared
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version.
     * @param string $moveFixIssuesTo The ID of the version to update `fixVersion` to when the field contains the deleted version.
     *                                The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
     * @param string $moveAffectedIssuesTo The ID of the version to update `affectedVersion` to when the field contains the deleted version.
     *                                     The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
     */
    public function deleteVersion(
        string $id,
        ?string $moveFixIssuesTo = null,
        ?string $moveAffectedIssuesTo = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/version/{id}',
            method: 'delete',
            query: compact('moveFixIssuesTo', 'moveAffectedIssuesTo'),
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Merges two project versions.
     * The merge is completed by deleting the version specified in `id` and replacing any occurrences of its ID in `fixVersion` with the version ID specified in `moveIssuesTo`
     * 
     * Consider using " Delete and replace version" instead.
     * This resource supports swapping version values in `fixVersion`, `affectedVersion`, and custom fields
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version to delete.
     * @param string $moveIssuesTo The ID of the version to merge into.
     */
    public function mergeVersions(
        string $id,
        string $moveIssuesTo,
    ): true {
        return $this->call(
            uri: '/rest/api/3/version/{id}/mergeto/{moveIssuesTo}',
            method: 'put',
            path: compact('id', 'moveIssuesTo'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Modifies the version's sequence within the project, which affects the display order of the versions in Jira
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* project permission for the project that contains the version.
     * 
     * @param string $id The ID of the version to be moved.
     */
    public function moveVersion(
        Schema\VersionMoveBean $request,
        string $id,
    ): Schema\Version {
        return $this->call(
            uri: '/rest/api/3/version/{id}/move',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\Version::class,
        );
    }

    /**
     * Returns the following counts for a version:
     * 
     *  - Number of issues where the `fixVersion` is set to the version
     *  - Number of issues where the `affectedVersion` is set to the version
     *  - Number of issues where a version custom field is set to the version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* project permission for the project that contains the version.
     * 
     * @param string $id The ID of the version.
     */
    public function getVersionRelatedIssues(
        string $id,
    ): Schema\VersionIssueCounts {
        return $this->call(
            uri: '/rest/api/3/version/{id}/relatedIssueCounts',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\VersionIssueCounts::class,
        );
    }

    /**
     * Returns related work items for the given version id
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission" for the project containing the version.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version.
     * 
     * @return list<Schema\VersionRelatedWork>
     */
    public function getRelatedWork(
        string $id,
    ): array {
        return $this->call(
            uri: '/rest/api/3/version/{id}/relatedwork',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: [Schema\VersionRelatedWork::class],
        );
    }

    /**
     * Updates the given related work.
     * You can only update generic link related works via Rest APIs.
     * Any archived version related works can't be edited
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html
     * 
     * @param string $id The ID of the version to update the related work on.
     *                   For the related work id, pass it to the input JSON.
     */
    public function updateRelatedWork(
        Schema\VersionRelatedWork $request,
        string $id,
    ): Schema\VersionRelatedWork {
        return $this->call(
            uri: '/rest/api/3/version/{id}/relatedwork',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\VersionRelatedWork::class,
        );
    }

    /**
     * Creates a related work for the given version.
     * You can only create a generic link type of related works via this API.
     * relatedWorkId will be auto-generated UUID, that does not need to be provided
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html
     * 
     * @param string $id 
     */
    public function createRelatedWork(
        Schema\VersionRelatedWork $request,
        string $id,
    ): Schema\VersionRelatedWork {
        return $this->call(
            uri: '/rest/api/3/version/{id}/relatedwork',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 201,
            schema: Schema\VersionRelatedWork::class,
        );
    }

    /**
     * Deletes a project version
     * 
     * Alternative versions can be provided to update issues that use the deleted version in `fixVersion`, `affectedVersion`, or any version picker custom fields.
     * If alternatives are not provided, occurrences of `fixVersion`, `affectedVersion`, and any version picker custom field, that contain the deleted version, are cleared.
     * Any replacement version must be in the same project as the version being deleted and cannot be the version being deleted
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the version.
     */
    public function deleteAndReplaceVersion(
        Schema\DeleteAndReplaceVersionBean $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/version/{id}/removeAndSwap',
            method: 'post',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns counts of the issues and unresolved issues for the project version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* project permission for the project that contains the version.
     * 
     * @param string $id The ID of the version.
     */
    public function getVersionUnresolvedIssues(
        string $id,
    ): Schema\VersionUnresolvedIssuesCount {
        return $this->call(
            uri: '/rest/api/3/version/{id}/unresolvedIssueCount',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\VersionUnresolvedIssuesCount::class,
        );
    }

    /**
     * Deletes the given related work for the given version
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Resolve issues:* and *Edit issues* "Managing project permissions" for the project that contains the version.
     * 
     * @link https://confluence.atlassian.com/adminjiraserver/managing-project-permissions-938847145.html
     * 
     * @param string $versionId The ID of the version that the target related work belongs to.
     * @param string $relatedWorkId The ID of the related work to delete.
     */
    public function deleteRelatedWork(
        string $versionId,
        string $relatedWorkId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/version/{versionId}/relatedwork/{relatedWorkId}',
            method: 'delete',
            path: compact('versionId', 'relatedWorkId'),
            success: 204,
            schema: true,
        );
    }
}
