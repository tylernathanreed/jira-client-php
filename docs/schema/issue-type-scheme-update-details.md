# Issue Type Scheme Update Details

Details of the name, description, and default issue type for an issue type scheme.

Source: [`Jira\Client\Schema\IssueTypeSchemeUpdateDetails`](src/Schema/IssueTypeSchemeUpdateDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultIssueTypeId` | `string` | The ID of the default issue type of the issue type scheme. |
| `description` | `string` | The description of the issue type scheme. The maximum length is 4000 characters. |
| `name` | `string` | The name of the issue type scheme. The name must be unique. The maximum length is 255 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [updateIssueTypeScheme](/docs/operations/issue-type-schemes.md#update-issue-type-scheme) |

### Schema

*None*
