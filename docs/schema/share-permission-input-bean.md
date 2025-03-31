# Share Permission Input Bean


Source: [`Jira\Client\Schema\SharePermissionInputBean`](/src/Schema/SharePermissionInputBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `'user'\|'project'\|'group'\|'projectRole'\|'global'\|'authenticated'` | The type of the share permission.Specify the type as follows:<br/><br/> *  `user` Share with a user.<br/> *  `group` Share with a group. Specify `groupname` as well.<br/> *  `project` Share with a project. Specify `projectId` as well.<br/> *  `projectRole` Share with a project role in a project. Specify `projectId` and `projectRoleId` as well.<br/> *  `global` Share globally, including anonymous users. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.<br/> *  `authenticated` Share with all logged-in users. This shows as `loggedin` in the response. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set. |
| `accountId` | `string` | The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products.For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. Cannot be provided with `groupname`. |
| `groupname` | `string` | The name of the group to share the filter with. Set `type` to `group`. Please note that the name of a group is mutable, to reliably identify a group use `groupId`. |
| `projectId` | `string` | The ID of the project to share the filter with. Set `type` to `project`. |
| `projectRoleId` | `string` | The ID of the project role to share the filter with. Set `type` to `projectRole` and the `projectId` for the project that the role is in. |
| `rights` | `int` | The rights for the share permission. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [FilterSharing](/docs/operations/filter-sharing.md) | [addSharePermission](/docs/operations/filter-sharing.md#add-share-permission) |

### Schema

*None*
