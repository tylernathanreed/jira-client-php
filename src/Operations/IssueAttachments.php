<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueAttachments
{
    /**
     * Returns the contents of an attachment.
     * A `Range` header can be set to define a range of bytes within the attachment to download.
     * See the "HTTP Range header standard" for details
     * 
     * To return a thumbnail of the attachment, use "Get attachment thumbnail"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** For the issue containing the attachment:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If attachments are added in private comments, the comment-level restriction will be applied.
     * 
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Range
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $id The ID of the attachment.
     * @param bool $redirect Whether a redirect is provided for the attachment download.
     *                       Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
     */
    public function getAttachmentContent(
        string $id,
        ?bool $redirect = true,
    ): true {
        return $this->call(
            uri: '/rest/api/3/attachment/content/{id}',
            method: 'get',
            query: compact('redirect'),
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns the attachment settings, that is, whether attachments are enabled and the maximum attachment size allowed
     * 
     * Note that there are also "project permissions" that restrict whether users can create and delete attachments
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function getAttachmentMeta(): Schema\AttachmentSettings
    {
        return $this->call(
            uri: '/rest/api/3/attachment/meta',
            method: 'get',
            success: 200,
            schema: Schema\AttachmentSettings::class,
        );
    }

    /**
     * Returns the thumbnail of an attachment
     * 
     * To return the attachment contents, use "Get attachment content"
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** For the issue containing the attachment:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If attachments are added in private comments, the comment-level restriction will be applied.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $id The ID of the attachment.
     * @param bool $redirect Whether a redirect is provided for the attachment download.
     *                       Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
     * @param bool $fallbackToDefault Whether a default thumbnail is returned when the requested thumbnail is not found.
     * @param int $width The maximum width to scale the thumbnail to.
     * @param int $height The maximum height to scale the thumbnail to.
     */
    public function getAttachmentThumbnail(
        string $id,
        ?bool $redirect = true,
        ?bool $fallbackToDefault = true,
        ?int $width = null,
        ?int $height = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/attachment/thumbnail/{id}',
            method: 'get',
            query: compact('redirect', 'fallbackToDefault', 'width', 'height'),
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns the metadata for an attachment.
     * Note that the attachment itself is not returned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:**
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If attachments are added in private comments, the comment-level restriction will be applied.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $id The ID of the attachment.
     */
    public function getAttachment(
        string $id,
    ): Schema\AttachmentMetadata {
        return $this->call(
            uri: '/rest/api/3/attachment/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\AttachmentMetadata::class,
        );
    }

    /**
     * Deletes an attachment from an issue
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** For the project holding the issue containing the attachment:
     * 
     *  - *Delete own attachments* "project permission" to delete an attachment created by the calling user
     *  - *Delete all attachments* "project permission" to delete an attachment created by any user.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $id The ID of the attachment.
     */
    public function removeAttachment(
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/attachment/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the metadata for the contents of an attachment, if it is an archive, and metadata for the attachment itself.
     * For example, if the attachment is a ZIP archive, then information about the files in the archive is returned and metadata for the ZIP archive.
     * Currently, only the ZIP archive format is supported
     * 
     * Use this operation to retrieve data that is presented to the user, as this operation returns the metadata for the attachment itself, such as the attachment's ID and name.
     * Otherwise, use " Get contents metadata for an expanded attachment", which only returns the metadata for the attachment's contents
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** For the issue containing the attachment:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If attachments are added in private comments, the comment-level restriction will be applied.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $id The ID of the attachment.
     */
    public function expandAttachmentForHumans(
        string $id,
    ): Schema\AttachmentArchiveMetadataReadable {
        return $this->call(
            uri: '/rest/api/3/attachment/{id}/expand/human',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\AttachmentArchiveMetadataReadable::class,
        );
    }

    /**
     * Returns the metadata for the contents of an attachment, if it is an archive.
     * For example, if the attachment is a ZIP archive, then information about the files in the archive is returned.
     * Currently, only the ZIP archive format is supported
     * 
     * Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment.
     * Otherwise, to retrieve data to present to the user, use " Get all metadata for an expanded attachment" which also returns the metadata for the attachment itself, such as the attachment's ID and name
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** For the issue containing the attachment:
     * 
     *  - *Browse projects* "project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue
     *  - If attachments are added in private comments, the comment-level restriction will be applied.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $id The ID of the attachment.
     */
    public function expandAttachmentForMachines(
        string $id,
    ): Schema\AttachmentArchiveImpl {
        return $this->call(
            uri: '/rest/api/3/attachment/{id}/expand/raw',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\AttachmentArchiveImpl::class,
        );
    }

    /**
     * Adds one or more attachments to an issue.
     * Attachments are posted as multipart/form-data ("RFC 1867")
     * 
     * Note that:
     * 
     *  - The request must have a `X-Atlassian-Token: no-check` header, if not it is blocked.
     * See "Special headers" for more information
     *  - The name of the multipart/form-data parameter that contains the attachments must be `file`
     * 
     * The following examples upload a file called *myfile.txt* to the issue *TEST-123*:
     * 
     * #### curl ####
     * 
     *     curl --location --request POST 'https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments'
     *      -u 'email@example.com:<api_token>'
     *      -H 'X-Atlassian-Token: no-check'
     *      --form 'file=@"myfile.txt"'
     * 
     * #### Node.js ####
     * 
     *     // This code sample uses the 'node-fetch' and 'form-data' libraries:
     *      // https://www.npmjs.com/package/node-fetch
     *      // https://www.npmjs.com/package/form-data
     *      const fetch = require('node-fetch');
     *      const FormData = require('form-data');
     *      const fs = require('fs');
     *     
     *      const filePath = 'myfile.txt';
     *      const form = new FormData();
     *      const stats = fs.statSync(filePath);
     *      const fileSizeInBytes = stats.size;
     *      const fileStream = fs.createReadStream(filePath);
     *     
     *      form.append('file', fileStream, {knownLength: fileSizeInBytes});
     *     
     *      fetch('https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments', {
     *          method: 'POST',
     *          body: form,
     *          headers: {
     *              'Authorization': `Basic ${Buffer.from(
     *                  'email@example.com:'
     *              ).toString('base64')}`,
     *              'Accept': 'application/json',
     *              'X-Atlassian-Token': 'no-check'
     *          }
     *      })
     *          .then(response => {
     *              console.log(
     *                  `Response: ${response.status} ${response.statusText}`
     *              );
     *              return response.text();
     *          })
     *          .then(text => console.log(text))
     *          .catch(err => console.error(err));
     * 
     * #### Java ####
     * 
     *     // This code sample uses the  'Unirest' library:
     *      // http://unirest.io/java.html
     *      HttpResponse response = Unirest.post("https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments")
     *              .basicAuth("email@example.com", "")
     *              .header("Accept", "application/json")
     *              .header("X-Atlassian-Token", "no-check")
     *              .field("file", new File("myfile.txt"))
     *              .asJson();
     *     
     *              System.out.println(response.getBody());
     * 
     * #### Python ####
     * 
     *     # This code sample uses the 'requests' library:
     *      # http://docs.python-requests.org
     *      import requests
     *      from requests.auth import HTTPBasicAuth
     *      import json
     *     
     *      url = "https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments"
     *     
     *      auth = HTTPBasicAuth("email@example.com", "")
     *     
     *      headers = {
     *         "Accept": "application/json",
     *         "X-Atlassian-Token": "no-check"
     *      }
     *     
     *      response = requests.request(
     *         "POST",
     *         url,
     *         headers = headers,
     *         auth = auth,
     *         files = {
     *              "file": ("myfile.txt", open("myfile.txt","rb"), "application-type")
     *         }
     *      )
     *     
     *      print(json.dumps(json.loads(response.text), sort_keys=True, indent=4, separators=(",", ": ")))
     * 
     * #### PHP ####
     * 
     *     // This code sample uses the 'Unirest' library:
     *      // http://unirest.io/php.html
     *      Unirest\Request::auth('email@example.com', '');
     *     
     *      $headers = array(
     *        'Accept' => 'application/json',
     *        'X-Atlassian-Token' => 'no-check'
     *      );
     *     
     *      $parameters = array(
     *        'file' => File::add('myfile.txt')
     *      );
     *     
     *      $response = Unirest\Request::post(
     *        'https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments',
     *        $headers,
     *        $parameters
     *      );
     *     
     *      var_dump($response)
     * 
     * #### Forge ####
     * 
     *     // This sample uses Atlassian Forge and the `form-data` library
     *      // https://developer.atlassian.com/platform/forge/
     *      // https://www.npmjs.com/package/form-data
     *      import api from "@forge/api";
     *      import FormData from "form-data";
     *     
     *      const form = new FormData();
     *      form.append('file', fileStream, {knownLength: fileSizeInBytes});
     *     
     *      const response = await api.asApp().requestJira('/rest/api/2/issue/{issueIdOrKey}/attachments', {
     *          method: 'POST',
     *          body: form,
     *          headers: {
     *              'Accept': 'application/json',
     *              'X-Atlassian-Token': 'no-check'
     *          }
     *      });
     *     
     *      console.log(`Response: ${response.status} ${response.statusText}`);
     *      console.log(await response.json());
     * 
     * Tip: Use a client library.
     * Many client libraries have classes for handling multipart POST operations.
     * For example, in Java, the Apache HTTP Components library provides a "MultiPartEntity" class for multipart POST operations
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** 
     * 
     *  - *Browse Projects* and *Create attachments* " project permission" for the project that the issue is in
     *  - If "issue-level security" is configured, issue-level security permission to view the issue.
     * 
     * @link https://www.ietf.org/rfc/rfc1867.txt
     * @link http://hc.apache.org/httpcomponents-client-ga/httpmime/apidocs/org/apache/http/entity/mime/MultipartEntity.html
     * @link https://confluence.atlassian.com/x/yodKLg
     * @link https://confluence.atlassian.com/x/J4lKLg
     * 
     * @param string $issueIdOrKey The ID or key of the issue that attachments are added to.
     * 
     * @return list<Schema\Attachment>
     */
    public function addAttachment(
        string $issueIdOrKey,
    ): array {
        return $this->call(
            uri: '/rest/api/3/issue/{issueIdOrKey}/attachments',
            method: 'post',
            path: compact('issueIdOrKey'),
            success: 200,
            schema: [Schema\Attachment::class],
        );
    }
}
