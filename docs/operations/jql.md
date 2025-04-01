# JQL 

DummyDescription

Source: [`Jira\Client\Operations\JQL`](/src/Operations/JQL.php)

## Operations

- [Get Field Reference Data (GET)](#getAutoComplete)
- [Get Field Reference Data (POST)](#getAutoCompletePost)
- [Get Field Auto Complete Suggestions](#getFieldAutoCompleteForQueryString)
- [Parse JQL Query](#parseJqlQueries)
- [Convert User Identifiers To Account IDs In JQL Queries](#migrateQueries)
- [Sanitize JQL Queries](#sanitiseJqlQueries)

## Get Field Reference Data (GET)
<a name="getAutoComplete"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-autocompletedata-get

Returns reference data for JQL searches.
This is a downloadable version of the documentation provided in "Advanced searching - fields reference" and "Advanced searching - functions reference", along with a list of JQL-reserved words.
Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder

To filter visible field details by project or collapse non-unique fields by field type then "Get field reference data (POST)" can be used

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/gwORLQ
See: https://confluence.atlassian.com/x/hgORLQ

### Example

```php
/** @var Schema\JQLReferenceData $response */
$response = $client->getAutoComplete();
```

### Request

#### Response

Source: [`Jira\Client\Schema\JQLReferenceData`](/docs/schema/jql-reference-data.md)

Lists of JQL reference data.

| Property | Type | Description |
| --- | --- | --- |
| `jqlReservedWords` | `?list<string>` | List of JQL query reserved words. |
| `visibleFieldNames` | [`?list<FieldReferenceData>`](/docs/schema/field-reference-data.md) | List of fields usable in JQL queries. |
| `visibleFunctionNames` | [`?list<FunctionReferenceData>`](/docs/schema/function-reference-data.md) | List of functions usable in JQL queries. |


## Get Field Reference Data (POST)
<a name="getAutoCompletePost"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-autocompletedata-post

Returns reference data for JQL searches.
This is a downloadable version of the documentation provided in "Advanced searching - fields reference" and "Advanced searching - functions reference", along with a list of JQL-reserved words.
Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder

This operation can filter the custom fields returned by project.
Invalid project IDs in `projectIds` are ignored.
System fields are always returned

It can also return the collapsed field for custom fields.
Collapsed fields enable searches to be performed across all fields with the same name and of the same field type.
For example, the collapsed field `Component - Component[Dropdown]` enables dropdown fields `Component - cf[10061]` and `Component - cf[10062]` to be searched simultaneously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/gwORLQ
See: https://confluence.atlassian.com/x/hgORLQ

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JQLReferenceData $response */
$response = $client->getAutoCompletePost(new Schema\SearchAutoCompleteFilter(
    includeCollapsedFields: true,
    projectIds: [
                '10000',
                '10001',
                '10002',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\SearchAutoCompleteFilter`](/docs/schema/search-auto-complete-filter.md)

Details of how to filter and list search auto complete information.

| Property | Type | Description |
| --- | --- | --- |
| `includeCollapsedFields` | `bool` | Include collapsed fields for fields that have non-unique names. |
| `projectIds` | `?list<int>` | List of project IDs used to filter the visible field details returned. |

#### Response

Source: [`Jira\Client\Schema\JQLReferenceData`](/docs/schema/jql-reference-data.md)

Lists of JQL reference data.

| Property | Type | Description |
| --- | --- | --- |
| `jqlReservedWords` | `?list<string>` | List of JQL query reserved words. |
| `visibleFieldNames` | [`?list<FieldReferenceData>`](/docs/schema/field-reference-data.md) | List of fields usable in JQL queries. |
| `visibleFunctionNames` | [`?list<FunctionReferenceData>`](/docs/schema/function-reference-data.md) | List of functions usable in JQL queries. |


## Get Field Auto Complete Suggestions
<a name="getFieldAutoCompleteForQueryString"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-autocompletedata-suggestions-get

Returns the JQL search auto complete suggestions for a field

Suggestions can be obtained by providing:

 - `fieldName` to get a list of all values for the field
 - `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`
 - `fieldName` and `predicateName` to get a list of all predicate values for the field
 - `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\AutoCompleteSuggestions $response */
$response = $client->getFieldAutoCompleteForQueryString(
    fieldName: 'reporter',
    fieldValue: null,
    predicateName: null,
    predicateValue: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldName` | `?string` | The name of the field. |
| `fieldValue` | `?string` | The partial field item name entered by the user. |
| `predicateName` | `?string` | The name of the [ CHANGED operator predicate](https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED) for which the suggestions are generated. The valid predicate operators are *by*, *from*, and *to*. |
| `predicateValue` | `?string` | The partial predicate item name entered by the user. |

#### Response

Source: [`Jira\Client\Schema\AutoCompleteSuggestions`](/docs/schema/auto-complete-suggestions.md)

The results from a JQL query.

| Property | Type | Description |
| --- | --- | --- |
| `results` | [`?list<AutoCompleteSuggestion>`](/docs/schema/auto-complete-suggestion.md) | The list of suggested item. |


## Parse JQL Query
<a name="parseJqlQueries"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-parse-post

Parses and validates JQL queries

Validation is performed in context of the current user

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ParsedJqlQueries $response */
$response = $client->parseJqlQueries(
    request: new Schema\JqlQueriesToParse(
        queries: [
                'summary ~ test AND (labels in (urgent, blocker] OR lastCommentedBy = currentUser(]] AND status CHANGED AFTER startOfMonth(-1M] ORDER BY updated DESC',
                'issue.property["spaces here"].value in ("Service requests", Incidents]',
                'invalid query',
                'summary = test',
                'summary in test',
                'project = INVALID',
                'universe = 42',
            ],
    )
    validation: 'strict',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JqlQueriesToParse`](/docs/schema/jql-queries-to-parse.md)

A list of JQL queries to parse.

| Property | Type | Description |
| --- | --- | --- |
| `queries` | `list<string>` | A list of queries to parse. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `validation` | `'strict'\|'warn'\|'none'` | How to validate the JQL query and treat the validation results. Validation options include:<br/><br/> *  `strict` Returns all errors. If validation fails, the query structure is not returned.<br/> *  `warn` Returns all errors. If validation fails but the JQL query is correctly formed, the query structure is returned.<br/> *  `none` No validation is performed. If JQL query is correctly formed, the query structure is returned. |

#### Response

Source: [`Jira\Client\Schema\ParsedJqlQueries`](/docs/schema/parsed-jql-queries.md)

A list of parsed JQL queries.

| Property | Type | Description |
| --- | --- | --- |
| `queries` | [`list<ParsedJqlQuery>`](/docs/schema/parsed-jql-query.md) | A list of parsed JQL queries. |


## Convert User Identifiers To Account IDs In JQL Queries
<a name="migrateQueries"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-pdcleaner-post

Converts one or more JQL queries with user identifiers (username or user key) to equivalent JQL queries with account IDs

You may wish to use this operation if your system stores JQL queries and you want to make them GDPR-compliant.
For more information about GDPR-related changes, see the "migration guide"

**"Permissions" required:** Permission to access Jira.
See: https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ConvertedJQLQueries $response */
$response = $client->migrateQueries(new Schema\JQLPersonalDataMigrationRequest(
    queryStrings: [
                'assignee = mia',
                'issuetype = Bug AND assignee in (mia] AND reporter in (alana] order by lastViewed DESC',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JQLPersonalDataMigrationRequest`](/docs/schema/jql-personal-data-migration-request.md)

The JQL queries to be converted.

| Property | Type | Description |
| --- | --- | --- |
| `queryStrings` | `?list<string>` | A list of queries with user identifiers. Maximum of 100 queries. |

#### Response

Source: [`Jira\Client\Schema\ConvertedJQLQueries`](/docs/schema/converted-jql-queries.md)

The converted JQL queries.

| Property | Type | Description |
| --- | --- | --- |
| `queriesWithUnknownUsers` | [`?list<JQLQueryWithUnknownUsers>`](/docs/schema/jql-query-with-unknown-users.md) | List of queries containing user information that could not be mapped to an existing user |
| `queryStrings` | `?list<string>` | The list of converted query strings with account IDs in place of user identifiers. |


## Sanitize JQL Queries
<a name="sanitiseJqlQueries"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-sanitize-post

Sanitizes one or more JQL queries by converting readable details into IDs where a user doesn't have permission to view the entity

For example, if the query contains the clause *project = 'Secret project'*, and a user does not have browse permission for the project "Secret project", the sanitized query replaces the clause with *project = 12345"* (where 12345 is the ID of the project).
If a user has the required permission, the clause is not sanitized.
If the account ID is null, sanitizing is performed for an anonymous user

Note that sanitization doesn't make the queries GDPR-compliant, because it doesn't remove user identifiers (username or user key).
If you need to make queries GDPR-compliant, use "Convert user identifiers to account IDs in JQL queries"

Before sanitization each JQL query is parsed.
The queries are returned in the same order that they were passed

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-sanitize-post
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\SanitizedJqlQueries $response */
$response = $client->sanitiseJqlQueries(new Schema\JqlQueriesToSanitize(
    queries: [
                [
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => '5b10ac8d82e05b22cc7d4ef5',
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => 'cda2aa1395ac195d951b3387',
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => '5b10ac8d82e05b22cc7d4ef5',
                    'query' => 'invalid query',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JqlQueriesToSanitize`](/docs/schema/jql-queries-to-sanitize.md)

The list of JQL queries to sanitize for the given account IDs.

| Property | Type | Description |
| --- | --- | --- |
| `queries` | [`list<JqlQueryToSanitize>`](/docs/schema/jql-query-to-sanitize.md) | The list of JQL queries to sanitize. Must contain unique values. Maximum of 20 queries. |

#### Response

Source: [`Jira\Client\Schema\SanitizedJqlQueries`](/docs/schema/sanitized-jql-queries.md)

The sanitized JQL queries for the given account IDs.

| Property | Type | Description |
| --- | --- | --- |
| `queries` | [`?list<SanitizedJqlQuery>`](/docs/schema/sanitized-jql-query.md) | The list of sanitized JQL queries. |
