# Security Scheme

Details about a security scheme.

Source: [`Jira\Client\Schema\SecurityScheme`](/src/Schema/SecurityScheme.php)

| Property | Type | Description |
| --- | --- | --- |
| `defaultSecurityLevelId` | `` | The ID of the default security level. |
| `description` | `` | The description of the issue security scheme. |
| `id` | `` | The ID of the issue security scheme. |
| `levels` | `?list<SecurityLevel>` |  |
| `name` | `` | The name of the issue security scheme. |
| `self` | `` | The URL of the issue security scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [getIssueSecurityScheme](/docs/operations/issue-security-schemes.md#get-issue-security-scheme) |
| [ProjectPermissionSchemes](/docs/operations/project-permission-schemes.md) | [getProjectIssueSecurityScheme](/docs/operations/project-permission-schemes.md#get-project-issue-security-scheme) |

### Schema

| Group | Operation |
| --- | --- |
| [SecuritySchemes](/docs/schema/security-schemes.md) |
