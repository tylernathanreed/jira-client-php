# Issue Filter For Bulk Property Set

Bulk operation filter details.

Source: [`Jira\Client\Schema\IssueFilterForBulkPropertySet`](/src/Schema/IssueFilterForBulkPropertySet.php)

| Property | Type | Description |
| --- | --- | --- |
| `currentValue` | `` | The value of properties to perform the bulk operation on. |
| `entityIds` | `array` | List of issues to perform the bulk operation on. |
| `hasProperty` | `bool` | Whether the bulk operation occurs only when the property is present on or absent from an issue. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [BulkIssuePropertyUpdateRequest](/docs/schema/bulk-issue-property-update-request.md) |
