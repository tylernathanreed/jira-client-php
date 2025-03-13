<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class UIModificationsAppsTest extends OperationsTestCase
{
    public function testGetUiModifications(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $expand = null;

        $this->assertCall(
            method: 'getUiModifications',
            call: [
                'uri' => '/rest/api/3/uiModifications',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanUiModificationDetails::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"id":"d7dbda8a-6239-4b63-8e13-a5ef975c8e61","name":"Reveal Story Points","description":"Reveals Story Points field when any Sprint is selected.","self":"https://api.atlassian.com/ex/jira/{cloudid}/rest/api/2/uiModifications/d7dbda8a-6239-4b63-8e13-a5ef975c8e61","data":"{field: \'Story Points\', config: {hidden: false}}","contexts":[{"id":"1533537a-bda3-4ac6-8481-846128cd9ef4","projectId":"10000","issueTypeId":"10000","viewType":"GIC","isAvailable":true},{"id":"c016fefa-6eb3-40c9-8596-4c4ef273e67c","projectId":"10000","issueTypeId":"10001","viewType":"IssueView","isAvailable":true},{"id":"1016defa-7ew3-40c5-8696-4c1efg73e67s","projectId":"10000","issueTypeId":"10002","viewType":"IssueTransition","isAvailable":true}]},{"id":"e4fe8db5-f82f-416b-a3aa-b260b55da577","name":"Set Assignee","description":"Sets the Assignee field automatically.","self":"https://api.atlassian.com/ex/jira/{cloudid}/rest/api/2/uiModifications/e4fe8db5-f82f-416b-a3aa-b260b55da577","contexts":[{"id":"8b3740f9-8780-4958-8228-69dcfbda11d9","projectId":"10000","issueTypeId":"10000","viewType":"GIC","isAvailable":true}]},{"id":"1453f993-79ce-4389-a36d-eb72d5c85dd6","name":"Hide Labels","description":"Hides Labels if any component is provided.","self":"https://api.atlassian.com/ex/jira/{cloudid}/rest/api/2/uiModifications/1453f993-79ce-4389-a36d-eb72d5c85dd6","contexts":[]},{"id":"d3f4097e-8d8e-451e-9fb6-27c3c8c3bfff","name":"Wildcard example","description":"This context is applied to all issue types","self":"https://api.atlassian.com/ex/jira/{cloudid}/rest/api/2/uiModifications/d3f4097e-8d8e-451e-9fb6-27c3c8c3bfff","contexts":[{"id":"521f2181-5d5e-46ea-9fc9-871bbf245b8b","projectId":"10000","issueTypeId":null,"viewType":"GIC","isAvailable":true}]}]}',
        );
    }

    public function testCreateUiModification(): void
    {
        $request = new Schema\CreateUiModificationDetails(
            contexts: [
                [
                    'issueTypeId' => '10000',
                    'projectId' => '10000',
                    'viewType' => 'GIC',
                ],
                [
                    'issueTypeId' => '10001',
                    'projectId' => '10000',
                    'viewType' => 'IssueView',
                ],
                [
                    'issueTypeId' => '10002',
                    'projectId' => '10000',
                    'viewType' => 'IssueTransition',
                ],
                [
                    'issueTypeId' => '10003',
                    'projectId' => '10000',
                    'viewType' => NULL,
                ],
            ],
            data: '{field: \'Story Points\', config: {hidden: false}}',
            description: 'Reveals Story Points field when any Sprint is selected.',
            name: 'Reveal Story Points',
        );

        $this->assertCall(
            method: 'createUiModification',
            call: [
                'uri' => '/rest/api/3/uiModifications',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\UiModificationIdentifiers::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"d7dbda8a-6239-4b63-8e13-a5ef975c8e61","self":"https://api.atlassian.com/ex/jira/{cloudid}/rest/api/2/uiModifications/d7dbda8a-6239-4b63-8e13-a5ef975c8e61"}',
        );
    }

    public function testUpdateUiModification(): void
    {
        $request = new Schema\UpdateUiModificationDetails(
            contexts: [
                [
                    'issueTypeId' => '10000',
                    'projectId' => '10000',
                    'viewType' => 'GIC',
                ],
                [
                    'issueTypeId' => '10001',
                    'projectId' => '10000',
                    'viewType' => 'IssueView',
                ],
                [
                    'issueTypeId' => '10002',
                    'projectId' => '10000',
                    'viewType' => 'IssueTransition',
                ],
            ],
            data: '{field: \'Story Points\', config: {hidden: true}}',
            name: 'Updated Reveal Story Points',
        );

        $uiModificationId = 'foo';

        $this->assertCall(
            method: 'updateUiModification',
            call: [
                'uri' => '/rest/api/3/uiModifications/{uiModificationId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('uiModificationId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $uiModificationId,
            ],
            response: null,
        );
    }

    public function testDeleteUiModification(): void
    {
        $uiModificationId = 'foo';

        $this->assertCall(
            method: 'deleteUiModification',
            call: [
                'uri' => '/rest/api/3/uiModifications/{uiModificationId}',
                'method' => 'delete',
                'path' => compact('uiModificationId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $uiModificationId,
            ],
            response: null,
        );
    }
}
