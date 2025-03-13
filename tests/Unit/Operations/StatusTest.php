<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class StatusTest extends OperationsTestCase
{
    public function testGetStatusesById(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getStatusesById',
            call: [
                'uri' => '/rest/api/3/statuses',
                'method' => 'get',
                'query' => compact('id', 'expand'),
                'success' => 200,
                'schema' => [Schema\JiraStatus::class],
            ],
            arguments: [
                $id,
                $expand,
            ],
            response: '[{"description":"The issue is resolved","id":"1000","name":"Finished","scope":{"project":{"id":"1"},"type":"PROJECT"},"statusCategory":"DONE","usages":[{"issueTypes":["10002"],"project":{"id":"1"}}],"workflowUsages":[{"workflowId":"545d80a3-91ff-4949-8b0d-a2bc484e70e5","workflowName":"Workflow 1"}]}]',
        );
    }

    public function testUpdateStatuses(): void
    {
        $request = new Schema\StatusUpdateRequest(
            statuses: [
                [
                    'description' => 'The issue is resolved',
                    'id' => '1000',
                    'name' => 'Finished',
                    'statusCategory' => 'DONE',
                ],
            ],
        );

        $this->assertCall(
            method: 'updateStatuses',
            call: [
                'uri' => '/rest/api/3/statuses',
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

    public function testCreateStatuses(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createStatuses',
            call: [
                'uri' => '/rest/api/3/statuses',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => [Schema\JiraStatus::class],
            ],
            arguments: [
                $request,
            ],
            response: '[{"description":"The issue is resolved","id":"1000","name":"Finished","scope":{"project":{"id":"1"},"type":"PROJECT"},"statusCategory":"DONE","usages":[],"workflowUsages":[]}]',
        );
    }

    public function testDeleteStatusesById(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'deleteStatusesById',
            call: [
                'uri' => '/rest/api/3/statuses',
                'method' => 'delete',
                'query' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testSearch(): void
    {
        $expand = null;
        $projectId = null;
        $startAt = 0;
        $maxResults = 200;
        $searchString = null;
        $statusCategory = null;

        $this->assertCall(
            method: 'search',
            call: [
                'uri' => '/rest/api/3/statuses/search',
                'method' => 'get',
                'query' => compact('expand', 'projectId', 'startAt', 'maxResults', 'searchString', 'statusCategory'),
                'success' => 200,
                'schema' => Schema\PageOfStatuses::class,
            ],
            arguments: [
                $expand,
                $projectId,
                $startAt,
                $maxResults,
                $searchString,
                $statusCategory,
            ],
            response: '{"isLast":true,"maxResults":2,"nextPage":"https://your-domain.atlassian.net/rest/api/3/statuses/search?startAt=2&maxResults=2","self":"https://your-domain.atlassian.net/rest/api/3/statuses/search?startAt=0&maxResults=2","startAt":0,"total":5,"values":[{"description":"The issue is resolved","id":"1000","name":"Finished","scope":{"project":{"id":"1"},"type":"PROJECT"},"statusCategory":"DONE","usages":[{"issueTypes":["10002"],"project":{"id":"1"}}],"workflowUsages":[{"workflowId":"545d80a3-91ff-4949-8b0d-a2bc484e70e5","workflowName":"Workflow 1"}]}]}',
        );
    }

    public function testGetProjectIssueTypeUsagesForStatus(): void
    {
        $statusId = 'foo';
        $projectId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getProjectIssueTypeUsagesForStatus',
            call: [
                'uri' => '/rest/api/3/statuses/{statusId}/project/{projectId}/issueTypeUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('statusId', 'projectId'),
                'success' => 200,
                'schema' => Schema\StatusProjectIssueTypeUsageDTO::class,
            ],
            arguments: [
                $statusId,
                $projectId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"issueTypes":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1000"}]},"projectId":"2000","statusId":"1000"}',
        );
    }

    public function testGetProjectUsagesForStatus(): void
    {
        $statusId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getProjectUsagesForStatus',
            call: [
                'uri' => '/rest/api/3/statuses/{statusId}/projectUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('statusId'),
                'success' => 200,
                'schema' => Schema\StatusProjectUsageDTO::class,
            ],
            arguments: [
                $statusId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"projects":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1000"}]},"statusId":"1000"}',
        );
    }

    public function testGetWorkflowUsagesForStatus(): void
    {
        $statusId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getWorkflowUsagesForStatus',
            call: [
                'uri' => '/rest/api/3/statuses/{statusId}/workflowUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('statusId'),
                'success' => 200,
                'schema' => Schema\StatusWorkflowUsageDTO::class,
            ],
            arguments: [
                $statusId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"statusId":"1000","workflows":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"545d80a3-91ff-4949-8b0d-a2bc484e70e5"}]}}',
        );
    }
}
