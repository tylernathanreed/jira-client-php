# New User Details

The user details.

Source: [`Jira\Client\Schema\NewUserDetails`](/src/Schema/NewUserDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `string` | The email address for the user. |
| `products` | `array` | Products the new user has access to. Valid products are: jira-core, jira-servicedesk, jira-product-discovery, jira-software. To create a user without product access, set this field to be an empty array. |
| `applicationKeys` | `array` | Deprecated, do not use. |
| `displayName` | `string` | This property is no longer available. If the user has an Atlassian account, their display name is not changed. If the user does not have an Atlassian account, they are sent an email asking them set up an account. |
| `key` | `string` | This property is no longer available. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `name` | `string` | This property is no longer available. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `password` | `string` | This property is no longer available. If the user has an Atlassian account, their password is not changed. If the user does not have an Atlassian account, they are sent an email asking them set up an account. |
| `self` | `string` | The URL of the user. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Users](/docs/operations/users.md) | [createUser](/docs/operations/users.md#create-user) |

### Schema

*None*
