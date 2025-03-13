<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectRoleActorsTest extends OperationsTestCase
{
    public function testSetActors(): void
    {
        $request = new Schema\ProjectRoleActorsUpdateBean(
            categorisedActors: [
                'atlassian-group-role-actor-id' => [
                    0 => '952d12c3-5b5b-4d04-bb32-44d383afc4b2',
                ],
                'atlassian-user-role-actor' => [
                    0 => '12345678-9abc-def1-2345-6789abcdef12',
                ],
            ],
        );

        $projectIdOrKey = 'foo';
        $id = 1234;

        $this->assertCall(
            method: 'setActors',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/role/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('projectIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testAddActorUsers(): void
    {
        $request = new Schema\ActorsMap(
            groupId: [
                '952d12c3-5b5b-4d04-bb32-44d383afc4b2',
            ],
        );

        $projectIdOrKey = 'foo';
        $id = 1234;

        $this->assertCall(
            method: 'addActorUsers',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/role/{id}',
                'method' => 'post',
                'body' => $request,
                'path' => compact('projectIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testDeleteActor(): void
    {
        $projectIdOrKey = 'foo';
        $id = 1234;
        $user = '5b10ac8d82e05b22cc7d4ef5';
        $group = null;
        $groupId = null;

        $this->assertCall(
            method: 'deleteActor',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/role/{id}',
                'method' => 'delete',
                'query' => compact('user', 'group', 'groupId'),
                'path' => compact('projectIdOrKey', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
                $id,
                $user,
                $group,
                $groupId,
            ],
            response: null,
        );
    }

    public function testGetProjectRoleActorsForRole(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getProjectRoleActorsForRole',
            call: [
                'uri' => '/rest/api/3/role/{id}/actors',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"}]}',
        );
    }

    public function testAddProjectRoleActorsToRole(): void
    {
        $request = new Schema\ActorInputBean(
            user: [
                'admin',
            ],
        );

        $id = 1234;

        $this->assertCall(
            method: 'addProjectRoleActorsToRole',
            call: [
                'uri' => '/rest/api/3/role/{id}/actors',
                'method' => 'post',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"}]}',
        );
    }

    public function testDeleteProjectRoleActorsFromRole(): void
    {
        $id = 1234;
        $user = '5b10ac8d82e05b22cc7d4ef5';
        $groupId = null;
        $group = null;

        $this->assertCall(
            method: 'deleteProjectRoleActorsFromRole',
            call: [
                'uri' => '/rest/api/3/role/{id}/actors',
                'method' => 'delete',
                'query' => compact('user', 'groupId', 'group'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $id,
                $user,
                $groupId,
                $group,
            ],
            response: '{"actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"}]}',
        );
    }
}
