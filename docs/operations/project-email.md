# Project Email

Source: [`Jira\Client\Operations\ProjectEmail`](/src/Operations/ProjectEmail.php)

## Operations

- [Get Project's Sender Email](#getProjectEmail)
- [Set Project's Sender Email](#updateProjectEmail)

## Get Project's Sender Email
<a name="getProjectEmail"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-email/#api-rest-api-3-project-project-id-email-get

Returns the "project's sender email address"

**"Permissions" required:** *Browse projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/dolKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\ProjectEmailAddress $response */
$response = $client->getProjectEmail(
    projectId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `int` | The project ID. |

#### Response

Source: [`Jira\Client\Schema\ProjectEmailAddress`](/docs/schema/project-email-address.md)

A project's sender email address.

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `string` | The email address. |
| `emailAddressStatus` | `?list<string>` | When using a custom domain, the status of the email address. |


## Set Project's Sender Email
<a name="updateProjectEmail"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-email/#api-rest-api-3-project-project-id-email-put

Sets the "project's sender email address"

If `emailAddress` is an empty string, the default email address is restored

**"Permissions" required:** *Administer Jira* "global permission" or *Administer Projects* "project permission."
See: https://confluence.atlassian.com/x/dolKLg
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateProjectEmail(
    request: new Schema\ProjectEmailAddress(
        emailAddress: 'jira@example.atlassian.net',
    )
    projectId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectEmailAddress`](/docs/schema/project-email-address.md)

A project's sender email address.

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `string` | The email address. |
| `emailAddressStatus` | `?list<string>` | When using a custom domain, the status of the email address. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `int` | The project ID. |

#### Response

`true`
