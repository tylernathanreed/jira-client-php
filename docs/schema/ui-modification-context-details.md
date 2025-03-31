# Ui Modification Context Details

The details of a UI modification's context, which define where to activate the UI modification.

Source: [`Jira\Client\Schema\UiModificationContextDetails`](/src/Schema/UiModificationContextDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the UI modification context. |
| `isAvailable` | `bool` | Whether a context is available. For example, when a project is deleted the context becomes unavailable. |
| `issueTypeId` | `string` | The issue type ID of the context. Null is treated as a wildcard, meaning the UI modification will be applied to all issue types. Each UI modification context can have a maximum of one wildcard. |
| `projectId` | `string` | The project ID of the context. Null is treated as a wildcard, meaning the UI modification will be applied to all projects. Each UI modification context can have a maximum of one wildcard. |
| `viewType` | `'GIC'\|`<br/>`'IssueView'\|`<br/>`'IssueTransition'\|`<br/>`null` | The view type of the context. Only `GIC`(Global Issue Create), `IssueView` and `IssueTransition` are supported. Null is treated as a wildcard, meaning the UI modification will be applied to all view types. Each UI modification context can have a maximum of one wildcard. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CreateUiModificationDetails](/docs/schema/create-ui-modification-details.md) |
| [UiModificationDetails](/docs/schema/ui-modification-details.md) |
| [UpdateUiModificationDetails](/docs/schema/update-ui-modification-details.md) |
