# User Picker User

A user found in a search.

Source: [`Jira\Client\Schema\UserPickerUser`](/src/Schema/UserPickerUser.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `avatarUrl` | `string` | The avatar URL of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `html` | `string` | The display name, email address, and key of the user with the matched query string highlighted with the HTML bold tag. |
| `key` | `string` | This property is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `name` | `string` | This property is no longer available . See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [FoundUsers](/docs/schema/found-users.md) |
