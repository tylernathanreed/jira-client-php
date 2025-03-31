# Bulk Issue Property Update Request

Bulk issue property update request details.

Source: [`Jira\Client\Schema\BulkIssuePropertyUpdateRequest`](src/Schema/BulkIssuePropertyUpdateRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | EXPERIMENTAL. The Jira expression to calculate the value of the property. The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map. The context variables available to the expression are `issue` and `user`. Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored. |
| `filter` | `IssueFilterForBulkPropertySet` | The bulk operation filter. |
| `value` | `` | The value of the property. The value must be a [valid](https://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueProperties](/docs/operations/issue-properties.md) | [bulkSetIssueProperty](/docs/operations/issue-properties.md#bulk-set-issue-property) |

### Schema

*None*
