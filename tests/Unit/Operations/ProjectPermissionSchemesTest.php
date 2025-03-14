<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectPermissionSchemesTest extends OperationsTestCase
{
    public function testGetProjectIssueSecurityScheme(): void
    {
        $projectKeyOrId = 'foo';

        $this->assertCall(
            method: 'getProjectIssueSecurityScheme',
            call: [
                'uri' => '/rest/api/3/project/{projectKeyOrId}/issuesecuritylevelscheme',
                'method' => 'get',
                'path' => compact('projectKeyOrId'),
                'success' => 200,
                'schema' => Schema\SecurityScheme::class,
            ],
            arguments: [
                $projectKeyOrId,
            ],
            response: '{"defaultSecurityLevelId":10021,"description":"Description for the default issue security scheme","id":10000,"levels":[{"description":"Only the reporter and internal staff can see this issue.","id":"10021","name":"Reporter Only","self":"https://your-domain.atlassian.net/rest/api/3/securitylevel/10021"}],"name":"Default Issue Security Scheme","self":"https://your-domain.atlassian.net/rest/api/3/issuesecurityschemes/10000"}',
        );
    }

    public function testGetAssignedPermissionScheme(): void
    {
        $projectKeyOrId = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'getAssignedPermissionScheme',
            call: [
                'uri' => '/rest/api/3/project/{projectKeyOrId}/permissionscheme',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('projectKeyOrId'),
                'success' => 200,
                'schema' => Schema\PermissionScheme::class,
            ],
            arguments: [
                $projectKeyOrId,
                $expand,
            ],
            response: '{"description":"description","id":10000,"name":"Example permission scheme","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}',
        );
    }

    public function testAssignPermissionScheme(): void
    {
        $request = $this->deserialize(Schema\IdBean::class, [
            'id' => '10000',
        ]);

        $projectKeyOrId = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'assignPermissionScheme',
            call: [
                'uri' => '/rest/api/3/project/{projectKeyOrId}/permissionscheme',
                'method' => 'put',
                'body' => $request,
                'query' => compact('expand'),
                'path' => compact('projectKeyOrId'),
                'success' => 200,
                'schema' => Schema\PermissionScheme::class,
            ],
            arguments: [
                $request,
                $projectKeyOrId,
                $expand,
            ],
            response: '{"description":"description","id":10000,"name":"Example permission scheme","self":"https://your-domain.atlassian.net/rest/api/3/permissionscheme/10000"}',
        );
    }

    public function testGetSecurityLevelsForProject(): void
    {
        $projectKeyOrId = 'foo';

        $this->assertCall(
            method: 'getSecurityLevelsForProject',
            call: [
                'uri' => '/rest/api/3/project/{projectKeyOrId}/securitylevel',
                'method' => 'get',
                'path' => compact('projectKeyOrId'),
                'success' => 200,
                'schema' => Schema\ProjectIssueSecurityLevels::class,
            ],
            arguments: [
                $projectKeyOrId,
            ],
            response: '{"levels":[{"description":"Only the reporter and internal staff can see this issue.","id":"100000","name":"Reporter Only","self":"https://your-domain.atlassian.net/rest/api/3/securitylevel/100000"},{"description":"Only internal staff can see this issue.","id":"100001","name":"Staff Only","self":"https://your-domain.atlassian.net/rest/api/3/securitylevel/100001"}]}',
        );
    }
}
