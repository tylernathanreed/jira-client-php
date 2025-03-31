# Remote Issue Link Request

Details of a remote issue link.

Source: [`Jira\Client\Schema\RemoteIssueLinkRequest`](/src/Schema/RemoteIssueLinkRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `object` | `RemoteObject` | Details of the item linked to. |
| `application` | `Application` | Details of the remote application the linked item is in. For example, trello. |
| `globalId` | `string` | An identifier for the remote item in the remote system. For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`.

Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID.

The maximum length is 255 characters. |
| `relationship` | `string` | Description of the relationship between the issue and the linked item. If not set, the relationship description "links to" is used in Jira. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueRemoteLinks](/docs/operations/issue-remote-links.md) | [createOrUpdateRemoteIssueLink](/docs/operations/issue-remote-links.md#create-or-update-remote-issue-link) |
| [IssueRemoteLinks](/docs/operations/issue-remote-links.md) | [updateRemoteIssueLink](/docs/operations/issue-remote-links.md#update-remote-issue-link) |

### Schema

*None*
