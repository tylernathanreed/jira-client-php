<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectAvatarsTest extends OperationsTestCase
{
    public function testUpdateProjectAvatar(): void
    {
        $request = new Schema\Avatar(
            id: '10010',
        );

        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'updateProjectAvatar',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/avatar',
                'method' => 'put',
                'body' => $request,
                'path' => compact('projectIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
            ],
            response: null,
        );
    }

    public function testDeleteProjectAvatar(): void
    {
        $projectIdOrKey = 'foo';
        $id = 1234;

        $this->assertCall(
            method: 'deleteProjectAvatar',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/avatar/{id}',
                'method' => 'delete',
                'path' => compact('projectIdOrKey', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
                $id,
            ],
            response: null,
        );
    }

    public function testCreateProjectAvatar(): void
    {
        $projectIdOrKey = 'foo';
        $x = 0;
        $y = 0;
        $size = 0;

        $this->assertCall(
            method: 'createProjectAvatar',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/avatar2',
                'method' => 'post',
                'query' => compact('x', 'y', 'size'),
                'path' => compact('projectIdOrKey'),
                'success' => 201,
                'schema' => Schema\Avatar::class,
            ],
            arguments: [
                $projectIdOrKey,
                $x,
                $y,
                $size,
            ],
            response: '{"id":"1010","isDeletable":true,"isSelected":false,"isSystemAvatar":false}',
        );
    }

    public function testGetAllProjectAvatars(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getAllProjectAvatars',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/avatars',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\ProjectAvatars::class,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"custom":[{"id":"1010","isDeletable":true,"isSelected":false,"isSystemAvatar":false,"urls":{"16x16":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10080&avatarType=project","24x24":"https://your-domain.atlassian.net/secure/viewavatar?size=small&avatarId=10080&avatarType=project","32x32":"https://your-domain.atlassian.net/secure/viewavatar?size=medium&avatarId=10080&avatarType=project","48x48":"https://your-domain.atlassian.net/secure/viewavatar?avatarId=10080&avatarType=project"}}],"system":[{"id":"1000","isDeletable":false,"isSelected":false,"isSystemAvatar":true,"urls":{"16x16":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10040&avatarType=project","24x24":"https://your-domain.atlassian.net/secure/viewavatar?size=small&avatarId=10040&avatarType=project","32x32":"https://your-domain.atlassian.net/secure/viewavatar?size=medium&avatarId=10040&avatarType=project","48x48":"https://your-domain.atlassian.net/secure/viewavatar?avatarId=10040&avatarType=project"}}]}',
        );
    }
}
