# User Bean


Source: [`Jira\Client\Schema\UserBean`](/src/Schema/UserBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `active` | `` | Whether the user is active. |
| `avatarUrls` | `` | The avatars of the user. |
| `displayName` | `` | The display name of the user. Depending on the user’s privacy setting, this may return an alternative value. |
| `key` | `` | This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.  
The key of the user. |
| `name` | `` | This property is deprecated in favor of `accountId` because of privacy changes. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.  
The username of the user. |
| `self` | `` | The URL of the user. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Dashboard](/docs/schema/dashboard.md) |
| [SharePermission](/docs/schema/share-permission.md) |
