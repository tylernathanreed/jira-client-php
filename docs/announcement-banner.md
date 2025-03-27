# Announcement Banner

This resource represents an announcement banner. Use it to retrieve and update banner configuration.

## Operations

- [Get Announcement Banner Configuration](#)
- [Update announcement banner configuration](#)

## Get Announcement Banner Configuration

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-announcement-banner/#api-rest-api-3-announcementbanner-get

Returns the current announcement banner configuration.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\AnnouncementBannerConfiguration $response */
$response = $client->setBanner(new Schema\AnnouncementBannerConfigurationUpdate(
    isDismissible: false,
    isEnabled: true,
    message: 'This is a public, enabled, non-dismissible banner, set using the API',
    visibility: 'public',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AnnouncementBannerConfigurationUpdate`](#)

Configuration of the announcement banner.

| Property            | Type       | Default | Description                                                              |
| ------------------- | ---------- | ------- | ------------------------------------------------------------------------ |
| **`isDismissible`** | `?boolean` | `null`  | Flag indicating if the announcement banner can be dismissed by the user. |
| **`isEnabled`**     | `?boolean` | `null`  | Flag indicating if the announcement banner is enabled or not.            |
| **`message`**       | `?string`  | `null`  | The text on the announcement banner.                                     |
| **`visibility`**    | `?string`  | `null`  | Visibility of the announcement banner. Can be public or private.         |


### Response

Source: [`Jira\Client\Schema\AnnouncementBannerConfiguration`](#)

Announcement banner configuration.

| Property            | Type       | Default | Description                                                                    |
| ------------------- | ---------- | ------- | ------------------------------------------------------------------------------ |
| **`hashId`**        | `?string`  | `null`  | Hash of the banner data.<br/>The client detects updates by comparing hash IDs. |
| **`isDismissible`** | `?boolean` | `null`  | Flag indicating if the announcement banner can be dismissed by the user.       |
| **`isEnabled`**     | `?boolean` | `null`  | Flag indicating if the announcement banner is enabled or not.                  |
| **`message`**       | `?string`  | `null`  | The text on the announcement banner.                                           |
| **`visibility`**    | `?string`  | `null`  | Visibility of the announcement banner. Can be public or private.               |
