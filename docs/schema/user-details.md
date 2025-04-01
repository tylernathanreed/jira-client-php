# User Details

User details permitted by the user's Atlassian Account privacy settings.
However, be aware of these exceptions:

 - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
In this case, `accountId` returns *unknown* and all other parameters have fallback values
 - User record unavailable: This usually occurs due to an internal service outage.
In this case, all parameters have fallback values.

Source: [`Jira\Client\Schema\UserDetails`](/src/Schema/UserDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `accountType` | `string` | The type of account represented by this user. This will be one of 'atlassian' (normal users), 'app' (application user) or 'customer' (Jira Service Desk customer user) |
| `active` | `bool` | Whether the user is active. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The avatars of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy settings, this may return an alternative value. |
| `emailAddress` | `string` | The email address of the user. Depending on the user’s privacy settings, this may be returned as null. |
| `key` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `self` | `string` | The URL of the user. |
| `timeZone` | `string` | The time zone specified in the user's profile. Depending on the user’s privacy settings, this may be returned as null. |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [Attachment](/docs/schema/attachment.md) |
| [Changelog](/docs/schema/changelog.md) |
| [Comment](/docs/schema/comment.md) |
| [EventNotification](/docs/schema/event-notification.md) |
| [NotificationRecipients](/docs/schema/notification-recipients.md) |
| [PageBeanUserDetails](/docs/schema/page-bean-user-details.md) |
| [PagedListUserDetailsApplicationUser](/docs/schema/paged-list-user-details-application-user.md) |
| [Watchers](/docs/schema/watchers.md) |
| [Worklog](/docs/schema/worklog.md) |
