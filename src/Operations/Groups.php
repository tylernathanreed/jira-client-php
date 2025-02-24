<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Groups
{
    /**
     * This operation is deprecated, use "`group/member`"
     * 
     * Returns all users in a group
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Browse users and groups* "global permission"
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     *                           
     *                          The name of the group.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId The ID of the group.
     *                        This parameter cannot be used with the `groupName` parameter.
     * @param string $expand List of fields to expand.
     */
    public function getGroup(
        ?string $groupname = null,
        ?string $groupId = null,
        ?string $expand = null,
    ): Schema\Group {
        return $this->call(
            uri: '/rest/api/3/group',
            method: 'get',
            query: compact('groupname', 'groupId', 'expand'),
            success: 200,
            schema: Schema\Group::class,
        );
    }

    /**
     * Creates a group
     * 
     * **"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
     * 
     * @link https://confluence.atlassian.com/x/24xjL
     */
    public function createGroup(
        Schema\AddGroupBean $request,
    ): Schema\Group {
        return $this->call(
            uri: '/rest/api/3/group',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\Group::class,
        );
    }

    /**
     * Deletes a group
     * 
     * **"Permissions" required:** Site administration (that is, member of the *site-admin* strategic "group").
     * 
     * @link https://confluence.atlassian.com/x/24xjL
     * 
     * @param string $groupname 
     * @param string $groupId The ID of the group.
     *                        This parameter cannot be used with the `groupname` parameter.
     * @param string $swapGroup As a group's name can change, use of `swapGroupId` is recommended to identify a group.
     *                           
     *                          The group to transfer restrictions to.
     *                          Only comments and worklogs are transferred.
     *                          If restrictions are not transferred, comments and worklogs are inaccessible after the deletion.
     *                          This parameter cannot be used with the `swapGroupId` parameter.
     * @param string $swapGroupId The ID of the group to transfer restrictions to.
     *                            Only comments and worklogs are transferred.
     *                            If restrictions are not transferred, comments and worklogs are inaccessible after the deletion.
     *                            This parameter cannot be used with the `swapGroup` parameter.
     */
    public function removeGroup(
        ?string $groupname = null,
        ?string $groupId = null,
        ?string $swapGroup = null,
        ?string $swapGroupId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/group',
            method: 'delete',
            query: compact('groupname', 'groupId', 'swapGroup', 'swapGroupId'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of groups
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $groupId The ID of a group.
     *                               To specify multiple IDs, pass multiple `groupId` parameters.
     *                               For example, `groupId=5b10a2844c20165700ede21g&groupId=5b10ac8d82e05b22cc7d4ef5`.
     * @param ?list<string> $groupName The name of a group.
     *                                 To specify multiple names, pass multiple `groupName` parameters.
     *                                 For example, `groupName=administrators&groupName=jira-software-users`.
     * @param string $accessType The access level of a group.
     *                           Valid values: 'site-admin', 'admin', 'user'.
     * @param string $applicationKey The application key of the product user groups to search for.
     *                               Valid values: 'jira-servicedesk', 'jira-software', 'jira-product-discovery', 'jira-core'.
     */
    public function bulkGetGroups(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?array $groupId = null,
        ?array $groupName = null,
        ?string $accessType = null,
        ?string $applicationKey = null,
    ): Schema\PageBeanGroupDetails {
        return $this->call(
            uri: '/rest/api/3/group/bulk',
            method: 'get',
            query: compact('startAt', 'maxResults', 'groupId', 'groupName', 'accessType', 'applicationKey'),
            success: 200,
            schema: Schema\PageBeanGroupDetails::class,
        );
    }

    /**
     * Returns a "paginated" list of all users in a group
     * 
     * Note that users are ordered by username, however the username is not returned in the results due to privacy reasons
     * 
     * **"Permissions" required:** either of:
     * 
     *  - *Browse users and groups* "global permission"
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     *                           
     *                          The name of the group.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId The ID of the group.
     *                        This parameter cannot be used with the `groupName` parameter.
     * @param bool $includeInactiveUsers Include inactive users.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page (number should be between 1 and 50).
     */
    public function getUsersFromGroup(
        ?string $groupname = null,
        ?string $groupId = null,
        ?bool $includeInactiveUsers = false,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanUserDetails {
        return $this->call(
            uri: '/rest/api/3/group/member',
            method: 'get',
            query: compact('groupname', 'groupId', 'includeInactiveUsers', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanUserDetails::class,
        );
    }

    /**
     * Adds a user to a group
     * 
     * **"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
     * 
     * @link https://confluence.atlassian.com/x/24xjL
     * 
     * @param string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     *                           
     *                          The name of the group.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId The ID of the group.
     *                        This parameter cannot be used with the `groupName` parameter.
     */
    public function addUserToGroup(
        Schema\UpdateUserToGroupBean $request,
        ?string $groupname = null,
        ?string $groupId = null,
    ): Schema\Group {
        return $this->call(
            uri: '/rest/api/3/group/user',
            method: 'post',
            body: $request,
            query: compact('groupname', 'groupId'),
            success: 201,
            schema: Schema\Group::class,
        );
    }

    /**
     * Removes a user from a group
     * 
     * **"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
     * 
     * @link https://confluence.atlassian.com/x/24xjL
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     *                           
     *                          The name of the group.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId The ID of the group.
     *                        This parameter cannot be used with the `groupName` parameter.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function removeUserFromGroup(
        string $accountId,
        ?string $groupname = null,
        ?string $groupId = null,
        ?string $username = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/group/user',
            method: 'delete',
            query: compact('accountId', 'groupname', 'groupId', 'username'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of groups whose names contain a query string.
     * A list of group names can be provided to exclude groups from the results
     * 
     * The primary use case for this resource is to populate a group picker suggestions list.
     * To this end, the returned object includes the `html` field where the matched query term is highlighted in the group name with the HTML strong tag.
     * Also, the groups list is wrapped in a response object that contains a header for use in the picker, specifically *Showing X of Y matching groups*
     * 
     * The list returns with the groups sorted.
     * If no groups match the list criteria, an empty list is returned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse projects* "project permission".
     * Anonymous calls and calls by users without the required permission return an empty list
     * 
     * *Browse users and groups* "global permission".
     * Without this permission, calls where query is not an exact match to an existing group will return an empty list.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId This parameter is deprecated, setting it does not affect the results.
     *                          To find groups containing a particular user, use "Get user groups".
     * @param string $query The string to find in group names.
     * @param ?list<string> $exclude As a group's name can change, use of `excludeGroupIds` is recommended to identify a group.
     *                                
     *                               A group to exclude from the result.
     *                               To exclude multiple groups, provide an ampersand-separated list.
     *                               For example, `exclude=group1&exclude=group2`.
     *                               This parameter cannot be used with the `excludeGroupIds` parameter.
     * @param ?list<string> $excludeId A group ID to exclude from the result.
     *                                 To exclude multiple groups, provide an ampersand-separated list.
     *                                 For example, `excludeId=group1-id&excludeId=group2-id`.
     *                                 This parameter cannot be used with the `excludeGroups` parameter.
     * @param int $maxResults The maximum number of groups to return.
     *                        The maximum number of groups that can be returned is limited by the system property `jira.ajax.autocomplete.limit`.
     * @param bool $caseInsensitive Whether the search for groups should be case insensitive.
     * @param string $userName This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function findGroups(
        ?string $accountId = null,
        ?string $query = null,
        ?array $exclude = null,
        ?array $excludeId = null,
        ?int $maxResults = null,
        ?bool $caseInsensitive = false,
        ?string $userName = null,
    ): Schema\FoundGroups {
        return $this->call(
            uri: '/rest/api/3/groups/picker',
            method: 'get',
            query: compact('accountId', 'query', 'exclude', 'excludeId', 'maxResults', 'caseInsensitive', 'userName'),
            success: 200,
            schema: Schema\FoundGroups::class,
        );
    }
}
