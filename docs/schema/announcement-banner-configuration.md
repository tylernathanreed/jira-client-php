# Announcement Banner Configuration

Announcement banner configuration.

Source: [`Jira\Client\Schema\AnnouncementBannerConfiguration`](src/Schema/AnnouncementBannerConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `hashId` | `string` | Hash of the banner data. The client detects updates by comparing hash IDs. |
| `isDismissible` | `bool` | Flag indicating if the announcement banner can be dismissed by the user. |
| `isEnabled` | `bool` | Flag indicating if the announcement banner is enabled or not. |
| `message` | `string` | The text on the announcement banner. |
| `visibility` | `string` | Visibility of the announcement banner. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AnnouncementBanner](/docs/operations/announcement-banner.md) | [getBanner](/docs/operations/announcement-banner.md#get-banner) |

### Schema

*None*
