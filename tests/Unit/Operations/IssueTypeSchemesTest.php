<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueTypeSchemesTest extends OperationsTestCase
{
    public function testGetAllIssueTypeSchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $orderBy = 'id';
        $expand = '';
        $queryString = '';

        $this->assertCall(
            method: 'getAllIssueTypeSchemes',
            call: [
                'uri' => '/rest/api/3/issuetypescheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'orderBy', 'expand', 'queryString'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $orderBy,
                $expand,
                $queryString,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"id":"10000","name":"Default Issue Type Scheme","description":"Default issue type scheme is the list of global issue types. All newly created issue types will automatically be added to this scheme.","defaultIssueTypeId":"10003","isDefault":true},{"id":"10001","name":"SUP: Kanban Issue Type Scheme","description":"A collection of issue types suited to use in a kanban style project.","projects":{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}},{"id":"10002","name":"HR: Scrum issue type scheme","description":"","defaultIssueTypeId":"10004","issueTypes":{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"description":"Improvement Issue Type","hierarchyLevel":-1,"iconUrl":"www.example.com","id":"1000L","name":"Improvements","subtask":true}]}}]}',
        );
    }

    public function testCreateIssueTypeScheme(): void
    {
        $request = $this->deserialize(Schema\IssueTypeSchemeDetails::class, [
            'defaultIssueTypeId' => '10002',
            'description' => 'A collection of issue types suited to use in a kanban style project.',
            'issueTypeIds' => [
                '10001',
                '10002',
                '10003',
            ],
            'name' => 'Kanban Issue Type Scheme',
        ]);

        $this->assertCall(
            method: 'createIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\IssueTypeSchemeID::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issueTypeSchemeId":"10010"}',
        );
    }

    public function testGetIssueTypeSchemesMapping(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $issueTypeSchemeId = null;

        $this->assertCall(
            method: 'getIssueTypeSchemesMapping',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/mapping',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'issueTypeSchemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeSchemeMapping::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $issueTypeSchemeId,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":4,"values":[{"issueTypeSchemeId":"10000","issueTypeId":"10000"},{"issueTypeSchemeId":"10000","issueTypeId":"10001"},{"issueTypeSchemeId":"10000","issueTypeId":"10002"},{"issueTypeSchemeId":"10001","issueTypeId":"10000"}]}',
        );
    }

    public function testGetIssueTypeSchemeForProjects(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIssueTypeSchemeForProjects',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/project',
                'method' => 'get',
                'query' => compact('projectId', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeSchemeProjects::class,
            ],
            arguments: [
                $projectId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"issueTypeScheme":{"id":"10000","name":"Default Issue Type Scheme","description":"Default issue type scheme is the list of global issue types. All newly created issue types will automatically be added to this scheme.","defaultIssueTypeId":"10003","isDefault":true},"projectIds":["10000","10001"]},{"issueTypeScheme":{"id":"10001","name":"SUP: Kanban Issue Type Scheme","description":"A collection of issue types suited to use in a kanban style project."},"projectIds":["10002"]},{"issueTypeScheme":{"id":"10002","name":"HR: Scrum issue type scheme","description":"","defaultIssueTypeId":"10004","issueTypes":{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"description":"Improvement Issue Type","hierarchyLevel":-1,"iconUrl":"www.example.com","id":"1000L","name":"Improvements","subtask":true}]}},"projectIds":["10003","10004","10005"]}]}',
        );
    }

    public function testAssignIssueTypeSchemeToProject(): void
    {
        $request = $this->deserialize(Schema\IssueTypeSchemeProjectAssociation::class, [
            'issueTypeSchemeId' => '10000',
            'projectId' => '10000',
        ]);

        $this->assertCall(
            method: 'assignIssueTypeSchemeToProject',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/project',
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

    public function testUpdateIssueTypeScheme(): void
    {
        $request = $this->deserialize(Schema\IssueTypeSchemeUpdateDetails::class, [
            'defaultIssueTypeId' => '10002',
            'description' => 'A collection of issue types suited to use in a kanban style project.',
            'name' => 'Kanban Issue Type Scheme',
        ]);

        $issueTypeSchemeId = 1234;

        $this->assertCall(
            method: 'updateIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/{issueTypeSchemeId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeSchemeId,
            ],
            response: null,
        );
    }

    public function testDeleteIssueTypeScheme(): void
    {
        $issueTypeSchemeId = 1234;

        $this->assertCall(
            method: 'deleteIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/{issueTypeSchemeId}',
                'method' => 'delete',
                'path' => compact('issueTypeSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueTypeSchemeId,
            ],
            response: null,
        );
    }

    public function testAddIssueTypesToIssueTypeScheme(): void
    {
        $request = $this->deserialize(Schema\IssueTypeIds::class, [
            'issueTypeIds' => [
                '10000',
                '10002',
                '10003',
            ],
        ]);

        $issueTypeSchemeId = 1234;

        $this->assertCall(
            method: 'addIssueTypesToIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeSchemeId,
            ],
            response: null,
        );
    }

    public function testReorderIssueTypesInIssueTypeScheme(): void
    {
        $request = $this->deserialize(Schema\OrderOfIssueTypes::class, [
            'after' => '10008',
            'issueTypeIds' => [
                '10001',
                '10004',
                '10002',
            ],
        ]);

        $issueTypeSchemeId = 1234;

        $this->assertCall(
            method: 'reorderIssueTypesInIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/move',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeSchemeId,
            ],
            response: null,
        );
    }

    public function testRemoveIssueTypeFromIssueTypeScheme(): void
    {
        $issueTypeSchemeId = 1234;
        $issueTypeId = 1234;

        $this->assertCall(
            method: 'removeIssueTypeFromIssueTypeScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescheme/{issueTypeSchemeId}/issuetype/{issueTypeId}',
                'method' => 'delete',
                'path' => compact('issueTypeSchemeId', 'issueTypeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueTypeSchemeId,
                $issueTypeId,
            ],
            response: null,
        );
    }
}
