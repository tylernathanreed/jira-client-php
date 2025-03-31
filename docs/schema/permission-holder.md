# Permission Holder

Details of a user, group, field, or project role that holds a permission.
See "Holder object" in *Get all permission schemes* for more information.
See: ../api-group-permission-schemes/#holder-object

Source: [`Jira\Client\Schema\PermissionHolder`](/src/Schema/PermissionHolder.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | The type of permission holder. |
| `expand` | `string` | Expand options that include additional permission holder details in the response. |
| `parameter` | `string` | As a group's name can change, use of `value` is recommended. The identifier associated withthe `type` value that defines the holder of the permission. |
| `value` | `string` | The identifier associated with the `type` value that defines the holder of the permission. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [IssueSecurityLevelMember](/docs/schema/issue-security-level-member.md) |
| [PermissionGrant](/docs/schema/permission-grant.md) |
| [SecurityLevelMember](/docs/schema/security-level-member.md) |
