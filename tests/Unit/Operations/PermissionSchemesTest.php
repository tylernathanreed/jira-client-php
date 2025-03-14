<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class PermissionSchemesTest extends OperationsTestCase
{
    public function testGetAllPermissionSchemes(): void
    {
        $expand = null;

        $this->assertCall(
            method: 'getAllPermissionSchemes',
            call: [
                'uri' => '/rest/api/3/permissionscheme',
                'method' => 'get',
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\PermissionSchemes::class,
            ],
            arguments: [
                $expand,
            ],
            response: '{"permissionSchemes":[{"description":"description","id":10000,"name":"Example permission scheme","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}]}',
        );
    }

    public function testCreatePermissionScheme(): void
    {
        $request = $this->deserialize(Schema\PermissionScheme::class, [
            'description' => 'description',
            'name' => 'Example permission scheme',
            'permissions' => [
                [
                    'holder' => [
                        'parameter' => 'jira-core-users',
                        'type' => 'group',
                        'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
                    ],
                    'permission' => 'ADMINISTER_PROJECTS',
                ],
            ],
        ]);

        $expand = null;

        $this->assertCall(
            method: 'createPermissionScheme',
            call: [
                'uri' => '/rest/api/3/permissionscheme',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 201,
                'schema' => Schema\PermissionScheme::class,
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '{"description":"description","id":10000,"name":"Example permission scheme","permissions":[{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}],"self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}',
        );
    }

    public function testGetPermissionScheme(): void
    {
        $schemeId = 1234;
        $expand = null;

        $this->assertCall(
            method: 'getPermissionScheme',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('schemeId'),
                'success' => 200,
                'schema' => Schema\PermissionScheme::class,
            ],
            arguments: [
                $schemeId,
                $expand,
            ],
            response: '{"description":"description","id":10000,"name":"Example permission scheme","permissions":[{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}],"self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}',
        );
    }

    public function testUpdatePermissionScheme(): void
    {
        $request = $this->deserialize(Schema\PermissionScheme::class, [
            'description' => 'description',
            'name' => 'Example permission scheme',
            'permissions' => [
                [
                    'holder' => [
                        'parameter' => 'jira-core-users',
                        'type' => 'group',
                        'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
                    ],
                    'permission' => 'ADMINISTER_PROJECTS',
                ],
            ],
        ]);

        $schemeId = 1234;
        $expand = null;

        $this->assertCall(
            method: 'updatePermissionScheme',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('expand'),
                'path' => compact('schemeId'),
                'success' => 200,
                'schema' => Schema\PermissionScheme::class,
            ],
            arguments: [
                $request,
                $schemeId,
                $expand,
            ],
            response: '{"description":"description","id":10000,"name":"Example permission scheme","permissions":[{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}],"self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}',
        );
    }

    public function testDeletePermissionScheme(): void
    {
        $schemeId = 1234;

        $this->assertCall(
            method: 'deletePermissionScheme',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}',
                'method' => 'delete',
                'path' => compact('schemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $schemeId,
            ],
            response: null,
        );
    }

    public function testGetPermissionSchemeGrants(): void
    {
        $schemeId = 1234;
        $expand = null;

        $this->assertCall(
            method: 'getPermissionSchemeGrants',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}/permission',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('schemeId'),
                'success' => 200,
                'schema' => Schema\PermissionGrants::class,
            ],
            arguments: [
                $schemeId,
                $expand,
            ],
            response: '{"expand":"user,group,projectRole,field,all","permissions":[{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}]}',
        );
    }

    public function testCreatePermissionGrant(): void
    {
        $request = $this->deserialize(Schema\PermissionGrant::class, [
            'holder' => [
                'parameter' => 'jira-core-users',
                'type' => 'group',
                'value' => 'ca85fac0-d974-40ca-a615-7af99c48d24f',
            ],
            'permission' => 'ADMINISTER_PROJECTS',
        ]);

        $schemeId = 1234;
        $expand = null;

        $this->assertCall(
            method: 'createPermissionGrant',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}/permission',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'path' => compact('schemeId'),
                'success' => 201,
                'schema' => Schema\PermissionGrant::class,
            ],
            arguments: [
                $request,
                $schemeId,
                $expand,
            ],
            response: '{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}',
        );
    }

    public function testGetPermissionSchemeGrant(): void
    {
        $schemeId = 1234;
        $permissionId = 1234;
        $expand = null;

        $this->assertCall(
            method: 'getPermissionSchemeGrant',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('schemeId', 'permissionId'),
                'success' => 200,
                'schema' => Schema\PermissionGrant::class,
            ],
            arguments: [
                $schemeId,
                $permissionId,
                $expand,
            ],
            response: '{"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"ca85fac0-d974-40ca-a615-7af99c48d24f"},"id":10000,"permission":"ADMINISTER_PROJECTS","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/permission/10000"}',
        );
    }

    public function testDeletePermissionSchemeEntity(): void
    {
        $schemeId = 1234;
        $permissionId = 1234;

        $this->assertCall(
            method: 'deletePermissionSchemeEntity',
            call: [
                'uri' => '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}',
                'method' => 'delete',
                'path' => compact('schemeId', 'permissionId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $schemeId,
                $permissionId,
            ],
            response: null,
        );
    }
}
