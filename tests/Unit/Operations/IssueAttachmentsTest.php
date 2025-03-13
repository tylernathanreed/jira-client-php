<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueAttachmentsTest extends OperationsTestCase
{
    public function testGetAttachmentContent(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAttachmentContent',
            call: [
                'uri' => '/rest/api/3/attachment/content/{id}',
                'method' => 'get',
                'query' => compact('redirect'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
                $redirect,
            ],
            response: null,
        );
    }

    public function testGetAttachmentMeta(): void
    {
        $this->assertCall(
            method: 'getAttachmentMeta',
            call: [
                'uri' => '/rest/api/3/attachment/meta',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\AttachmentSettings::class,
            ],
            arguments: [],
            response: '{"enabled":true,"uploadLimit":1000000}',
        );
    }

    public function testGetAttachmentThumbnail(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAttachmentThumbnail',
            call: [
                'uri' => '/rest/api/3/attachment/thumbnail/{id}',
                'method' => 'get',
                'query' => compact('redirect', 'fallbackToDefault', 'width', 'height'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
                $redirect,
                $fallbackToDefault,
                $width,
                $height,
            ],
            response: null,
        );
    }

    public function testGetAttachment(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getAttachment',
            call: [
                'uri' => '/rest/api/3/attachment/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\AttachmentMetadata::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10000","created":"2022-10-06T07:32:47.000+0000","filename":"picture.jpg","id":10000,"mimeType":"image/jpeg","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10000","size":23123,"thumbnail":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/thumbnail/10000"}',
        );
    }

    public function testRemoveAttachment(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'removeAttachment',
            call: [
                'uri' => '/rest/api/3/attachment/{id}',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testExpandAttachmentForHumans(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'expandAttachmentForHumans',
            call: [
                'uri' => '/rest/api/3/attachment/{id}/expand/human',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\AttachmentArchiveMetadataReadable::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"entries":[{"index":0,"label":"MG00N067.JPG","mediaType":"image/jpeg","path":"MG00N067.JPG","size":"119 kB"},{"index":1,"label":"Allegro from Duet in C Major.mp3","mediaType":"audio/mpeg","path":"Allegro from Duet in C Major.mp3","size":"1.36 MB"},{"index":2,"label":"long/path/thanks/to/.../reach/the/leaf.txt","mediaType":"text/plain","path":"long/path/thanks/to/lots/of/subdirectories/inside/making/it/quite/hard/to/reach/the/leaf.txt","size":"0.0 k"}],"id":7237823,"mediaType":"application/zip","name":"images.zip","totalEntryCount":39}',
        );
    }

    public function testExpandAttachmentForMachines(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'expandAttachmentForMachines',
            call: [
                'uri' => '/rest/api/3/attachment/{id}/expand/raw',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\AttachmentArchiveImpl::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"entries":[{"entryIndex":0,"mediaType":"audio/mpeg","name":"Allegro from Duet in C Major.mp3","size":1430174},{"entryIndex":1,"mediaType":"text/rtf","name":"lrm.rtf","size":331}],"totalEntryCount":24}',
        );
    }

    public function testAddAttachment(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'addAttachment',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/attachments',
                'method' => 'post',
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => [Schema\Attachment::class],
            ],
            arguments: [
                $issueIdOrKey,
            ],
            response: '[{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"content":"https://your-domain.atlassian.net/rest/api/3/attachment/content/10000","created":1651316514000,"filename":"picture.jpg","id":"10001","mimeType":"image/jpeg","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10000","size":23123,"thumbnail":"https://your-domain.atlassian.net/rest/api/3/attachment/thumbnail/10000"},{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"content":"https://your-domain.atlassian.net/rest/api/3/attachment/content/10001","created":1658898511000,"filename":"dbeuglog.txt","mimeType":"text/plain","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10001","size":2460}]',
        );
    }
}
