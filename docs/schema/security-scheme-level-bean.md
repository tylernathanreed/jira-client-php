# Security Scheme Level Bean


Source: [`Jira\Client\Schema\SecuritySchemeLevelBean`](/src/Schema/SecuritySchemeLevelBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The name of the issue security scheme level. Must be unique. |
| `description` | `` | The description of the issue security scheme level. |
| `isDefault` | `` | Specifies whether the level is the default level. False by default. |
| `members` | `?list<SecuritySchemeLevelMemberBean>` | The list of level members which should be added to the issue security scheme level. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [AddSecuritySchemeLevelsRequestBean](/docs/schema/add-security-scheme-levels-request-bean.md) |
| [CreateIssueSecuritySchemeDetails](/docs/schema/create-issue-security-scheme-details.md) |
