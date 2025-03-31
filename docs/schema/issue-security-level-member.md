# Issue Security Level Member

Issue security level member.

Source: [`Jira\Client\Schema\IssueSecurityLevelMember`](/src/Schema/IssueSecurityLevelMember.php)

| Property | Type | Description |
| --- | --- | --- |
| `holder` | `PermissionHolder` | The user or group being granted the permission. It consists of a `type` and a type-dependent `parameter`. See [Holder object](../api-group-permission-schemes/#holder-object) in *Get all permission schemes* for more information. |
| `id` | `int` | The ID of the issue security level member. |
| `issueSecurityLevelId` | `int` | The ID of the issue security level. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [PageBeanIssueSecurityLevelMember](/docs/schema/page-bean-issue-security-level-member.md) |
