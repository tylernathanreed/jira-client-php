# Issue Attachments

DummyDescription

Source: [`Jira\Client\Operations\IssueAttachments`](/src/Operations/IssueAttachments.php)

## Operations

- [Get Attachment Content](#getAttachmentContent)
- [Get Jira Attachment Settings](#getAttachmentMeta)
- [Get Attachment Thumbnail](#getAttachmentThumbnail)
- [Get Attachment Metadata](#getAttachment)
- [Delete Attachment](#removeAttachment)
- [Get All Metadata For An Expanded Attachment](#expandAttachmentForHumans)
- [Get Contents Metadata For An Expanded Attachment](#expandAttachmentForMachines)
- [Add Attachment](#addAttachment)

## Get Attachment Content
<a name="getAttachmentContent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-content-id-get

Returns the contents of an attachment.
A `Range` header can be set to define a range of bytes within the attachment to download.
See the "HTTP Range header standard" for details

To return a thumbnail of the attachment, use "Get attachment thumbnail"

This operation can be accessed anonymously

**"Permissions" required:** For the issue containing the attachment:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If attachments are added in private comments, the comment-level restriction will be applied.
See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Range
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |
| `redirect` | `?bool` | Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment. |

#### Response

`true`
## Get Jira Attachment Settings
<a name="getAttachmentMeta"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-meta-get

Returns the attachment settings, that is, whether attachments are enabled and the maximum attachment size allowed

Note that there are also "project permissions" that restrict whether users can create and delete attachments

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\AttachmentSettings $response */
$response = $client->getAttachmentMeta();
```

### Request

#### Response

Source: [`Jira\Client\Schema\AttachmentSettings`](/docs/schema/attachment-settings.md)

Details of the instance's attachment settings.

| Property | Type | Description |
| --- | --- | --- |
| `enabled` | `bool` | Whether the ability to add attachments is enabled. |
| `uploadLimit` | `int` | The maximum size of attachments permitted, in bytes. |


## Get Attachment Thumbnail
<a name="getAttachmentThumbnail"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-thumbnail-id-get

Returns the thumbnail of an attachment

To return the attachment contents, use "Get attachment content"

This operation can be accessed anonymously

**"Permissions" required:** For the issue containing the attachment:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If attachments are added in private comments, the comment-level restriction will be applied.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |
| `redirect` | `?bool` | Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment. |
| `fallbackToDefault` | `?bool` | Whether a default thumbnail is returned when the requested thumbnail is not found. |
| `width` | `?int` | The maximum width to scale the thumbnail to. |
| `height` | `?int` | The maximum height to scale the thumbnail to. |

#### Response

`true`
## Get Attachment Metadata
<a name="getAttachment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-id-get

Returns the metadata for an attachment.
Note that the attachment itself is not returned

This operation can be accessed anonymously

**"Permissions" required:**

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If attachments are added in private comments, the comment-level restriction will be applied.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\AttachmentMetadata $response */
$response = $client->getAttachment(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |

#### Response

Source: [`Jira\Client\Schema\AttachmentMetadata`](/docs/schema/attachment-metadata.md)

Metadata for an issue attachment.

| Property | Type | Description |
| --- | --- | --- |
| `author` | [`User`](/docs/schema/user.md) | Details of the user who attached the file. |
| `content` | `string` | The URL of the attachment. |
| `created` | `string` | The datetime the attachment was created. |
| `filename` | `string` | The name of the attachment file. |
| `id` | `int` | The ID of the attachment. |
| `mimeType` | `string` | The MIME type of the attachment. |
| `properties` | `array<string,mixed>` | Additional properties of the attachment. |
| `self` | `string` | The URL of the attachment metadata details. |
| `size` | `int` | The size of the attachment. |
| `thumbnail` | `string` | The URL of a thumbnail representing the attachment. |


## Delete Attachment
<a name="removeAttachment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-id-delete

Deletes an attachment from an issue

This operation can be accessed anonymously

**"Permissions" required:** For the project holding the issue containing the attachment:

 - *Delete own attachments* "project permission" to delete an attachment created by the calling user
 - *Delete all attachments* "project permission" to delete an attachment created by any user.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->removeAttachment(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |

#### Response

`true`
## Get All Metadata For An Expanded Attachment
<a name="expandAttachmentForHumans"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-id-expand-human-get

Returns the metadata for the contents of an attachment, if it is an archive, and metadata for the attachment itself.
For example, if the attachment is a ZIP archive, then information about the files in the archive is returned and metadata for the ZIP archive.
Currently, only the ZIP archive format is supported

Use this operation to retrieve data that is presented to the user, as this operation returns the metadata for the attachment itself, such as the attachment's ID and name.
Otherwise, use " Get contents metadata for an expanded attachment", which only returns the metadata for the attachment's contents

This operation can be accessed anonymously

**"Permissions" required:** For the issue containing the attachment:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If attachments are added in private comments, the comment-level restriction will be applied.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\AttachmentArchiveMetadataReadable $response */
$response = $client->expandAttachmentForHumans(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |

#### Response

Source: [`Jira\Client\Schema\AttachmentArchiveMetadataReadable`](/docs/schema/attachment-archive-metadata-readable.md)

Metadata for an archive (for example a zip) and its contents.

| Property | Type | Description |
| --- | --- | --- |
| `entries` | [`?list<AttachmentArchiveItemReadable>`](/docs/schema/attachment-archive-item-readable.md) | The list of the items included in the archive. |
| `id` | `int` | The ID of the attachment. |
| `mediaType` | `string` | The MIME type of the attachment. |
| `name` | `string` | The name of the archive file. |
| `totalEntryCount` | `int` | The number of items included in the archive. |


## Get Contents Metadata For An Expanded Attachment
<a name="expandAttachmentForMachines"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-attachment-id-expand-raw-get

Returns the metadata for the contents of an attachment, if it is an archive.
For example, if the attachment is a ZIP archive, then information about the files in the archive is returned.
Currently, only the ZIP archive format is supported

Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment.
Otherwise, to retrieve data to present to the user, use " Get all metadata for an expanded attachment" which also returns the metadata for the attachment itself, such as the attachment's ID and name

This operation can be accessed anonymously

**"Permissions" required:** For the issue containing the attachment:

 - *Browse projects* "project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue
 - If attachments are added in private comments, the comment-level restriction will be applied.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var Schema\AttachmentArchiveImpl $response */
$response = $client->expandAttachmentForMachines(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the attachment. |

#### Response

Source: [`Jira\Client\Schema\AttachmentArchiveImpl`](/docs/schema/attachment-archive-impl.md)

| Property | Type | Description |
| --- | --- | --- |
| `entries` | [`?list<AttachmentArchiveEntry>`](/docs/schema/attachment-archive-entry.md) | The list of the items included in the archive. |
| `totalEntryCount` | `int` | The number of items in the archive. |


## Add Attachment
<a name="addAttachment"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-attachments/#api-rest-api-3-issue-issue-id-or-key-attachments-post

Adds one or more attachments to an issue.
Attachments are posted as multipart/form-data ("RFC 1867")

Note that:

 - The request must have a `X-Atlassian-Token: no-check` header, if not it is blocked.
See "Special headers" for more information
 - The name of the multipart/form-data parameter that contains the attachments must be `file`

The following examples upload a file called *myfile.txt* to the issue *TEST-123*:

#### curl ####

    curl --location --request POST 'https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments'
     -u 'email@example.com:<api_token>'
     -H 'X-Atlassian-Token: no-check'
     --form 'file=@"myfile.txt"'

#### Node.js ####

    // This code sample uses the 'node-fetch' and 'form-data' libraries:
     // https://www.npmjs.com/package/node-fetch
     // https://www.npmjs.com/package/form-data
     const fetch = require('node-fetch');
     const FormData = require('form-data');
     const fs = require('fs');
    
     const filePath = 'myfile.txt';
     const form = new FormData();
     const stats = fs.statSync(filePath);
     const fileSizeInBytes = stats.size;
     const fileStream = fs.createReadStream(filePath);
    
     form.append('file', fileStream, {knownLength: fileSizeInBytes});
    
     fetch('https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments', {
         method: 'POST',
         body: form,
         headers: {
             'Authorization': `Basic ${Buffer.from(
                 'email@example.com:'
             ).toString('base64')}`,
             'Accept': 'application/json',
             'X-Atlassian-Token': 'no-check'
         }
     })
         .then(response => {
             console.log(
                 `Response: ${response.status} ${response.statusText}`
             );
             return response.text();
         })
         .then(text => console.log(text))
         .catch(err => console.error(err));

#### Java ####

    // This code sample uses the  'Unirest' library:
     // http://unirest.io/java.html
     HttpResponse response = Unirest.post("https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments")
             .basicAuth("email@example.com", "")
             .header("Accept", "application/json")
             .header("X-Atlassian-Token", "no-check")
             .field("file", new File("myfile.txt"))
             .asJson();
    
             System.out.println(response.getBody());

#### Python ####

    # This code sample uses the 'requests' library:
     # http://docs.python-requests.org
     import requests
     from requests.auth import HTTPBasicAuth
     import json
    
     url = "https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments"
    
     auth = HTTPBasicAuth("email@example.com", "")
    
     headers = {
        "Accept": "application/json",
        "X-Atlassian-Token": "no-check"
     }
    
     response = requests.request(
        "POST",
        url,
        headers = headers,
        auth = auth,
        files = {
             "file": ("myfile.txt", open("myfile.txt","rb"), "application-type")
        }
     )
    
     print(json.dumps(json.loads(response.text), sort_keys=True, indent=4, separators=(",", ": ")))

#### PHP ####

    // This code sample uses the 'Unirest' library:
     // http://unirest.io/php.html
     Unirest\Request::auth('email@example.com', '');
    
     $headers = array(
       'Accept' => 'application/json',
       'X-Atlassian-Token' => 'no-check'
     );
    
     $parameters = array(
       'file' => File::add('myfile.txt')
     );
    
     $response = Unirest\Request::post(
       'https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments',
       $headers,
       $parameters
     );
    
     var_dump($response)

#### Forge ####

    // This sample uses Atlassian Forge and the `form-data` library
     // https://developer.atlassian.com/platform/forge/
     // https://www.npmjs.com/package/form-data
     import api from "@forge/api";
     import FormData from "form-data";
    
     const form = new FormData();
     form.append('file', fileStream, {knownLength: fileSizeInBytes});
    
     const response = await api.asApp().requestJira('/rest/api/2/issue/{issueIdOrKey}/attachments', {
         method: 'POST',
         body: form,
         headers: {
             'Accept': 'application/json',
             'X-Atlassian-Token': 'no-check'
         }
     });
    
     console.log(`Response: ${response.status} ${response.statusText}`);
     console.log(await response.json());

Tip: Use a client library.
Many client libraries have classes for handling multipart POST operations.
For example, in Java, the Apache HTTP Components library provides a "MultiPartEntity" class for multipart POST operations

This operation can be accessed anonymously

**"Permissions" required:** 

 - *Browse Projects* and *Create attachments* " project permission" for the project that the issue is in
 - If "issue-level security" is configured, issue-level security permission to view the issue.
See: https://www.ietf.org/rfc/rfc1867.txt
See: http://hc.apache.org/httpcomponents-client-ga/httpmime/apidocs/org/apache/http/entity/mime/MultipartEntity.html
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/J4lKLg

### Example

```php
/** @var array $response */
$response = $client->addAttachment(
    issueIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `issueIdOrKey` | `string` | The ID or key of the issue that attachments are added to. |

#### Response
