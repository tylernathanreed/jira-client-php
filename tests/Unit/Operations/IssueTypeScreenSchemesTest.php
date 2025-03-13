<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueTypeScreenSchemesTest extends OperationsTestCase
{
    public function testGetIssueTypeScreenSchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $queryString = '';
        $orderBy = 'id';
        $expand = '';

        $this->assertCall(
            method: 'getIssueTypeScreenSchemes',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'queryString', 'orderBy', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeScreenScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $queryString,
                $orderBy,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":2,"values":[{"id":"1","name":"Default Issue Type Screen Scheme","description":"The default issue type screen scheme"},{"id":"10000","name":"Office issue type screen scheme","description":"Managing office projects","projects":{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}}]}',
        );
    }

    public function testCreateIssueTypeScreenScheme(): void
    {
        $request = new Schema\IssueTypeScreenSchemeDetails(
            issueTypeMappings: [
                [
                    'issueTypeId' => 'default',
                    'screenSchemeId' => '10001',
                ],
                [
                    'issueTypeId' => '10001',
                    'screenSchemeId' => '10002',
                ],
                [
                    'issueTypeId' => '10002',
                    'screenSchemeId' => '10002',
                ],
            ],
            name: 'Scrum issue type screen scheme',
        );

        $this->assertCall(
            method: 'createIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\IssueTypeScreenSchemeId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testGetIssueTypeScreenSchemeMappings(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $issueTypeScreenSchemeId = null;

        $this->assertCall(
            method: 'getIssueTypeScreenSchemeMappings',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/mapping',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'issueTypeScreenSchemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeScreenSchemeItem::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $issueTypeScreenSchemeId,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":4,"values":[{"issueTypeId":"10000","issueTypeScreenSchemeId":"10020","screenSchemeId":"10010"},{"issueTypeId":"10001","issueTypeScreenSchemeId":"10021","screenSchemeId":"10010"},{"issueTypeId":"10002","issueTypeScreenSchemeId":"10022","screenSchemeId":"10010"},{"issueTypeId":"default","issueTypeScreenSchemeId":"10023","screenSchemeId":"10011"}]}',
        );
    }

    public function testGetIssueTypeScreenSchemeProjectAssociations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIssueTypeScreenSchemeProjectAssociations',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/project',
                'method' => 'get',
                'query' => compact('projectId', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeScreenSchemesProjects::class,
            ],
            arguments: [
                $projectId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"issueTypeScreenScheme":{"id":"1","name":"Default Issue Type Screen Scheme","description":"The default issue type screen scheme"},"projectIds":["10000","10001"]}]}',
        );
    }

    public function testAssignIssueTypeScreenSchemeToProject(): void
    {
        $request = new Schema\IssueTypeScreenSchemeProjectAssociation(
            issueTypeScreenSchemeId: '10001',
            projectId: '10002',
        );

        $this->assertCall(
            method: 'assignIssueTypeScreenSchemeToProject',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/project',
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

    public function testUpdateIssueTypeScreenScheme(): void
    {
        $request = new Schema\IssueTypeScreenSchemeUpdateDetails(
            description: 'Screens for scrum issue types.',
            name: 'Scrum scheme',
        );

        $issueTypeScreenSchemeId = 'foo';

        $this->assertCall(
            method: 'updateIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeScreenSchemeId,
            ],
            response: null,
        );
    }

    public function testDeleteIssueTypeScreenScheme(): void
    {
        $issueTypeScreenSchemeId = 'foo';

        $this->assertCall(
            method: 'deleteIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}',
                'method' => 'delete',
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueTypeScreenSchemeId,
            ],
            response: null,
        );
    }

    public function testAppendMappingsForIssueTypeScreenScheme(): void
    {
        $request = new Schema\IssueTypeScreenSchemeMappingDetails(
            issueTypeMappings: [
                [
                    'issueTypeId' => '10000',
                    'screenSchemeId' => '10001',
                ],
                [
                    'issueTypeId' => '10001',
                    'screenSchemeId' => '10002',
                ],
                [
                    'issueTypeId' => '10002',
                    'screenSchemeId' => '10002',
                ],
            ],
        );

        $issueTypeScreenSchemeId = 'foo';

        $this->assertCall(
            method: 'appendMappingsForIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeScreenSchemeId,
            ],
            response: null,
        );
    }

    public function testUpdateDefaultScreenScheme(): void
    {
        $request = new Schema\UpdateDefaultScreenScheme(
            screenSchemeId: '10010',
        );

        $issueTypeScreenSchemeId = 'foo';

        $this->assertCall(
            method: 'updateDefaultScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping/default',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeScreenSchemeId,
            ],
            response: null,
        );
    }

    public function testRemoveMappingsFromIssueTypeScreenScheme(): void
    {
        $request = new Schema\IssueTypeIds(
            issueTypeIds: [
                '10000',
                '10001',
                '10004',
            ],
        );

        $issueTypeScreenSchemeId = 'foo';

        $this->assertCall(
            method: 'removeMappingsFromIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/mapping/remove',
                'method' => 'post',
                'body' => $request,
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueTypeScreenSchemeId,
            ],
            response: null,
        );
    }

    public function testGetProjectsForIssueTypeScreenScheme(): void
    {
        $issueTypeScreenSchemeId = 1234;
        $startAt = 0;
        $maxResults = 50;
        $query = '';

        $this->assertCall(
            method: 'getProjectsForIssueTypeScreenScheme',
            call: [
                'uri' => '/rest/api/3/issuetypescreenscheme/{issueTypeScreenSchemeId}/project',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'query'),
                'path' => compact('issueTypeScreenSchemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanProjectDetails::class,
            ],
            arguments: [
                $issueTypeScreenSchemeId,
                $startAt,
                $maxResults,
                $query,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}',
        );
    }
}
