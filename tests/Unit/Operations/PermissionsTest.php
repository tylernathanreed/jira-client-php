<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class PermissionsTest extends OperationsTestCase
{
    public function testGetMyPermissions(): void
    {
        $projectKey = null;
        $projectId = null;
        $issueKey = null;
        $issueId = null;
        $permissions = 'BROWSE_PROJECTS,EDIT_ISSUES';
        $projectUuid = null;
        $projectConfigurationUuid = null;
        $commentId = null;

        $this->assertCall(
            method: 'getMyPermissions',
            call: [
                'uri' => '/rest/api/3/mypermissions',
                'method' => 'get',
                'query' => compact('projectKey', 'projectId', 'issueKey', 'issueId', 'permissions', 'projectUuid', 'projectConfigurationUuid', 'commentId'),
                'success' => 200,
                'schema' => Schema\Permissions::class,
            ],
            arguments: [
                $projectKey,
                $projectId,
                $issueKey,
                $issueId,
                $permissions,
                $projectUuid,
                $projectConfigurationUuid,
                $commentId,
            ],
            response: '{"permissions":{"EDIT_ISSUES":{"description":"Ability to edit issues.","havePermission":true,"id":"12","key":"EDIT_ISSUES","name":"Edit Issues","type":"PROJECT"}}}',
        );
    }

    public function testGetAllPermissions(): void
    {
        $this->assertCall(
            method: 'getAllPermissions',
            call: [
                'uri' => '/rest/api/3/permissions',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\Permissions::class,
            ],
            arguments: [],
            response: '{"permissions":{"BULK_CHANGE":{"description":"Ability to modify a collection of issues at once. For example, resolve multiple issues in one step.","key":"BULK_CHANGE","name":"Bulk Change","type":"GLOBAL"}}}',
        );
    }

    public function testGetBulkPermissions(): void
    {
        $request = new Schema\BulkPermissionsRequestBean(
            accountId: '5b10a2844c20165700ede21g',
            globalPermissions: [
                'ADMINISTER',
            ],
            projectPermissions: [
                [
                    'issues' => [
                        10010,
                        10011,
                        10012,
                        10013,
                        10014,
                    ],
                    'permissions' => [
                        'EDIT_ISSUES',
                    ],
                    'projects' => [
                        10001,
                    ],
                ],
            ],
        );

        $this->assertCall(
            method: 'getBulkPermissions',
            call: [
                'uri' => '/rest/api/3/permissions/check',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\BulkPermissionGrants::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"globalPermissions":["ADMINISTER"],"projectPermissions":[{"issues":[10010,10013,10014],"permission":"EDIT_ISSUES","projects":[10001]}]}',
        );
    }

    public function testGetPermittedProjects(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getPermittedProjects',
            call: [
                'uri' => '/rest/api/3/permissions/project',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\PermittedProjects::class,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }
}
