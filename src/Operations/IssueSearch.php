<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueSearch
{
    /**
     * Returns lists of issues matching a query string.
     * Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string
     * 
     * This operation returns two lists:
     * 
     *  - `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter
     *  - `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $query A string to match against text fields in the issue such as title, description, or comments.
     * @param string $currentJQL A JQL query defining a list of issues to search for the query term.
     *                           Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons.
     *                           Use `accountId` instead.
     * @param string $currentIssueKey The key of an issue to exclude from search results.
     *                                For example, the issue the user is viewing when they perform this query.
     * @param string $currentProjectId The ID of a project that suggested issues must belong to.
     * @param bool $showSubTasks Indicate whether to include subtasks in the suggestions list.
     * @param bool $showSubTaskParent When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query.
     */
    public function getIssuePickerResource(
        ?string $query = null,
        ?string $currentJQL = null,
        ?string $currentIssueKey = null,
        ?string $currentProjectId = null,
        ?bool $showSubTasks = null,
        ?bool $showSubTaskParent = null,
    ): Schema\IssuePickerSuggestions {
        return $this->call(
            uri: '/rest/api/3/issue/picker',
            method: 'get',
            query: compact('query', 'currentJQL', 'currentIssueKey', 'currentProjectId', 'showSubTasks', 'showSubTaskParent'),
            success: 200,
            schema: Schema\IssuePickerSuggestions::class,
        );
    }

    /**
     * Checks whether one or more issues would be returned by one or more JQL queries
     * 
     * **"Permissions" required:** None, however, issues are only matched against JQL queries where the user has:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function matchIssues(
        Schema\IssuesAndJQLQueries $request,
    ): Schema\IssueMatches {
        return $this->call(
            uri: '/rest/api/3/jql/match',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\IssueMatches::class,
        );
    }

    /**
     * Searches for issues using "JQL"
     * 
     * If the JQL query expression is too large to be encoded as a query parameter, use the "POST" version of this resource
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $jql The "JQL" that defines the search.
     *                    Note:
     *                     - If no JQL expression is provided, all issues are returned
     *                     - `username` and `userkey` cannot be used as search terms due to privacy reasons.
     *                    Use `accountId` instead
     *                     - If a user has hidden their email address in their user profile, partial matches of the email address will not find the user.
     *                    An exact match is required.
     *                    @link https://confluence.atlassian.com/x/egORLQ
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     *                        To manage page size, Jira may return fewer items per page where a large number of fields are requested.
     *                        The greatest number of items returned per page is achieved when requesting `id` or `key` only.
     * @param 'strict'|'warn'|'none'|'true'|'false'|null $validateQuery
     *        Determines how to validate the JQL query and treat the validation results.
     *        Supported values are:
     *         - `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings)
     *         - `warn` Returns all errors as warnings
     *         - `none` No validation is performed
     *         - `true` *Deprecated* A legacy synonym for `strict`
     *         - `false` *Deprecated* A legacy synonym for `warn`
     *        Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
     * @param ?list<string> $fields A list of fields to return for each issue, use it to retrieve a subset of fields.
     *                              This parameter accepts a comma-separated list.
     *                              Expand options include:
     *                               - `*all` Returns all fields
     *                               - `*navigable` Returns navigable fields
     *                               - Any issue field, prefixed with a minus to exclude
     *                              Examples:
     *                               - `summary,comment` Returns only the summary and comments fields
     *                               - `-description` Returns all navigable (default) fields except description
     *                               - `*all,-comment` Returns all fields except comments
     *                              This parameter may be specified multiple times.
     *                              For example, `fields=field1,field2&fields=field3`
     *                              Note: All navigable fields are returned by default.
     *                              This differs from "GET issue" where the default is all fields.
     * @param string $expand Use "expand" to include additional information about issues in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `renderedFields` Returns field values rendered in HTML format
     *                        - `names` Returns the display name of each field
     *                        - `schema` Returns the schema describing a field type
     *                        - `transitions` Returns all possible transitions for the issue
     *                        - `operations` Returns all possible operations for the issue
     *                        - `editmeta` Returns information about how each field can be edited
     *                        - `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent
     *                        - `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
     * @param ?list<string> $properties A list of issue property keys for issue properties to include in the results.
     *                                  This parameter accepts a comma-separated list.
     *                                  Multiple properties can also be provided using an ampersand separated list.
     *                                  For example, `properties=prop1,prop2&properties=prop3`.
     *                                  A maximum of 5 issue property keys can be specified.
     * @param bool $fieldsByKeys Reference fields by their key (rather than ID).
     * @param bool $failFast Whether to fail the request quickly in case of an error while loading fields for an issue.
     *                       For `failFast=true`, if one field fails, the entire operation fails.
     *                       For `failFast=false`, the operation will continue even if a field fails.
     *                       It will return a valid response, but without values for the failed field(s).
     */
    public function searchForIssuesUsingJql(
        ?string $jql = null,
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $validateQuery = 'strict',
        ?array $fields = null,
        ?string $expand = null,
        ?array $properties = null,
        ?bool $fieldsByKeys = false,
        ?bool $failFast = false,
    ): Schema\SearchResults {
        return $this->call(
            uri: '/rest/api/3/search',
            method: 'get',
            query: compact('jql', 'startAt', 'maxResults', 'validateQuery', 'fields', 'expand', 'properties', 'fieldsByKeys', 'failFast'),
            success: 200,
            schema: Schema\SearchResults::class,
        );
    }

    /**
     * Searches for issues using "JQL"
     * 
     * There is a "GET" version of this resource that can be used for smaller JQL query expressions
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function searchForIssuesUsingJqlPost(
        Schema\SearchRequestBean $request,
    ): Schema\SearchResults {
        return $this->call(
            uri: '/rest/api/3/search',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\SearchResults::class,
        );
    }

    /**
     * Provide an estimated count of the issues that match the "JQL".
     * Recent updates might not be immediately visible in the returned output.
     * This endpoint requires JQL to be bounded
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function countIssues(
        Schema\JQLCountRequestBean $request,
    ): Schema\JQLCountResultsBean {
        return $this->call(
            uri: '/rest/api/3/search/approximate-count',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\JQLCountResultsBean::class,
        );
    }

    /**
     * Searches for IDs of issues using "JQL"
     * 
     * Use the "Search" endpoint if you need to fetch more than just issue IDs.
     * The Search endpoint returns more information, but may take much longer to respond to requests.
     * This is because it uses a different mechanism for ordering results than this endpoint and doesn't provide the total number of results for your query
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function searchForIssuesIds(
        Schema\IdSearchRequestBean $request,
    ): Schema\IdSearchResults {
        return $this->call(
            uri: '/rest/api/3/search/id',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\IdSearchResults::class,
        );
    }

    /**
     * Searches for issues using "JQL".
     * Recent updates might not be immediately visible in the returned search results.
     * If you need "read-after-write" consistency, you can utilize the `reconcileIssues` parameter to ensure stronger consistency assurances.
     * This operation can be accessed anonymously
     * 
     * If the JQL query expression is too large to be encoded as a query parameter, use the "POST" version of this resource
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://developer.atlassian.com/cloud/jira/platform/search-and-reconcile/
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $jql A "JQL" expression.
     *                    For performance reasons, this parameter requires a bounded query.
     *                    A bounded query is a query with a search restriction
     *                     - Example of an unbounded query: `order by key desc`
     *                     - Example of a bounded query: `assignee = currentUser() order by key`
     *                    Additionally, `orderBy` clause can contain a maximum of 7 fields.
     *                    @link https://confluence.atlassian.com/x/egORLQ
     * @param string $nextPageToken The token for a page to fetch that is not the first page.
     *                              The first page has a `nextPageToken` of `null`.
     *                              Use the `nextPageToken` to fetch the next page of issues
     *                              Note: The `nextPageToken` field is **not included** in the response for the last page, indicating there is no next page.
     * @param int $maxResults The maximum number of items to return per page.
     *                        To manage page size, API may return fewer items per page where a large number of fields are requested.
     *                        The greatest number of items returned per page is achieved when requesting `id` or `key` only.
     *                        It returns max 5000 issues.
     * @param ?list<string> $fields A list of fields to return for each issue, use it to retrieve a subset of fields.
     *                              This parameter accepts a comma-separated list.
     *                              Expand options include:
     *                               - `*all` Returns all fields
     *                               - `*navigable` Returns navigable fields
     *                               - `id` Returns only issue IDs
     *                               - Any issue field, prefixed with a minus to exclude
     *                              The default is `id`
     *                              Examples:
     *                               - `summary,comment` Returns only the summary and comments fields only
     *                               - `-description` Returns all navigable (default) fields except description
     *                               - `*all,-comment` Returns all fields except comments
     *                              Multiple `fields` parameters can be included in a request
     *                              Note: By default, this resource returns IDs only.
     *                              This differs from "GET issue" where the default is all fields.
     * @param string $expand Use "expand" to include additional information about issues in the response.
     *                       Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a comma-delimited string of values.
     *                       The expand options are:
     *                        - `renderedFields` Returns field values rendered in HTML format
     *                        - `names` Returns the display name of each field
     *                        - `schema` Returns the schema describing a field type
     *                        - `transitions` Returns all possible transitions for the issue
     *                        - `operations` Returns all possible operations for the issue
     *                        - `editmeta` Returns information about how each field can be edited
     *                        - `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent
     *                        - `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version
     *                       Examples: `"names,changelog"` Returns the display name of each field as well as a list of recent updates to an issue.
     * @param ?list<string> $properties A list of up to 5 issue properties to include in the results.
     *                                  This parameter accepts a comma-separated list.
     * @param bool $fieldsByKeys Reference fields by their key (rather than ID).
     *                           The default is `false`.
     * @param bool $failFast Fail this request early if we can't retrieve all field data.
     * @param ?list<int> $reconcileIssues Strong consistency issue ids to be reconciled with search results.
     *                                    Accepts max 50 ids.
     *                                    All issues must exist.
     */
    public function searchAndReconsileIssuesUsingJql(
        ?string $jql = null,
        ?string $nextPageToken = null,
        ?int $maxResults = 50,
        ?array $fields = null,
        ?string $expand = null,
        ?array $properties = null,
        ?bool $fieldsByKeys = false,
        ?bool $failFast = false,
        ?array $reconcileIssues = null,
    ): Schema\SearchAndReconcileResults {
        return $this->call(
            uri: '/rest/api/3/search/jql',
            method: 'get',
            query: compact('jql', 'nextPageToken', 'maxResults', 'fields', 'expand', 'properties', 'fieldsByKeys', 'failFast', 'reconcileIssues'),
            success: 200,
            schema: Schema\SearchAndReconcileResults::class,
        );
    }

    /**
     * Searches for issues using "JQL".
     * Recent updates might not be immediately visible in the returned search results.
     * If you need "read-after-write" consistency, you can utilize the `reconcileIssues` parameter to ensure stronger consistency assurances.
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** Issues are included in the response where the user has:
     * 
     *  - *Browse projects* "project permission" for the project containing the issue
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://confluence.atlassian.com/x/egORLQ
     * @link https://developer.atlassian.com/cloud/jira/platform/search-and-reconcile/
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     */
    public function searchAndReconsileIssuesUsingJqlPost(
        Schema\SearchAndReconcileRequestBean $request,
    ): Schema\SearchAndReconcileResults {
        return $this->call(
            uri: '/rest/api/3/search/jql',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\SearchAndReconcileResults::class,
        );
    }
}
