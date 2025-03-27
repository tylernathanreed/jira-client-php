# Announcement Banner

This resource represents an announcement banner. Use it to retrieve and update banner configuration.

| Operations |     |
| ---------- | --- |
| GET        | /rest/api/3/announcementBanner |
| PUT        | /rest/api/3/announcementBanner |

## GET Get announcement banner configuration

Returns the current announcement banner configuration.

**[Permissions](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).

**[Data Security Policy](https://developer.atlassian.com/cloud/confluence/data-security-developer-guide)**: Exempt from app access rules

```php
$response = $client->getBanner();
```

### Scopes

**[OAuth 2.0 scopes](https://developer.atlassian.com/cloud/jira/platform/scopes-for-oauth-2-3LO-and-forge-apps/) required**: `manage:jira-configuration`

**[Connect app scope](https://developer.atlassian.com/cloud/jira/platform/scopes) required**: `ADMIN`

### Request

This request has no parameters.

### Responses

200 OK

Returned if the request is successful.

application/json

[AnnouncementBannerConfiguration](#)

Announcement banner configuration.

<details><summary>Show child properties</summary>
```php
/** Announcement banner configuration. */
final readonly class AnnouncementBannerConfiguration extends Dto
{
    public function __construct(
        /**
         * Hash of the banner data.
         * The client detects updates by comparing hash IDs.
         */
        public ?string $hashId = null,

        /** Flag indicating if the announcement banner can be dismissed by the user. */
        public ?bool $isDismissible = null,

        /** Flag indicating if the announcement banner is enabled or not. */
        public ?bool $isEnabled = null,

        /** The text on the announcement banner. */
        public ?string $message = null,

        /**
         * Visibility of the announcement banner.
         * 
         * @var 'PUBLIC'|'PRIVATE'|null
         */
        public ?string $visibility = null,
    ) {
    }
}
```
</details>
