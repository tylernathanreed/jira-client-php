<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueSecuritySchemesTest extends OperationsTestCase
{
    public function testGetIssueSecuritySchemes(): void
    {
        $this->assertCall(
            method: 'getIssueSecuritySchemes',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\SecuritySchemes::class,
            ],
            arguments: [],
            response: '{"issueSecuritySchemes":[{"defaultSecurityLevelId":10021,"description":"Description for the default issue security scheme","id":10000,"name":"Default Issue Security Scheme","self":"https://your-domain.atlassian.net/rest/api/3/issuesecurityschemes/10000"}]}',
        );
    }

    public function testCreateIssueSecurityScheme(): void
    {
        $request = new Schema\CreateIssueSecuritySchemeDetails(
            description: 'Newly created issue security scheme',
            levels: [
                [
                    'description' => 'Newly created level',
                    'isDefault' => true,
                    'members' => [
                        [
                            'parameter' => 'administrators',
                            'type' => 'group',
                        ],
                    ],
                    'name' => 'New level',
                ],
            ],
            name: 'New security scheme',
        );

        $this->assertCall(
            method: 'createIssueSecurityScheme',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SecuritySchemeId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testGetSecurityLevels(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $schemeId = null;
        $onlyDefault = false;

        $this->assertCall(
            method: 'getSecurityLevels',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/level',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'schemeId', 'onlyDefault'),
                'success' => 200,
                'schema' => Schema\PageBeanSecurityLevel::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $schemeId,
                $onlyDefault,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"description":"Only the reporter and internal staff can see this issue.","id":"10021","isDefault":true,"issueSecuritySchemeId":"10001","name":"Reporter Only","self":"https://your-domain.atlassian.net/rest/api/3/issuesecurityscheme/level?id=10021"}]}',
        );
    }

    public function testSetDefaultLevels(): void
    {
        $request = new Schema\SetDefaultLevelsRequest(
            defaultValues: [
                [
                    'defaultLevelId' => '20000',
                    'issueSecuritySchemeId' => '10000',
                ],
                [
                    'defaultLevelId' => '30000',
                    'issueSecuritySchemeId' => '12000',
                ],
            ],
        );

        $this->assertCall(
            method: 'setDefaultLevels',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/level/default',
                'method' => 'put',
                'body' => $request,
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testGetSecurityLevelMembers(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $schemeId = null;
        $levelId = null;
        $expand = null;

        $this->assertCall(
            method: 'getSecurityLevelMembers',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/level/member',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'schemeId', 'levelId', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanSecurityLevelMember::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $schemeId,
                $levelId,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"id":"10000","issueSecurityLevelId":"20010","issueSecuritySchemeId":"10010","holder":{"expand":"group","type":"group"}}]}',
        );
    }

    public function testSearchProjectsUsingSecuritySchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $issueSecuritySchemeId = null;
        $projectId = null;

        $this->assertCall(
            method: 'searchProjectsUsingSecuritySchemes',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/project',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'issueSecuritySchemeId', 'projectId'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueSecuritySchemeToProjectMapping::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $issueSecuritySchemeId,
                $projectId,
            ],
            response: '{"issueSecuritySchemeId":"10000","projectId":"10000"}',
        );
    }

    public function testAssociateSchemesToProjects(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'associateSchemesToProjects',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/project',
                'method' => 'put',
                'body' => $request,
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testSearchSecuritySchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $projectId = null;

        $this->assertCall(
            method: 'searchSecuritySchemes',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'projectId'),
                'success' => 200,
                'schema' => Schema\PageBeanSecuritySchemeWithProjects::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $projectId,
            ],
            response: '{"id":10000,"self":"https://your-domain.atlassian.net/rest/api/3/issuesecurityscheme/10000","name":"Default scheme","description":"Default scheme description","defaultLevel":10001,"projectIds":[10002]}',
        );
    }

    public function testGetIssueSecurityScheme(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getIssueSecurityScheme',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\SecurityScheme::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"defaultSecurityLevelId":10021,"description":"Description for the default issue security scheme","id":10000,"levels":[{"description":"Only the reporter and internal staff can see this issue.","id":"10021","name":"Reporter Only","self":"https://your-domain.atlassian.net/rest/api/3/securitylevel/10021"}],"name":"Default Issue Security Scheme","self":"https://your-domain.atlassian.net/rest/api/3/issuesecurityschemes/10000"}',
        );
    }

    public function testUpdateIssueSecurityScheme(): void
    {
        $request = new Schema\UpdateIssueSecuritySchemeRequestBean(
            description: 'My issue security scheme description',
            name: 'My issue security scheme name',
        );

        $id = 'foo';

        $this->assertCall(
            method: 'updateIssueSecurityScheme',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteSecurityScheme(): void
    {
        $schemeId = 'foo';

        $this->assertCall(
            method: 'deleteSecurityScheme',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}',
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

    public function testAddSecurityLevel(): void
    {
        $request = new Schema\AddSecuritySchemeLevelsRequestBean(
            levels: [
                [
                    'description' => 'First Level Description',
                    'isDefault' => true,
                    'members' => [
                        [
                            'type' => 'reporter',
                        ],
                        [
                            'parameter' => 'jira-administrators',
                            'type' => 'group',
                        ],
                    ],
                    'name' => 'First Level',
                ],
            ],
        );

        $schemeId = 'foo';

        $this->assertCall(
            method: 'addSecurityLevel',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}/level',
                'method' => 'put',
                'body' => $request,
                'path' => compact('schemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $schemeId,
            ],
            response: null,
        );
    }

    public function testUpdateSecurityLevel(): void
    {
        $request = new Schema\UpdateIssueSecurityLevelDetails(
            description: 'New level description',
            name: 'New level name',
        );

        $schemeId = 'foo';
        $levelId = 'foo';

        $this->assertCall(
            method: 'updateSecurityLevel',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('schemeId', 'levelId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $schemeId,
                $levelId,
            ],
            response: null,
        );
    }

    public function testRemoveLevel(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'removeLevel',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}',
                'method' => 'delete',
                'query' => compact('replaceWith'),
                'path' => compact('schemeId', 'levelId'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $schemeId,
                $levelId,
                $replaceWith,
            ],
            response: null,
        );
    }

    public function testAddSecurityLevelMembers(): void
    {
        $request = new Schema\SecuritySchemeMembersRequest(
            members: [
                [
                    'type' => 'reporter',
                ],
                [
                    'parameter' => 'jira-administrators',
                    'type' => 'group',
                ],
            ],
        );

        $schemeId = 'foo';
        $levelId = 'foo';

        $this->assertCall(
            method: 'addSecurityLevelMembers',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}/member',
                'method' => 'put',
                'body' => $request,
                'path' => compact('schemeId', 'levelId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $schemeId,
                $levelId,
            ],
            response: null,
        );
    }

    public function testRemoveMemberFromSecurityLevel(): void
    {
        $schemeId = 'foo';
        $levelId = 'foo';
        $memberId = 'foo';

        $this->assertCall(
            method: 'removeMemberFromSecurityLevel',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{schemeId}/level/{levelId}/member/{memberId}',
                'method' => 'delete',
                'path' => compact('schemeId', 'levelId', 'memberId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $schemeId,
                $levelId,
                $memberId,
            ],
            response: null,
        );
    }
}
