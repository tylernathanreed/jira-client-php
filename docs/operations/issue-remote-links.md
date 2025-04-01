# Issue Remote Links

DummyDescription

Source: [`Jira\Client\Operations\IssueRemoteLinks`](/src/Operations/IssueRemoteLinks.php)

## Operations

- [Get Remote Issue Links](#getRemoteIssueLinks)
- [Create Or Update Remote Issue Link](#createOrUpdateRemoteIssueLink)
- [Delete Remote Issue Link By Global ID](#deleteRemoteIssueLinkByGlobalId)
- [Get Remote Issue Link By ID](#getRemoteIssueLinkById)
- [Update Remote Issue Link By ID](#updateRemoteIssueLink)
- [Delete Remote Issue Link By ID](#deleteRemoteIssueLinkById)

## Get Remote Issue Links
<a name="getRemoteIssueLinks"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-get

Returns the remote issue links for an issue.
When a remote issue link global ID is provided the record with that global ID is returned, otherwise all remote issue links are returned.
Where a global ID includes reserved URL characters these must be escaped in the request.
For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\RemoteIssueLink $response */
$response = $client->getRemoteIssueLinks(
    issueIdOrKey: 10000,
    globalId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `globalId` | `?string` | The global ID of the remote issue link. |

#### Response

Source: [`Jira\Client\Schema\RemoteIssueLink`](/docs/schema/remote-issue-link.md)

Details of an issue remote link.

| Property | Type | Description |
| --- | --- | --- |
| `application` | [`Application`](/docs/schema/application.md) | Details of the remote application the linked item is in. |
| `globalId` | `string` | The global ID of the link, such as the ID of the item on the remote system. |
| `id` | `int` | The ID of the link. |
| `object` | [`RemoteObject`](/docs/schema/remote-object.md) | Details of the item linked to. |
| `relationship` | `string` | Description of the relationship between the issue and the linked item. |
| `self` | `string` | The URL of the link. |


## Create Or Update Remote Issue Link
<a name="createOrUpdateRemoteIssueLink"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-post

Creates or updates a remote issue link for an issue

If a `globalId` is provided and a remote issue link with that global ID is found it is updated.
Any fields without values in the request are set to null.
Otherwise, the remote issue link is created

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\RemoteIssueLinkIdentifies $response */
$response = $client->createOrUpdateRemoteIssueLink(
    request: new Schema\RemoteIssueLinkRequest(
        application: [
                'name' => 'My Acme Tracker',
                'type' => 'com.acme.tracker',
            ],
        globalId: 'system=http://www.mycompany.com/support&id=1',
        object: [
                'icon' => [
                    'title' => 'Support Ticket',
                    'url16x16' => 'http://www.mycompany.com/support/ticket.png',
                ],
                'status' => [
                    'icon' => [
                        'link' => 'http://www.mycompany.com/support?id=1&details=closed',
                        'title' => 'Case Closed',
                        'url16x16' => 'http://www.mycompany.com/support/resolved.png',
                    ],
                    'resolved' => '1',
                ],
                'summary' => 'Customer support issue',
                'title' => 'TSTSUP-111',
                'url' => 'http://www.mycompany.com/support?id=1',
            ],
        relationship: 'causes',
    )
    issueIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\RemoteIssueLinkRequest`](/docs/schema/remote-issue-link-request.md)

Details of a remote issue link.

| Property | Type | Description |
| --- | --- | --- |
| `object` | [`RemoteObject`](/docs/schema/remote-object.md) | Details of the item linked to. |
| `application` | [`Application`](/docs/schema/application.md) | Details of the remote application the linked item is in. For example, trello. |
| `globalId` | `string` | An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.<br/><br/>Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.<br/><br/>The maximum length is 255 characters. |
| `relationship` | `string` | Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |

#### Response

Source: [`Jira\Client\Schema\RemoteIssueLinkIdentifies`](/docs/schema/remote-issue-link-identifies.md)

Details of the identifiers for a created or updated remote issue link.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the remote issue link, such as the ID of the item on the remote system. |
| `self` | `string` | The URL of the remote issue link. |


## Delete Remote Issue Link By Global ID
<a name="deleteRemoteIssueLinkByGlobalId"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-delete

Deletes the remote issue link from the issue using the link's global ID.
Where the global ID includes reserved URL characters these must be escaped in the request.
For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
 - If "issue-level security" is implemented, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->deleteRemoteIssueLinkByGlobalId(
    issueIdOrKey: 10000,
    globalId: 'system=http://www.mycompany.com/support&id=1',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `globalId` | `string` | The global ID of a remote issue link. |

#### Response

`true`
## Get Remote Issue Link By ID
<a name="getRemoteIssueLinkById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-link-id-get

Returns a remote issue link for an issue

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\RemoteIssueLink $response */
$response = $client->getRemoteIssueLinkById(
    issueIdOrKey: 'foo',
    linkId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `linkId` | `string` | The ID of the remote issue link. |

#### Response

Source: [`Jira\Client\Schema\RemoteIssueLink`](/docs/schema/remote-issue-link.md)

Details of an issue remote link.

| Property | Type | Description |
| --- | --- | --- |
| `application` | [`Application`](/docs/schema/application.md) | Details of the remote application the linked item is in. |
| `globalId` | `string` | The global ID of the link, such as the ID of the item on the remote system. |
| `id` | `int` | The ID of the link. |
| `object` | [`RemoteObject`](/docs/schema/remote-object.md) | Details of the item linked to. |
| `relationship` | `string` | Description of the relationship between the issue and the linked item. |
| `self` | `string` | The URL of the link. |


## Update Remote Issue Link By ID
<a name="updateRemoteIssueLink"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-link-id-put

Updates a remote issue link for an issue

Note: Fields without values in the request are set to null

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* and *Link issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateRemoteIssueLink(
    request: new Schema\RemoteIssueLinkRequest(
        application: [
                'name' => 'My Acme Tracker',
                'type' => 'com.acme.tracker',
            ],
        globalId: 'system=http://www.mycompany.com/support&id=1',
        object: [
                'icon' => [
                    'title' => 'Support Ticket',
                    'url16x16' => 'http://www.mycompany.com/support/ticket.png',
                ],
                'status' => [
                    'icon' => [
                        'link' => 'http://www.mycompany.com/support?id=1&details=closed',
                        'title' => 'Case Closed',
                        'url16x16' => 'http://www.mycompany.com/support/resolved.png',
                    ],
                    'resolved' => '1',
                ],
                'summary' => 'Customer support issue',
                'title' => 'TSTSUP-111',
                'url' => 'http://www.mycompany.com/support?id=1',
            ],
        relationship: 'causes',
    )
    issueIdOrKey: 10000,
    linkId: 10000,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\RemoteIssueLinkRequest`](/docs/schema/remote-issue-link-request.md)

Details of a remote issue link.

| Property | Type | Description |
| --- | --- | --- |
| `object` | [`RemoteObject`](/docs/schema/remote-object.md) | Details of the item linked to. |
| `application` | [`Application`](/docs/schema/application.md) | Details of the remote application the linked item is in. For example, trello. |
| `globalId` | `string` | An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.<br/><br/>Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.<br/><br/>The maximum length is 255 characters. |
| `relationship` | `string` | Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `linkId` | `string` | The ID of the remote issue link. |

#### Response

`true`
## Delete Remote Issue Link By ID
<a name="deleteRemoteIssueLinkById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-remote-links/#api-rest-api-3-issue-issue-id-or-key-remotelink-link-id-delete

Deletes a remote issue link from an issue

This operation requires "issue linking to be active"

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects*, *Edit issues*, and *Link issues* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://confluence.atlassian.com/x/yoXKM
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var true $response */
$response = $client->deleteRemoteIssueLinkById(
    issueIdOrKey: 10000,
    linkId: 10000,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue. |
| `linkId` | `string` | The ID of a remote issue link. |

#### Response

`true`
