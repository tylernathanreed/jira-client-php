<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowTransitionPropertiesTest extends OperationsTestCase
{
    public function testGetWorkflowTransitionProperties(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getWorkflowTransitionProperties',
            call: [
                'uri' => '/rest/api/3/workflow/transitions/{transitionId}/properties',
                'method' => 'get',
                'query' => compact('workflowName', 'includeReservedKeys', 'key', 'workflowMode'),
                'path' => compact('transitionId'),
                'success' => 200,
                'schema' => Schema\WorkflowTransitionProperty::class,
            ],
            arguments: [
                $transitionId,
                $workflowName,
                $includeReservedKeys,
                $key,
                $workflowMode,
            ],
            response: '[{"id":"jira.i18n.title","key":"jira.i18n.title","value":"some.title"},{"id":"jira.permission","key":"jira.permission","value":"createissue"}]',
        );
    }

    public function testUpdateWorkflowTransitionProperty(): void
    {
        $request = new Schema\WorkflowTransitionProperty(
            value: 'createissue',
        );

        $transitionId = 1234;
        $key = 'foo';
        $workflowName = 'foo';
        $workflowMode = null;

        $this->assertCall(
            method: 'updateWorkflowTransitionProperty',
            call: [
                'uri' => '/rest/api/3/workflow/transitions/{transitionId}/properties',
                'method' => 'put',
                'body' => $request,
                'query' => compact('key', 'workflowName', 'workflowMode'),
                'path' => compact('transitionId'),
                'success' => 200,
                'schema' => Schema\WorkflowTransitionProperty::class,
            ],
            arguments: [
                $request,
                $transitionId,
                $key,
                $workflowName,
                $workflowMode,
            ],
            response: '{"key":"jira.i18n.title","value":"some.title","id":"jira.i18n.title"}',
        );
    }

    public function testCreateWorkflowTransitionProperty(): void
    {
        $request = new Schema\WorkflowTransitionProperty(
            value: 'createissue',
        );

        $transitionId = 1234;
        $key = 'foo';
        $workflowName = 'foo';
        $workflowMode = 'live';

        $this->assertCall(
            method: 'createWorkflowTransitionProperty',
            call: [
                'uri' => '/rest/api/3/workflow/transitions/{transitionId}/properties',
                'method' => 'post',
                'body' => $request,
                'query' => compact('key', 'workflowName', 'workflowMode'),
                'path' => compact('transitionId'),
                'success' => 200,
                'schema' => Schema\WorkflowTransitionProperty::class,
            ],
            arguments: [
                $request,
                $transitionId,
                $key,
                $workflowName,
                $workflowMode,
            ],
            response: '{"key":"jira.i18n.title","value":"some.title","id":"jira.i18n.title"}',
        );
    }

    public function testDeleteWorkflowTransitionProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteWorkflowTransitionProperty',
            call: [
                'uri' => '/rest/api/3/workflow/transitions/{transitionId}/properties',
                'method' => 'delete',
                'query' => compact('key', 'workflowName', 'workflowMode'),
                'path' => compact('transitionId'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $transitionId,
                $key,
                $workflowName,
                $workflowMode,
            ],
            response: null,
        );
    }
}
