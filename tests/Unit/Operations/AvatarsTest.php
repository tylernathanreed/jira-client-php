<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AvatarsTest extends OperationsTestCase
{
    public function testGetAllSystemAvatars(): void
    {
        $type = 'project';

        $this->assertCall(
            method: 'getAllSystemAvatars',
            call: [
                'uri' => '/rest/api/3/avatar/{type}/system',
                'method' => 'get',
                'path' => compact('type'),
                'success' => 200,
                'schema' => Schema\SystemAvatars::class,
            ],
            arguments: [
                $type,
            ],
            response: '{"system":[{"id":"1000","isDeletable":false,"isSelected":false,"isSystemAvatar":true,"urls":{"16x16":"/secure/useravatar?size=xsmall&avatarId=10040&avatarType=project","24x24":"/secure/useravatar?size=small&avatarId=10040&avatarType=project","32x32":"/secure/useravatar?size=medium&avatarId=10040&avatarType=project","48x48":"/secure/useravatar?avatarId=10040&avatarType=project"}}]}',
        );
    }

    public function testGetAvatars(): void
    {
        $type = 'foo';
        $entityId = 'foo';

        $this->assertCall(
            method: 'getAvatars',
            call: [
                'uri' => '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}',
                'method' => 'get',
                'path' => compact('type', 'entityId'),
                'success' => 200,
                'schema' => Schema\Avatars::class,
            ],
            arguments: [
                $type,
                $entityId,
            ],
            response: '{"custom":[{"id":"1010","isDeletable":true,"isSelected":false,"isSystemAvatar":false,"urls":{"16x16":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10080&avatarType=project","24x24":"https://your-domain.atlassian.net/secure/viewavatar?size=small&avatarId=10080&avatarType=project","32x32":"https://your-domain.atlassian.net/secure/viewavatar?size=medium&avatarId=10080&avatarType=project","48x48":"https://your-domain.atlassian.net/secure/viewavatar?avatarId=10080&avatarType=project"}}],"system":[{"id":"1000","isDeletable":false,"isSelected":false,"isSystemAvatar":true,"urls":{"16x16":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10040&avatarType=project","24x24":"https://your-domain.atlassian.net/secure/viewavatar?size=small&avatarId=10040&avatarType=project","32x32":"https://your-domain.atlassian.net/secure/viewavatar?size=medium&avatarId=10040&avatarType=project","48x48":"https://your-domain.atlassian.net/secure/viewavatar?avatarId=10040&avatarType=project"}}]}',
        );
    }

    public function testStoreAvatar(): void
    {
        $type = 'foo';
        $entityId = 'foo';
        $size = 0;
        $x = 0;
        $y = 0;

        $this->assertCall(
            method: 'storeAvatar',
            call: [
                'uri' => '/rest/api/3/universal_avatar/type/{type}/owner/{entityId}',
                'method' => 'post',
                'query' => compact('size', 'x', 'y'),
                'path' => compact('type', 'entityId'),
                'success' => 201,
                'schema' => Schema\Avatar::class,
            ],
            arguments: [
                $type,
                $entityId,
                $size,
                $x,
                $y,
            ],
            response: '{"id":"1010","isDeletable":true,"isSelected":false,"isSystemAvatar":false}',
        );
    }

    public function testDeleteAvatar(): void
    {
        $type = 'foo';
        $owningObjectId = 'foo';
        $id = 1234;

        $this->assertCall(
            method: 'deleteAvatar',
            call: [
                'uri' => '/rest/api/3/universal_avatar/type/{type}/owner/{owningObjectId}/avatar/{id}',
                'method' => 'delete',
                'path' => compact('type', 'owningObjectId', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $type,
                $owningObjectId,
                $id,
            ],
            response: null,
        );
    }

    public function testGetAvatarImageByType(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAvatarImageByType',
            call: [
                'uri' => '/rest/api/3/universal_avatar/view/type/{type}',
                'method' => 'get',
                'query' => compact('size', 'format'),
                'path' => compact('type'),
                'success' => 200,
                'schema' => Schema\StreamingResponseBody::class,
            ],
            arguments: [
                $type,
                $size,
                $format,
            ],
            response: null,
        );
    }

    public function testGetAvatarImageByID(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAvatarImageByID',
            call: [
                'uri' => '/rest/api/3/universal_avatar/view/type/{type}/avatar/{id}',
                'method' => 'get',
                'query' => compact('size', 'format'),
                'path' => compact('type', 'id'),
                'success' => 200,
                'schema' => Schema\StreamingResponseBody::class,
            ],
            arguments: [
                $type,
                $id,
                $size,
                $format,
            ],
            response: null,
        );
    }

    public function testGetAvatarImageByOwner(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAvatarImageByOwner',
            call: [
                'uri' => '/rest/api/3/universal_avatar/view/type/{type}/owner/{entityId}',
                'method' => 'get',
                'query' => compact('size', 'format'),
                'path' => compact('type', 'entityId'),
                'success' => 200,
                'schema' => Schema\StreamingResponseBody::class,
            ],
            arguments: [
                $type,
                $entityId,
                $size,
                $format,
            ],
            response: null,
        );
    }
}
