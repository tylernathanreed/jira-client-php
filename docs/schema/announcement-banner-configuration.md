# Announcement Banner Configuration

Announcement banner configuration.

Source: [`Jira\Client\Schema\AnnouncementBannerConfiguration`](/src/Schema/AnnouncementBannerConfiguration.php)

| Property | Type | Description |
| --- | --- | --- |
| `hashId` | `` | Hash of the banner data. The client detects updates by comparing hash IDs. |
| `isDismissible` | `` | Flag indicating if the announcement banner can be dismissed by the user. |
| `isEnabled` | `` | Flag indicating if the announcement banner is enabled or not. |
| `message` | `` | The text on the announcement banner. |
| `visibility` | `'PUBLIC'|'PRIVATE'|null` | Visibility of the announcement banner. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AnnouncementBanner](/docs/operations/announcement-banner.md) | [getBanner](/docs/operations/announcement-banner.md#get-banner) |

### Schema

*None*
