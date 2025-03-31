# Security Level

Details of an issue level security item.

Source: [`Jira\Client\Schema\SecurityLevel`](/src/Schema/SecurityLevel.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the issue level security item. |
| `id` | `string` | The ID of the issue level security item. |
| `isDefault` | `bool` | Whether the issue level security item is the default. |
| `issueSecuritySchemeId` | `string` | The ID of the issue level security scheme. |
| `name` | `string` | The name of the issue level security item. |
| `self` | `string` | The URL of the issue level security item. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecurityLevel](/docs/operations/issue-security-level.md) | [getIssueSecurityLevel](/docs/operations/issue-security-level.md#get-issue-security-level) |

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanSecurityLevel](/docs/schema/page-bean-security-level.md) |
| [ProjectIssueSecurityLevels](/docs/schema/project-issue-security-levels.md) |
| [SecurityScheme](/docs/schema/security-scheme.md) |
