<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait UserSearch
{
    /**
     * Returns a list of users who can be assigned issues in one or more projects.
     * The list may be restricted to users whose attributes match a string
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned issues in the projects.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who can be assigned issues in the projects, use "Get all users" and filter the records in your code
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * 
     * @param string $projectKeys A list of project keys (case sensitive).
     *                            This parameter accepts a comma-separated list.
     * @param string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *                      Required, unless `accountId` is specified.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $accountId A query string that is matched exactly against user `accountId`.
     *                          Required, unless `query` is specified.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function findBulkAssignableUsers(
        string $projectKeys,
        ?string $query = null,
        ?string $username = null,
        ?string $accountId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/assignable/multiProjectSearch',
            method: 'get',
            query: compact('projectKeys', 'query', 'username', 'accountId', 'startAt', 'maxResults'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of users that can be assigned to an issue.
     * Use this operation to find the list of users who can be assigned to:
     * 
     *  - a new issue, by providing the `projectKeyOrId`
     *  - an updated issue, by providing the `issueKey` or `issueId`
     *  - to an issue during a transition (workflow action), by providing the `issueKey` or `issueId` and the transition id in `actionDescriptorId`.
     * You can obtain the IDs of an issue's valid transitions using the `transitions` option in the `expand` parameter of " Get issue"
     * 
     * In all these cases, you can pass an account ID to determine if a user can be assigned to an issue.
     * The user is returned in the response if they can be assigned to the issue or issue transition
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned the issue.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who can be assigned the issue, use "Get all users" and filter the records in your code
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission" or *Assign issues* "project permission"
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *                      Required, unless `username` or `accountId` is specified.
     * @param string $sessionId The sessionId of this request.
     *                          SessionId is the same until the assignee is set.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $accountId A query string that is matched exactly against user `accountId`.
     *                          Required, unless `query` is specified.
     * @param string $project The project ID or project key (case sensitive).
     *                        Required, unless `issueKey` or `issueId` is specified.
     * @param string $issueKey The key of the issue.
     *                         Required, unless `issueId` or `project` is specified.
     * @param string $issueId The ID of the issue.
     *                        Required, unless `issueKey` or `project` is specified.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return.
     *                        This operation may return less than the maximum number of items even if more are available.
     *                        The operation fetches users up to the maximum and then, from the fetched users, returns only the users that can be assigned to the issue.
     * @param int $actionDescriptorId The ID of the transition.
     * @param bool $recommend 
     */
    public function findAssignableUsers(
        ?string $query = null,
        ?string $sessionId = null,
        ?string $username = null,
        ?string $accountId = null,
        ?string $project = null,
        ?string $issueKey = null,
        ?string $issueId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?int $actionDescriptorId = null,
        ?bool $recommend = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/assignable/search',
            method: 'get',
            query: compact('query', 'sessionId', 'username', 'accountId', 'project', 'issueKey', 'issueId', 'startAt', 'maxResults', 'actionDescriptorId', 'recommend'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of users who fulfill these criteria:
     * 
     *  - their user attributes match a search string
     *  - they have a set of permissions for a project or issue
     * 
     * If no search string is provided, a list of all users with the permissions is returned
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission for the project or issue.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who match the search string and have permission for the project or issue, use "Get all users" and filter the records in your code
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to get users for any project
     *  - *Administer Projects* "project permission" for a project, to get users for that project.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $permissions A comma separated list of permissions.
     *                            Permissions can be specified as any:
     *                             - permission returned by "Get all permissions"
     *                             - custom project permission added by Connect apps
     *                             - (deprecated) one of the following:
     *                                
     *                                 - ASSIGNABLE\_USER
     *                                 - ASSIGN\_ISSUE
     *                                 - ATTACHMENT\_DELETE\_ALL
     *                                 - ATTACHMENT\_DELETE\_OWN
     *                                 - BROWSE
     *                                 - CLOSE\_ISSUE
     *                                 - COMMENT\_DELETE\_ALL
     *                                 - COMMENT\_DELETE\_OWN
     *                                 - COMMENT\_EDIT\_ALL
     *                                 - COMMENT\_EDIT\_OWN
     *                                 - COMMENT\_ISSUE
     *                                 - CREATE\_ATTACHMENT
     *                                 - CREATE\_ISSUE
     *                                 - DELETE\_ISSUE
     *                                 - EDIT\_ISSUE
     *                                 - LINK\_ISSUE
     *                                 - MANAGE\_WATCHER\_LIST
     *                                 - MODIFY\_REPORTER
     *                                 - MOVE\_ISSUE
     *                                 - PROJECT\_ADMIN
     *                                 - RESOLVE\_ISSUE
     *                                 - SCHEDULE\_ISSUE
     *                                 - SET\_ISSUE\_SECURITY
     *                                 - TRANSITION\_ISSUE
     *                                 - VIEW\_VERSION\_CONTROL
     *                                 - VIEW\_VOTERS\_AND\_WATCHERS
     *                                 - VIEW\_WORKFLOW\_READONLY
     *                                 - WORKLOG\_DELETE\_ALL
     *                                 - WORKLOG\_DELETE\_OWN
     *                                 - WORKLOG\_EDIT\_ALL
     *                                 - WORKLOG\_EDIT\_OWN
     *                                 - WORK\_ISSUE
     * @param string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *                      Required, unless `accountId` is specified.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $accountId A query string that is matched exactly against user `accountId`.
     *                          Required, unless `query` is specified.
     * @param string $issueKey The issue key for the issue.
     * @param string $projectKey The project key for the project (case sensitive).
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function findUsersWithAllPermissions(
        string $permissions,
        ?string $query = null,
        ?string $username = null,
        ?string $accountId = null,
        ?string $issueKey = null,
        ?string $projectKey = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/permission/search',
            method: 'get',
            query: compact('permissions', 'query', 'username', 'accountId', 'issueKey', 'projectKey', 'startAt', 'maxResults'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of users whose attributes match the query term.
     * The returned object includes the `html` field where the matched query term is highlighted with the HTML strong tag.
     * A list of account IDs can be provided to exclude users from the results
     * 
     * This operation takes the users in the range defined by `maxResults`, up to the thousandth user, and then returns only the users from that range that match the query term.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who match the query term, use "Get all users" and filter the records in your code
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * Anonymous calls and calls by users without the required permission return search results for an exact name match only.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     * @param int $maxResults The maximum number of items to return.
     *                        The total number of matched users is returned in `total`.
     * @param bool $showAvatar Include the URI to the user's avatar.
     * @param ?list<string> $exclude This parameter is no longer available.
     *                               See the "deprecation notice" for details.
     *                               @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param ?list<string> $excludeAccountIds A list of account IDs to exclude from the search results.
     *                                         This parameter accepts a comma-separated list.
     *                                         Multiple account IDs can also be provided using an ampersand-separated list.
     *                                         For example, `excludeAccountIds=5b10a2844c20165700ede21g,5b10a0effa615349cb016cd8&excludeAccountIds=5b10ac8d82e05b22cc7d4ef5`.
     *                                         Cannot be provided with `exclude`.
     * @param string $avatarSize 
     * @param bool $excludeConnectUsers 
     */
    public function findUsersForPicker(
        string $query,
        ?int $maxResults = 50,
        ?bool $showAvatar = false,
        ?array $exclude = null,
        ?array $excludeAccountIds = null,
        ?string $avatarSize = null,
        ?bool $excludeConnectUsers = false,
    ): Schema\FoundUsers {
        return $this->call(
            uri: '/rest/api/3/user/picker',
            method: 'get',
            query: compact('query', 'maxResults', 'showAvatar', 'exclude', 'excludeAccountIds', 'avatarSize', 'excludeConnectUsers'),
            success: 200,
            schema: Schema\FoundUsers::class,
        );
    }

    /**
     * Returns a list of active users that match the search string and property
     * 
     * This operation first applies a filter to match the search string and property, and then takes the filtered users in the range defined by `startAt` and `maxResults`, up to the thousandth user.
     * To get all the users who match the search string and property, use "Get all users" and filter the records in your code
     * 
     * This operation can be accessed anonymously
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * Anonymous calls or calls by users without the required permission return empty search results.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $query A query string that is matched against user attributes ( `displayName`, and `emailAddress`) to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *                      Required, unless `accountId` or `property` is specified.
     * @param string $username 
     * @param string $accountId A query string that is matched exactly against a user `accountId`.
     *                          Required, unless `query` or `property` is specified.
     * @param int $startAt The index of the first item to return in a page of filtered results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $property A query string used to search properties.
     *                         Property keys are specified by path, so property keys containing dot (.) or equals (=) characters cannot be used.
     *                         The query string cannot be specified using a JSON object.
     *                         Example: To search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `thepropertykey.something.nested=1`.
     *                         Required, unless `accountId` or `query` is specified.
     */
    public function findUsers(
        ?string $query = null,
        ?string $username = null,
        ?string $accountId = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $property = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/search',
            method: 'get',
            query: compact('query', 'username', 'accountId', 'startAt', 'maxResults', 'property'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Finds users with a structured query and returns a "paginated" list of user details
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who match the structured query, use "Get all users" and filter the records in your code
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission"
     * 
     * The query statements are:
     * 
     *  - `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*
     *  - `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*
     *  - `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*
     *  - `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*
     *  - `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*
     *  - `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*
     *  - `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*
     *  - `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
     * For example, if user property `location` is set to value `{"office": {"country": "AU", "city": "Sydney"}}`, then it's possible to use `[location].office.city is "Sydney"` to match the user
     * 
     * The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ...
     * PROJ-n)*.
     * Statements can be combined using the `AND` and `OR` operators to form more complex queries.
     * For example:
     * 
     * `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $query The search query.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function findUsersByQuery(
        string $query,
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanUser {
        return $this->call(
            uri: '/rest/api/3/user/search/query',
            method: 'get',
            query: compact('query', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanUser::class,
        );
    }

    /**
     * Finds users with a structured query and returns a "paginated" list of user keys
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who match the structured query, use "Get all users" and filter the records in your code
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission"
     * 
     * The query statements are:
     * 
     *  - `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*
     *  - `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*
     *  - `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*
     *  - `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*
     *  - `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*
     *  - `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*
     *  - `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*
     *  - `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
     * For example, if user property `location` is set to value `{"office": {"country": "AU", "city": "Sydney"}}`, then it's possible to use `[location].office.city is "Sydney"` to match the user
     * 
     * The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ...
     * PROJ-n)*.
     * Statements can be combined using the `AND` and `OR` operators to form more complex queries.
     * For example:
     * 
     * `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $query The search query.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResult The maximum number of items to return per page.
     */
    public function findUserKeysByQuery(
        string $query,
        ?int $startAt = 0,
        ?int $maxResult = 100,
    ): Schema\PageBeanUserKey {
        return $this->call(
            uri: '/rest/api/3/user/search/query/key',
            method: 'get',
            query: compact('query', 'startAt', 'maxResult'),
            success: 200,
            schema: Schema\PageBeanUserKey::class,
        );
    }

    /**
     * Returns a list of users who fulfill these criteria:
     * 
     *  - their user attributes match a search string
     *  - they have permission to browse issues
     * 
     * Use this resource to find users who can browse:
     * 
     *  - an issue, by providing the `issueKey`
     *  - any issue in a project, by providing the `projectKey`
     * 
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission to browse issues.
     * This means the operation usually returns fewer users than specified in `maxResults`.
     * To get all the users who match the search string and have permission to browse issues, use "Get all users" and filter the records in your code
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * Anonymous calls and calls by users without the required permission return empty search results.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users.
     *                      The string can match the prefix of the attribute's value.
     *                      For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *                      Required, unless `accountId` is specified.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $accountId A query string that is matched exactly against user `accountId`.
     *                          Required, unless `query` is specified.
     * @param string $issueKey The issue key for the issue.
     *                         Required, unless `projectKey` is specified.
     * @param string $projectKey The project key for the project (case sensitive).
     *                           Required, unless `issueKey` is specified.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function findUsersWithBrowsePermission(
        ?string $query = null,
        ?string $username = null,
        ?string $accountId = null,
        ?string $issueKey = null,
        ?string $projectKey = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/viewissue/search',
            method: 'get',
            query: compact('query', 'username', 'accountId', 'issueKey', 'projectKey', 'startAt', 'maxResults'),
            success: 200,
            schema: true,
        );
    }
}
