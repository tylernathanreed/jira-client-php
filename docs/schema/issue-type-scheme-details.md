# Issue Type Scheme Details

Details of an issue type scheme and its associated issue types.

Source: [`Jira\Client\Schema\IssueTypeSchemeDetails`](/src/Schema/IssueTypeSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue types IDs of the issue type scheme. At least one standard issue type ID is required. |
| `name` | `string` | The name of the issue type scheme. The name must be unique. The maximum length is 255 characters. |
| `defaultIssueTypeId` | `string` | The ID of the default issue type of the issue type scheme. This ID must be included in `issueTypeIds`. |
| `description` | `string` | The description of the issue type scheme. The maximum length is 4000 characters. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueTypeSchemes](/docs/operations/issue-type-schemes.md) | [createIssueTypeScheme](/docs/operations/issue-type-schemes.md#create-issue-type-scheme) |

### Schema

*None*
