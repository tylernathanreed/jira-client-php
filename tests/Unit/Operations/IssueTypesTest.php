<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueTypesTest extends OperationsTestCase
{
    public function testGetIssueAllTypes(): void
    {
        $this->assertCall(
            method: 'getIssueAllTypes',
            call: [
                'uri' => '/rest/api/3/issuetype',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\IssueTypeDetails::class],
            ],
            arguments: [],
            response: '[{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}]',
        );
    }

    public function testCreateIssueType(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'createIssueType',
            call: [
                'uri' => '/rest/api/3/issuetype',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\IssueTypeDetails::class,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testGetIssueTypesForProject(): void
    {
        $projectId = 1234;
        $level = null;

        $this->assertCall(
            method: 'getIssueTypesForProject',
            call: [
                'uri' => '/rest/api/3/issuetype/project',
                'method' => 'get',
                'query' => compact('projectId', 'level'),
                'success' => 200,
                'schema' => [Schema\IssueTypeDetails::class],
            ],
            arguments: [
                $projectId,
                $level,
            ],
            response: '[{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false},{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false}]',
        );
    }

    public function testGetIssueType(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getIssueType',
            call: [
                'uri' => '/rest/api/3/issuetype/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\IssueTypeDetails::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false}',
        );
    }

    public function testUpdateIssueType(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updateIssueType',
            call: [
                'uri' => '/rest/api/3/issuetype/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\IssueTypeDetails::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteIssueType(): void
    {
        $id = 'foo';
        $alternativeIssueTypeId = null;

        $this->assertCall(
            method: 'deleteIssueType',
            call: [
                'uri' => '/rest/api/3/issuetype/{id}',
                'method' => 'delete',
                'query' => compact('alternativeIssueTypeId'),
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
                $alternativeIssueTypeId,
            ],
            response: null,
        );
    }

    public function testGetAlternativeIssueTypes(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getAlternativeIssueTypes',
            call: [
                'uri' => '/rest/api/3/issuetype/{id}/alternatives',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => [Schema\IssueTypeDetails::class],
            ],
            arguments: [
                $id,
            ],
            response: '[{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}]',
        );
    }

    public function testCreateIssueTypeAvatar(): void
    {
        $id = 'foo';
        $size = 1234;
        $x = 0;
        $y = 0;

        $this->assertCall(
            method: 'createIssueTypeAvatar',
            call: [
                'uri' => '/rest/api/3/issuetype/{id}/avatar2',
                'method' => 'post',
                'query' => compact('size', 'x', 'y'),
                'path' => compact('id'),
                'success' => 201,
                'schema' => Schema\Avatar::class,
            ],
            arguments: [
                $id,
                $size,
                $x,
                $y,
            ],
            response: '{"id":"1010","isDeletable":true,"isSelected":false,"isSystemAvatar":false}',
        );
    }
}
