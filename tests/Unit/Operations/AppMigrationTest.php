<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AppMigrationTest extends OperationsTestCase
{
    public function testUpdateIssueFields(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updateIssueFields',
            call: [
                'uri' => '/rest/atlassian-connect/1/migration/field',
                'method' => 'put',
                'body' => $request,
                'header' => ['Atlassian-Transfer-Id' => $atlassianTransferId],
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $atlassianTransferId,
            ],
            response: null,
        );
    }

    public function testUpdateEntityPropertiesValue(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updateEntityPropertiesValue',
            call: [
                'uri' => '/rest/atlassian-connect/1/migration/properties/{entityType}',
                'method' => 'put',
                'header' => ['Atlassian-Transfer-Id' => $atlassianTransferId],
                'path' => compact('entityType'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $atlassianTransferId,
                $entityType,
            ],
            response: null,
        );
    }

    public function testWorkflowRuleSearch(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $atlassianTransferId = 'foo';

        $this->assertCall(
            method: 'workflowRuleSearch',
            call: [
                'uri' => '/rest/atlassian-connect/1/migration/workflow/rule/search',
                'method' => 'post',
                'body' => $request,
                'header' => ['Atlassian-Transfer-Id' => $atlassianTransferId],
                'success' => 200,
                'schema' => Schema\WorkflowRulesSearchDetails::class,
            ],
            arguments: [
                $request,
                $atlassianTransferId,
            ],
            response: '{"workflowEntityId":"a498d711-685d-428d-8c3e-bc03bb450ea7","invalidRules":["55d44f1d-c859-42e5-9c27-2c5ec3f340b1"],"validRules":[{"workflowId":{"name":"Workflow name","draft":true},"postFunctions":[{"id":"123","key":"WorkflowKey","configuration":{"value":"WorkflowValidator"},"transition":{"name":"transition","id":123}}],"conditions":[{"id":"123","key":"WorkflowKey","configuration":{"value":"WorkflowValidator"},"transition":{"name":"transition","id":123}}],"validators":[{"id":"123","key":"WorkflowKey","configuration":{"value":"WorkflowValidator"},"transition":{"name":"transition","id":123}}]}]}',
        );
    }
}
