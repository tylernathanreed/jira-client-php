<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueBulkOperationsTest extends OperationsTestCase
{
    public function testSubmitBulkDelete(): void
    {
        $request = $this->deserialize(Schema\IssueBulkDeletePayload::class, [
            'selectedIssueIdsOrKeys' => [
                '10001',
                '10002',
            ],
            'sendBulkNotification' => false,
        ]);

        $this->assertCall(
            method: 'submitBulkDelete',
            call: [
                'uri' => '/rest/api/3/bulk/issues/delete',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testGetBulkEditableFields(): void
    {
        $issueIdsOrKeys = 'foo';
        $searchText = null;
        $endingBefore = null;
        $startingAfter = null;

        $this->assertCall(
            method: 'getBulkEditableFields',
            call: [
                'uri' => '/rest/api/3/bulk/issues/fields',
                'method' => 'get',
                'query' => compact('issueIdsOrKeys', 'searchText', 'endingBefore', 'startingAfter'),
                'success' => 200,
                'schema' => Schema\BulkEditGetFields::class,
            ],
            arguments: [
                $issueIdsOrKeys,
                $searchText,
                $endingBefore,
                $startingAfter,
            ],
            response: '{"fields":[{"id":"assignee","isRequired":false,"name":"Assignee","searchUrl":"https://your-domain.atlassian.net/rest/api/3/user/assignable/multiProjectSearch?projectKeys=KAN&query=","type":"assignee"},{"id":"components","isRequired":false,"multiSelectFieldOptions":["ADD","REMOVE","REPLACE","REMOVE_ALL"],"name":"Components","type":"components","unavailableMessage":"{0}NOTE{1}: The project of the selected issue(s) does not have any components."},{"fieldOptions":[{"description":"This problem will block progress.","id":"1","priority":"Highest"},{"description":"Has the potential to affect progress.","id":"2","priority":"Lowest"},{"description":"Trivial problem with little or no impact on progress.","id":"3","priority":"Medium"}],"id":"priority","isRequired":false,"name":"Priority","type":"priority"}]}',
        );
    }

    public function testSubmitBulkEdit(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $this->assertCall(
            method: 'submitBulkEdit',
            call: [
                'uri' => '/rest/api/3/bulk/issues/fields',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testSubmitBulkMove(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'submitBulkMove',
            call: [
                'uri' => '/rest/api/3/bulk/issues/move',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testGetAvailableTransitions(): void
    {
        $issueIdsOrKeys = 'foo';
        $endingBefore = null;
        $startingAfter = null;

        $this->assertCall(
            method: 'getAvailableTransitions',
            call: [
                'uri' => '/rest/api/3/bulk/issues/transition',
                'method' => 'get',
                'query' => compact('issueIdsOrKeys', 'endingBefore', 'startingAfter'),
                'success' => 200,
                'schema' => Schema\BulkTransitionGetAvailableTransitions::class,
            ],
            arguments: [
                $issueIdsOrKeys,
                $endingBefore,
                $startingAfter,
            ],
            response: '{"availableTransitions":[{"isTransitionsFiltered":false,"issues":["EPIC-1","TASK-1"],"transitions":[{"to":{"statusId":10001,"statusName":"To Do"},"transitionId":11,"transitionName":"To Do"},{"to":{"statusId":10002,"statusName":"In Progress"},"transitionId":21,"transitionName":"In Progress"},{"to":{"statusId":10003,"statusName":"Done"},"transitionId":31,"transitionName":"Done"}]},{"isTransitionsFiltered":true,"issues":["BUG-1"],"transitions":[{"to":{"statusId":10004,"statusName":"To Do bug"},"transitionId":41,"transitionName":"To Do bug"},{"to":{"statusId":10005,"statusName":"Triage"},"transitionId":51,"transitionName":"Triage"}]}]}',
        );
    }

    public function testSubmitBulkTransition(): void
    {
        $request = $this->deserialize(Schema\IssueBulkTransitionPayload::class, [
            'bulkTransitionInputs' => [
                [
                    'selectedIssueIdsOrKeys' => [
                        '10001',
                        '10002',
                    ],
                    'transitionId' => '11',
                ],
                [
                    'selectedIssueIdsOrKeys' => [
                        'TEST-1',
                    ],
                    'transitionId' => '2',
                ],
            ],
            'sendBulkNotification' => false,
        ]);

        $this->assertCall(
            method: 'submitBulkTransition',
            call: [
                'uri' => '/rest/api/3/bulk/issues/transition',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testSubmitBulkUnwatch(): void
    {
        $request = $this->deserialize(Schema\IssueBulkWatchOrUnwatchPayload::class, [
            'selectedIssueIdsOrKeys' => [
                '10001',
                '10002',
            ],
            'sendBulkNotification' => false,
        ]);

        $this->assertCall(
            method: 'submitBulkUnwatch',
            call: [
                'uri' => '/rest/api/3/bulk/issues/unwatch',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testSubmitBulkWatch(): void
    {
        $request = $this->deserialize(Schema\IssueBulkWatchOrUnwatchPayload::class, [
            'selectedIssueIdsOrKeys' => [
                '10001',
                '10002',
            ],
            'sendBulkNotification' => false,
        ]);

        $this->assertCall(
            method: 'submitBulkWatch',
            call: [
                'uri' => '/rest/api/3/bulk/issues/watch',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\SubmittedBulkOperation::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"taskId":"10641"}',
        );
    }

    public function testGetBulkOperationProgress(): void
    {
        $taskId = 'foo';

        $this->assertCall(
            method: 'getBulkOperationProgress',
            call: [
                'uri' => '/rest/api/3/bulk/queue/{taskId}',
                'method' => 'get',
                'path' => compact('taskId'),
                'success' => 200,
                'schema' => Schema\BulkOperationProgress::class,
            ],
            arguments: [
                $taskId,
            ],
            response: '{"created":1704110400000,"invalidOrInaccessibleIssueCount":0,"processedAccessibleIssues":[10001,10002],"progressPercent":100,"started":1704110460000,"status":"COMPLETE","submittedBy":{"accountId":"5b10a2844c20165700ede21g"},"taskId":"10000","totalIssueCount":2,"updated":1704110520000}',
        );
    }
}
