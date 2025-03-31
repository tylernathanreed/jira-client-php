# Avatar

Details of an avatar.

Source: [`Jira\Client\Schema\Avatar`](/src/Schema/Avatar.php)

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the avatar. |
| `fileName` | `string` | The file name of the avatar icon. Returned for system avatars. |
| `isDeletable` | `bool` | Whether the avatar can be deleted. |
| `isSelected` | `bool` | Whether the avatar is used in Jira. For example, shown as a project's avatar. |
| `isSystemAvatar` | `bool` | Whether the avatar is a system avatar. |
| `owner` | `string` | The owner of the avatar. For a system avatar the owner is null (and nothing is returned). For non-system avatars this is the appropriate identifier, such as the ID for a project or the account ID for a user. |
| `urls` | `array<string,string>` | The list of avatar icon URLs. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Avatars](/docs/operations/avatars.md) | [storeAvatar](/docs/operations/avatars.md#store-avatar) |
| [IssueTypes](/docs/operations/issue-types.md) | [createIssueTypeAvatar](/docs/operations/issue-types.md#create-issue-type-avatar) |
| [ProjectAvatars](/docs/operations/project-avatars.md) | [updateProjectAvatar](/docs/operations/project-avatars.md#update-project-avatar) |
| [ProjectAvatars](/docs/operations/project-avatars.md) | [createProjectAvatar](/docs/operations/project-avatars.md#create-project-avatar) |

### Schema

| Schema |
| --- |
| [Avatars](/docs/schema/avatars.md) |
| [ProjectAvatars](/docs/schema/project-avatars.md) |
| [SystemAvatars](/docs/schema/system-avatars.md) |
