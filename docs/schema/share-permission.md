# Share Permission

Details of a share permission for the filter.

Source: [`Jira\Client\Schema\SharePermission`](src/Schema/SharePermission.php)

| Property | Type | Description |
| --- | --- | --- |
| `type` | `string` | The type of share permission:

 *  `user` Shared with a user.
 *  `group` Shared with a group. If set in a request, then specify `sharePermission.group` as well.
 *  `project` Shared with a project. If set in a request, then specify `sharePermission.project` as well.
 *  `projectRole` Share with a project role in a project. This value is not returned in responses. It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`.
 *  `global` Shared globally. If set in a request, no other `sharePermission` properties need to be specified.
 *  `loggedin` Shared with all logged-in users. Note: This value is set in a request by specifying `authenticated` as the `type`.
 *  `project-unknown` Shared with a project that the user does not have access to. Cannot be set in a request. |
| `group` | `GroupName` | The group that the filter is shared with. For a request, specify the `groupId` or `name` property for the group. As a group's name can change, use of `groupId` is recommended. |
| `id` | `int` | The unique identifier of the share permission. |
| `project` | `Project` | The project that the filter is shared with. This is similar to the project object returned by [Get project](#api-rest-api-3-project-projectIdOrKey-get) but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.  
For a request, specify the `id` for the project. |
| `role` | `ProjectRole` | The project role that the filter is shared with.  
For a request, specify the `id` for the role. You must also specify the `project` object and `id` for the project that the role is in. |
| `user` | `UserBean` | The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [FilterSharing](/docs/operations/filter-sharing.md) | [getSharePermissions](/docs/operations/filter-sharing.md#get-share-permissions) |
| [FilterSharing](/docs/operations/filter-sharing.md) | [addSharePermission](/docs/operations/filter-sharing.md#add-share-permission) |
| [FilterSharing](/docs/operations/filter-sharing.md) | [getSharePermission](/docs/operations/filter-sharing.md#get-share-permission) |

### Schema

| Group | Operation |
| --- | --- |
| [Dashboard](/docs/schema/dashboard.md) |
| [DashboardDetails](/docs/schema/dashboard-details.md) |
| [Filter](/docs/schema/filter.md) |
| [FilterDetails](/docs/schema/filter-details.md) |
| [PermissionDetails](/docs/schema/permission-details.md) |
