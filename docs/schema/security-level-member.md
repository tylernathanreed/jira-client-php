# Security Level Member

Issue security level member.

Source: [`Jira\Client\Schema\SecurityLevelMember`](/src/Schema/SecurityLevelMember.php)

| Property | Type | Description |
| --- | --- | --- |
| `holder` | `PermissionHolder` | The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information. |
| `id` | `string` | The ID of the issue security level member. |
| `issueSecurityLevelId` | `string` | The ID of the issue security level. |
| `issueSecuritySchemeId` | `string` | The ID of the issue security scheme. |
| `managed` | `bool` |  |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanSecurityLevelMember](/docs/schema/page-bean-security-level-member.md) |
