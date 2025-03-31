# Security Scheme Level Bean


Source: [`Jira\Client\Schema\SecuritySchemeLevelBean`](/src/Schema/SecuritySchemeLevelBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the issue security scheme level. Must be unique. |
| `description` | `string` | The description of the issue security scheme level. |
| `isDefault` | `bool` | Specifies whether the level is the default level. False by default. |
| `members` | [`?list<SecuritySchemeLevelMemberBean>`](/docs/schema/security-scheme-level-member-bean.md) | The list of level members which should be added to the issue security scheme level. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [AddSecuritySchemeLevelsRequestBean](/docs/schema/add-security-scheme-levels-request-bean.md) |
| [CreateIssueSecuritySchemeDetails](/docs/schema/create-issue-security-scheme-details.md) |
