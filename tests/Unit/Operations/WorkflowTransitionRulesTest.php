<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowTransitionRulesTest extends OperationsTestCase
{
    public function testGetWorkflowTransitionRuleConfigurations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getWorkflowTransitionRuleConfigurations',
            call: [
                'uri' => '/rest/api/3/workflow/rule/config',
                'method' => 'get',
                'query' => compact('types', 'startAt', 'maxResults', 'keys', 'workflowNames', 'withTags', 'draft', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanWorkflowTransitionRules::class,
            ],
            arguments: [
                $types,
                $startAt,
                $maxResults,
                $keys,
                $workflowNames,
                $withTags,
                $draft,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":10,"startAt":0,"total":1,"values":[{"workflowId":{"name":"My Workflow name","draft":false},"postFunctions":[{"id":"b4d6cbdc-59f5-11e9-8647-d663bd873d93","key":"postfunction-key","configuration":{"value":"{ \"color\": \"red\" }","disabled":false,"tag":"Sample tag"},"transition":{"id":1,"name":"Open"}}],"conditions":[{"id":"d663bd873d93-59f5-11e9-8647-b4d6cbdc","key":"condition-key","configuration":{"value":"{ \"size\": \"medium\" }","disabled":false,"tag":"Another tag"},"transition":{"id":1,"name":"Open"}}],"validators":[{"id":"11e9-59f5-b4d6cbdc-8647-d663bd873d93","key":"validator-key","configuration":{"value":"\"{ \\\"shape\\\": \\\"square\\\" }\"","disabled":false},"transition":{"id":1,"name":"Open"}}]}]}',
        );
    }

    public function testUpdateWorkflowTransitionRuleConfigurations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateWorkflowTransitionRuleConfigurations',
            call: [
                'uri' => '/rest/api/3/workflow/rule/config',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowTransitionRulesUpdateErrors::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"updateResults":[{"workflowId":{"name":"Workflow with one rule not updated","draft":false},"ruleUpdateErrors":{"example-rule-id":["The rule with this id does not exist: example-rule-id"]},"updateErrors":[]},{"workflowId":{"name":"Workflow with all rules successfully updated","draft":true},"ruleUpdateErrors":{},"updateErrors":[]},{"workflowId":{"name":"Non-existing workflow","draft":false},"ruleUpdateErrors":{},"updateErrors":["Workflow not found: WorkflowIdBean{name=Non-existing workflow, draft=false}"]}]}',
        );
    }

    public function testDeleteWorkflowTransitionRuleConfigurations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'deleteWorkflowTransitionRuleConfigurations',
            call: [
                'uri' => '/rest/api/3/workflow/rule/config/delete',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowTransitionRulesUpdateErrors::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"updateResults":[{"workflowId":{"name":"Workflow with one rule not updated","draft":false},"ruleUpdateErrors":{"example-rule-id":["The rule with this id does not exist: example-rule-id"]},"updateErrors":[]},{"workflowId":{"name":"Workflow with all rules successfully updated","draft":true},"ruleUpdateErrors":{},"updateErrors":[]},{"workflowId":{"name":"Non-existing workflow","draft":false},"ruleUpdateErrors":{},"updateErrors":["Workflow not found: WorkflowIdBean{name=Non-existing workflow, draft=false}"]}]}',
        );
    }
}
