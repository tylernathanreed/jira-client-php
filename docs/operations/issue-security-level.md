# Issue Security Level

DummyDescription

Source: [`Jira\Client\Operations\IssueSecurityLevel`](/src/Operations/IssueSecurityLevel.php)

## Operations

- [Get Issue Security Level Members By Issue Security Scheme](#getIssueSecurityLevelMembers)
- [Get Issue Security Level](#getIssueSecurityLevel)

## Get Issue Security Level Members By Issue Security Scheme
<a name="getIssueSecurityLevelMembers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-level/#api-rest-api-3-issuesecurityschemes-issue-security-scheme-id-members-get

Returns issue security level members

Only issue security level members in context of classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueSecurityLevelMember $response */
$response = $client->getIssueSecurityLevelMembers(
    issueSecuritySchemeId: 1234,
    startAt: 0,
    maxResults: 50,
    issueSecurityLevelId: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueSecuritySchemeId` | `int` | The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `issueSecurityLevelId` | `?list<string>` | The list of issue security level IDs. To include multiple issue security levels separate IDs with ampersand: `issueSecurityLevelId=10000&issueSecurityLevelId=10001`. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `all` Returns all expandable information.<br/> *  `field` Returns information about the custom field granted the permission.<br/> *  `group` Returns information about the group that is granted the permission.<br/> *  `projectRole` Returns information about the project role granted the permission.<br/> *  `user` Returns information about the user who is granted the permission. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueSecurityLevelMember`](/docs/schema/page-bean-issue-security-level-member.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueSecurityLevelMember>`](/docs/schema/issue-security-level-member.md) | The list of items. |


## Get Issue Security Level
<a name="getIssueSecurityLevel"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-security-level/#api-rest-api-3-securitylevel-id-get

Returns details of an issue security level

Use "Get issue security scheme" to obtain the IDs of issue security levels associated with the issue security scheme

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\SecurityLevel $response */
$response = $client->getIssueSecurityLevel(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue security level. |

#### Response

Source: [`Jira\Client\Schema\SecurityLevel`](/docs/schema/security-level.md)

Details of an issue level security item.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the issue level security item. |
| `id` | `string` | The ID of the issue level security item. |
| `isDefault` | `bool` | Whether the issue level security item is the default. |
| `issueSecuritySchemeId` | `string` | The ID of the issue level security scheme. |
| `name` | `string` | The name of the issue level security item. |
| `self` | `string` | The URL of the issue level security item. |
