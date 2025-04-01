# Issue Search

DummyDescription

Source: [`Jira\Client\Operations\IssueSearch`](/src/Operations/IssueSearch.php)

## Operations

- [Get Issue Picker Suggestions](#getIssuePickerResource)
- [Check Issues Against JQL](#matchIssues)
- [Search For Issues Using JQL (GET)](#searchForIssuesUsingJql)
- [Search For Issues Using JQL (POST)](#searchForIssuesUsingJqlPost)
- [Count Issues Using JQL](#countIssues)
- [Search Issue IDs Using JQL](#searchForIssuesIds)
- [Search For Issues Using JQL Enhanced Search (GET)](#searchAndReconsileIssuesUsingJql)
- [Search For Issues Using JQL Enhanced Search (POST)](#searchAndReconsileIssuesUsingJqlPost)

## Get Issue Picker Suggestions
<a name="getIssuePickerResource"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-issue-picker-get

Returns lists of issues matching a query string.
Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string

This operation returns two lists:

 - `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter
 - `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter

This operation can be accessed anonymously

**"Permissions" required:** None.


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `?string` | A string to match against text fields in the issue such as title, description, or comments. |
| `currentJQL` | `?string` | A JQL query defining a list of issues to search for the query term. Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons. Use `accountId` instead. |
| `currentIssueKey` | `?string` | The key of an issue to exclude from search results. For example, the issue the user is viewing when they perform this query. |
| `currentProjectId` | `?string` | The ID of a project that suggested issues must belong to. |
| `showSubTasks` | `?bool` | Indicate whether to include subtasks in the suggestions list. |
| `showSubTaskParent` | `?bool` | When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query. |

#### Response

Source: [`Jira\Client\Schema\IssuePickerSuggestions`](/docs/schema/issue-picker-suggestions.md)

A list of issues suggested for use in auto-completion.

| Property | Type | Description |
| --- | --- | --- |
| `sections` | [`?list<IssuePickerSuggestionsIssueType>`](/docs/schema/issue-picker-suggestions-issue-type.md) | A list of issues for an issue type suggested for use in auto-completion. |


## Check Issues Against JQL
<a name="matchIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-jql-match-post

Checks whether one or more issues would be returned by one or more JQL queries

**"Permissions" required:** None, however, issues are only matched against JQL queries where the user has:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueMatches $response */
$response = $client->matchIssues(new Schema\IssuesAndJQLQueries(
    issueIds: [
                '10001',
                '1000',
                '10042',
            ],
    jqls: [
                'project = FOO',
                'issuetype = Bug',
                'summary ~ "some text" AND project in (FOO, BAR]',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssuesAndJQLQueries`](/docs/schema/issues-and-j-q-l-queries.md)

List of issues and JQL queries.

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `list<int>` | A list of issue IDs. |
| `jqls` | `list<string>` | A list of JQL queries. |

#### Response

Source: [`Jira\Client\Schema\IssueMatches`](/docs/schema/issue-matches.md)

A list of matched issues or errors for each JQL query, in the order the JQL queries were passed.

| Property | Type | Description |
| --- | --- | --- |
| `matches` | [`list<IssueMatchesForJQL>`](/docs/schema/issue-matches-for-j-q-l.md) |  |


## Search For Issues Using JQL (GET)
<a name="searchForIssuesUsingJql"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-get

Searches for issues using "JQL"

If the JQL query expression is too large to be encoded as a query parameter, use the "POST" version of this resource

This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\SearchResults $response */
$response = $client->searchForIssuesUsingJql(
    jql: 'project = HSP',
    startAt: 0,
    maxResults: 50,
    validateQuery: 'strict',
    fields: null,
    expand: null,
    properties: null,
    fieldsByKeys: false,
    failFast: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `?string` | The [JQL](https://confluence.atlassian.com/x/egORLQ) that defines the search. Note:<br/><br/> *  If no JQL expression is provided, all issues are returned.<br/> *  `username` and `userkey` cannot be used as search terms due to privacy reasons. Use `accountId` instead.<br/> *  If a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. To manage page size, Jira may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only. |
| `validateQuery` | `'strict'\|`<br/>`'warn'\|`<br/>`'none'\|`<br/>`'true'\|`<br/>`'false'\|`<br/>`null` | Determines how to validate the JQL query and treat the validation results. Supported values are:<br/><br/> *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).<br/> *  `warn` Returns all errors as warnings.<br/> *  `none` No validation is performed.<br/> *  `true` *Deprecated* A legacy synonym for `strict`.<br/> *  `false` *Deprecated* A legacy synonym for `warn`.<br/><br/>Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value. |
| `fields` | `?list<string>` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns only the summary and comments fields.<br/> *  `-description` Returns all navigable (default) fields except description.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>This parameter may be specified multiple times. For example, `fields=field1,field2&fields=field3`.<br/><br/>Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about issues in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version. |
| `properties` | `?list<string>` | A list of issue property keys for issue properties to include in the results. This parameter accepts a comma-separated list. Multiple properties can also be provided using an ampersand separated list. For example, `properties=prop1,prop2&properties=prop3`. A maximum of 5 issue property keys can be specified. |
| `fieldsByKeys` | `?bool` | Reference fields by their key (rather than ID). |
| `failFast` | `?bool` | Whether to fail the request quickly in case of an error while loading fields for an issue. For `failFast=true`, if one field fails, the entire operation fails. For `failFast=false`, the operation will continue even if a field fails. It will return a valid response, but without values for the failed field(s). |

#### Response

Source: [`Jira\Client\Schema\SearchResults`](/docs/schema/search-results.md)

The result of a JQL search.

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional search result details in the response. |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues found by the search. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing the field types in the search results. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |
| `warningMessages` | `?list<string>` | Any warnings related to the JQL query. |


## Search For Issues Using JQL (POST)
<a name="searchForIssuesUsingJqlPost"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-post

Searches for issues using "JQL"

There is a "GET" version of this resource that can be used for smaller JQL query expressions

This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SearchResults $response */
$response = $client->searchForIssuesUsingJqlPost(new Schema\SearchRequestBean(
    expand: [
                'names',
                'schema',
                'operations',
            ],
    fields: [
                'summary',
                'status',
                'assignee',
            ],
    fieldsByKeys: false,
    jql: 'project = HSP',
    maxResults: '15',
    startAt: '0',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SearchRequestBean`](/docs/schema/search-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?list<string>` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a list of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version. |
| `fields` | `?list<string>` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>The default is `*navigable`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns the summary and comments fields only.<br/> *  `-description` Returns all navigable (default) fields except description.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `properties` | `?list<string>` | A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list. |
| `startAt` | `int` | The index of the first item to return in the page of results (page offset). The base index is `0`. |
| `validateQuery` | `'strict'\|`<br/>`'warn'\|`<br/>`'none'\|`<br/>`'true'\|`<br/>`'false'\|`<br/>`null` | Determines how to validate the JQL query and treat the validation results. Supported values:<br/><br/> *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).<br/> *  `warn` Returns all errors as warnings.<br/> *  `none` No validation is performed.<br/> *  `true` *Deprecated* A legacy synonym for `strict`.<br/> *  `false` *Deprecated* A legacy synonym for `warn`.<br/><br/>The default is `strict`.<br/><br/>Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value. |

#### Response

Source: [`Jira\Client\Schema\SearchResults`](/docs/schema/search-results.md)

The result of a JQL search.

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional search result details in the response. |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues found by the search. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing the field types in the search results. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |
| `warningMessages` | `?list<string>` | Any warnings related to the JQL query. |


## Count Issues Using JQL
<a name="countIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-approximate-count-post

Provide an estimated count of the issues that match the "JQL".
Recent updates might not be immediately visible in the returned output.
This endpoint requires JQL to be bounded

This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JQLCountResultsBean $response */
$response = $client->countIssues(new Schema\JQLCountRequestBean(
    jql: 'project = HSP',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JQLCountRequestBean`](/docs/schema/j-q-l-count-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. For performance reasons, this parameter requires a bounded query. A bounded query is a query with a search restriction. |

#### Response

Source: [`Jira\Client\Schema\JQLCountResultsBean`](/docs/schema/j-q-l-count-results-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `count` | `int` | Number of issues matching JQL query. |


## Search Issue IDs Using JQL
<a name="searchForIssuesIds"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-id-post

Searches for IDs of issues using "JQL"

Use the "Search" endpoint if you need to fetch more than just issue IDs.
The Search endpoint returns more information, but may take much longer to respond to requests.
This is because it uses a different mechanism for ordering results than this endpoint and doesn't provide the total number of results for your query

This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IdSearchResults $response */
$response = $client->searchForIssuesIds(new Schema\IdSearchRequestBean(
    jql: 'project = HSP',
    maxResults: '1000',
    nextPageToken: 'EgQIlMIC',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IdSearchRequestBean`](/docs/schema/id-search-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. Order by clauses are not allowed. |
| `maxResults` | `int` | The maximum number of items to return per page. |
| `nextPageToken` | `string` | The continuation token to fetch the next page. This token is provided by the response of this endpoint. |

#### Response

Source: [`Jira\Client\Schema\IdSearchResults`](/docs/schema/id-search-results.md)

Result of your JQL search.
Returns a list of issue IDs and a token to fetch the next page if one exists.

| Property | Type | Description |
| --- | --- | --- |
| `issueIds` | `?list<int>` | The list of issue IDs found by the search. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page this token will be null. |


## Search For Issues Using JQL Enhanced Search (GET)
<a name="searchAndReconsileIssuesUsingJql"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-jql-get

Searches for issues using "JQL".
Recent updates might not be immediately visible in the returned search results.
If you need "read-after-write" consistency, you can utilize the `reconcileIssues` parameter to ensure stronger consistency assurances.
This operation can be accessed anonymously

If the JQL query expression is too large to be encoded as a query parameter, use the "POST" version of this resource

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://developer.atlassian.com/cloud/jira/platform/search-and-reconcile/
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\SearchAndReconcileResults $response */
$response = $client->searchAndReconsileIssuesUsingJql(
    jql: 'project = HSP',
    nextPageToken: '<string>',
    maxResults: 114,
    fields: null,
    expand: '<string>',
    properties: null,
    fieldsByKeys: false,
    failFast: false,
    reconcileIssues: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `jql` | `?string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. For performance reasons, this parameter requires a bounded query. A bounded query is a query with a search restriction.<br/><br/> *  Example of an unbounded query: `order by key desc`.<br/> *  Example of a bounded query: `assignee = currentUser() order by key`.<br/><br/>Additionally, `orderBy` clause can contain a maximum of 7 fields. |
| `nextPageToken` | `?string` | The token for a page to fetch that is not the first page. The first page has a `nextPageToken` of `null`. Use the `nextPageToken` to fetch the next page of issues.<br/><br/>Note: The `nextPageToken` field is **not included** in the response for the last page, indicating there is no next page. |
| `maxResults` | `?int` | The maximum number of items to return per page. To manage page size, API may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only. It returns max 5000 issues. |
| `fields` | `?list<string>` | A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  `id` Returns only issue IDs.<br/> *  Any issue field, prefixed with a minus to exclude.<br/><br/>The default is `id`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns only the summary and comments fields only.<br/> *  `-description` Returns all navigable (default) fields except description.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: By default, this resource returns IDs only. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a comma-delimited string of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.<br/><br/>Examples: `"names,changelog"` Returns the display name of each field as well as a list of recent updates to an issue. |
| `properties` | `?list<string>` | A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list. |
| `fieldsByKeys` | `?bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `failFast` | `?bool` | Fail this request early if we can't retrieve all field data. |
| `reconcileIssues` | `?list<int>` | Strong consistency issue ids to be reconciled with search results. Accepts max 50 ids. All issues must exist. |

#### Response

Source: [`Jira\Client\Schema\SearchAndReconcileResults`](/docs/schema/search-and-reconcile-results.md)

The result of a JQL search with issues reconsilation.

| Property | Type | Description |
| --- | --- | --- |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues found by the search or reconsiliation. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page this token will be null. This token will expire in 7 days. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing the field types in the search results. |


## Search For Issues Using JQL Enhanced Search (POST)
<a name="searchAndReconsileIssuesUsingJqlPost"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-search/#api-rest-api-3-search-jql-post

Searches for issues using "JQL".
Recent updates might not be immediately visible in the returned search results.
If you need "read-after-write" consistency, you can utilize the `reconcileIssues` parameter to ensure stronger consistency assurances.
This operation can be accessed anonymously

**"Permissions" required:** Issues are included in the response where the user has:

 - *Browse projects* "project permission" for the project containing the issue
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/egORLQ
See: https://developer.atlassian.com/cloud/jira/platform/search-and-reconcile/
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\SearchAndReconcileRequestBean`](/docs/schema/search-and-reconcile-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Use [expand](#expansion) to include additional information about issues in the response. Note that, unlike the majority of instances where `expand` is specified, `expand` is defined as a comma-delimited string of values. The expand options are:<br/><br/> *  `renderedFields` Returns field values rendered in HTML format.<br/> *  `names` Returns the display name of each field.<br/> *  `schema` Returns the schema describing a field type.<br/> *  `transitions` Returns all possible transitions for the issue.<br/> *  `operations` Returns all possible operations for the issue.<br/> *  `editmeta` Returns information about how each field can be edited.<br/> *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.<br/> *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.<br/><br/>Examples: `"names,changelog"` Returns the display name of each field as well as a list of recent updates to an issue. |
| `fields` | `?list<string>` | A list of fields to return for each issue. Use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `*all` Returns all fields.<br/> *  `*navigable` Returns navigable fields.<br/> *  `id` Returns only issue IDs.<br/> *  Any issue field, prefixed with a dash to exclude.<br/><br/>The default is `id`.<br/><br/>Examples:<br/><br/> *  `summary,comment` Returns the summary and comments fields only.<br/> *  `*all,-comment` Returns all fields except comments.<br/><br/>Multiple `fields` parameters can be included in a request.<br/><br/>Note: By default, this resource returns IDs only. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields. |
| `fieldsByKeys` | `bool` | Reference fields by their key (rather than ID). The default is `false`. |
| `jql` | `string` | A [JQL](https://confluence.atlassian.com/x/egORLQ) expression. For performance reasons, this parameter requires a bounded query. A bounded query is a query with a search restriction.<br/><br/> *  Example of an unbounded query: `order by key desc`.<br/> *  Example of a bounded query: `assignee = currentUser() order by key`.<br/><br/>Additionally, `orderBy` clause can contain a maximum of 7 fields. |
| `maxResults` | `int` | The maximum number of items to return per page. To manage page size, API may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only. It returns max 5000 issues. |
| `nextPageToken` | `string` | The token for a page to fetch that is not the first page. The first page has a `nextPageToken` of `null`. Use the `nextPageToken` to fetch the next page of issues. |
| `properties` | `?list<string>` | A list of up to 5 issue properties to include in the results. This parameter accepts a comma-separated list. |
| `reconcileIssues` | `?list<int>` | Strong consistency issue ids to be reconciled with search results. Accepts max 50 ids. All issues must exist. |

#### Response

Source: [`Jira\Client\Schema\SearchAndReconcileResults`](/docs/schema/search-and-reconcile-results.md)

The result of a JQL search with issues reconsilation.

| Property | Type | Description |
| --- | --- | --- |
| `issues` | [`?list<IssueBean>`](/docs/schema/issue-bean.md) | The list of issues found by the search or reconsiliation. |
| `names` | `array<string,string>` | The ID and name of each field in the search results. |
| `nextPageToken` | `string` | Continuation token to fetch the next page. If this result represents the last or the only page this token will be null. This token will expire in 7 days. |
| `schema` | [`array<string,JsonTypeBean>`](/docs/schema/json-type-bean.md) | The schema describing the field types in the search results. |
