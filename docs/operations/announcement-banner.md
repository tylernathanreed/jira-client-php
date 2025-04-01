# Announcement Banner

DummyDescription

Source: [`Jira\Client\Operations\AnnouncementBanner`](/src/Operations/AnnouncementBanner.php)

## Operations

- [Get Announcement Banner Configuration](#getBanner)
- [Update Announcement Banner Configuration](#setBanner)

## Get Announcement Banner Configuration
<a name="getBanner"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-announcement-banner/#api-rest-api-3-announcement-banner-get

Returns the current announcement banner configuration

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\AnnouncementBannerConfiguration $response */
$response = $client->getBanner();
```

### Request

#### Response

Source: [`Jira\Client\Schema\AnnouncementBannerConfiguration`](/docs/schema/announcement-banner-configuration.md)

Announcement banner configuration.

| Property | Type | Description |
| --- | --- | --- |
| `hashId` | `string` | Hash of the banner data. The client detects updates by comparing hash IDs. |
| `isDismissible` | `bool` | Flag indicating if the announcement banner can be dismissed by the user. |
| `isEnabled` | `bool` | Flag indicating if the announcement banner is enabled or not. |
| `message` | `string` | The text on the announcement banner. |
| `visibility` | `'PUBLIC'\|'PRIVATE'\|null` | Visibility of the announcement banner. |


## Update Announcement Banner Configuration
<a name="setBanner"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-announcement-banner/#api-rest-api-3-announcement-banner-put

Updates the announcement banner configuration

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setBanner(new Schema\AnnouncementBannerConfigurationUpdate(
    isDismissible: false,
    isEnabled: true,
    message: 'This is a public, enabled, non-dismissible banner, set using the API',
    visibility: 'public',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AnnouncementBannerConfigurationUpdate`](/docs/schema/announcement-banner-configuration-update.md)

Configuration of the announcement banner.

| Property | Type | Description |
| --- | --- | --- |
| `isDismissible` | `bool` | Flag indicating if the announcement banner can be dismissed by the user. |
| `isEnabled` | `bool` | Flag indicating if the announcement banner is enabled or not. |
| `message` | `string` | The text on the announcement banner. |
| `visibility` | `string` | Visibility of the announcement banner. Can be public or private. |

#### Response

`true`
