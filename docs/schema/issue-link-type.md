# Issue Link Type

This object is used as follows:

 - In the " issueLink" resource it defines and reports on the type of link between the issues.
Find a list of issue link types with "Get issue link types"
 - In the " issueLinkType" resource it defines and reports on issue link types.

Source: [`Jira\Client\Schema\IssueLinkType`](/src/Schema/IssueLinkType.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the issue link type and is used as follows:

 *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `name` isn't provided. Otherwise, read only.
 *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is read only. |
| `inward` | `string` | The description of the issue link type inward link and is used as follows:

 *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
 *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `name` | `string` | The name of the issue link type and is used as follows:

 *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is the type of issue link. Required on create when `id` isn't provided. Otherwise, read only.
 *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `outward` | `string` | The description of the issue link type outward link and is used as follows:

 *  In the [ issueLink](#api-rest-api-3-issueLink-post) resource it is read only.
 *  In the [ issueLinkType](#api-rest-api-3-issueLinkType-post) resource it is required on create and optional on update. Otherwise, read only. |
| `self` | `string` | The URL of the issue link type. Read only. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueLinkTypes](/docs/operations/issue-link-types.md) | [createIssueLinkType](/docs/operations/issue-link-types.md#create-issue-link-type) |
| [IssueLinkTypes](/docs/operations/issue-link-types.md) | [getIssueLinkType](/docs/operations/issue-link-types.md#get-issue-link-type) |
| [IssueLinkTypes](/docs/operations/issue-link-types.md) | [updateIssueLinkType](/docs/operations/issue-link-types.md#update-issue-link-type) |

### Schema

| Group | Operation |
| --- | --- |
| [IssueLink](/docs/schema/issue-link.md) |
| [IssueLinkTypes](/docs/schema/issue-link-types.md) |
| [LinkIssueRequestJsonBean](/docs/schema/link-issue-request-json-bean.md) |
