<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectRolesTest extends OperationsTestCase
{
    public function testGetProjectRoles(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getProjectRoles',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/role',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"Administrators":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10002","Developers":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10000","Users":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10001"}',
        );
    }

    public function testGetProjectRole(): void
    {
        $projectIdOrKey = 'foo';
        $id = 1234;
        $excludeInactiveUsers = false;

        $this->assertCall(
            method: 'getProjectRole',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/role/{id}',
                'method' => 'get',
                'query' => compact('excludeInactiveUsers'),
                'path' => compact('projectIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $projectIdOrKey,
                $id,
                $excludeInactiveUsers,
            ],
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testGetProjectRoleDetails(): void
    {
        $projectIdOrKey = 'foo';
        $currentMember = false;
        $excludeConnectAddons = false;

        $this->assertCall(
            method: 'getProjectRoleDetails',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/roledetails',
                'method' => 'get',
                'query' => compact('currentMember', 'excludeConnectAddons'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => [Schema\ProjectRoleDetails::class],
            ],
            arguments: [
                $projectIdOrKey,
                $currentMember,
                $excludeConnectAddons,
            ],
            response: '[{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","admin":false,"default":true,"roleConfigurable":true,"translatedName":"Developers"}]',
        );
    }

    public function testGetAllProjectRoles(): void
    {
        $this->assertCall(
            method: 'getAllProjectRoles',
            call: [
                'uri' => '/rest/api/3/role',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ProjectRole::class],
            ],
            arguments: [],
            response: '[{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}]',
        );
    }

    public function testCreateProjectRole(): void
    {
        $request = $this->deserialize(Schema\CreateUpdateRoleRequestBean::class, [
            'description' => 'A project role that represents developers in a project',
            'name' => 'Developers',
        ]);

        $this->assertCall(
            method: 'createProjectRole',
            call: [
                'uri' => '/rest/api/3/role',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"description":"A project role that represents developers in a project","id":10360,"name":"Developers","self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testGetProjectRoleById(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getProjectRoleById',
            call: [
                'uri' => '/rest/api/3/role/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testFullyUpdateProjectRole(): void
    {
        $request = $this->deserialize(Schema\CreateUpdateRoleRequestBean::class, [
            'description' => 'A project role that represents developers in a project',
            'name' => 'Developers',
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'fullyUpdateProjectRole',
            call: [
                'uri' => '/rest/api/3/role/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectRole::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testPartialUpdateProjectRole(): void
    {
        $request = $this->deserialize(Schema\CreateUpdateRoleRequestBean::class, [
            'description' => 'A project role that represents developers in a project',
            'name' => 'Developers',
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'partialUpdateProjectRole',
            call: [
                'uri' => '/rest/api/3/role/{id}',
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
            response: '{"actors":[{"actorGroup":{"displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2","name":"jira-developers"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor","user":"jira-developers"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"description":"A project role that represents developers in a project","id":10360,"name":"Developers","scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360"}',
        );
    }

    public function testDeleteProjectRole(): void
    {
        $id = 1234;
        $swap = null;

        $this->assertCall(
            method: 'deleteProjectRole',
            call: [
                'uri' => '/rest/api/3/role/{id}',
                'method' => 'delete',
                'query' => compact('swap'),
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
                $swap,
            ],
            response: null,
        );
    }
}
