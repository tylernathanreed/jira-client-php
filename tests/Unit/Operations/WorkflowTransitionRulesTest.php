<?php

namespace Tests\Unit\Operations;

use Reedware\OpenApi\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowTransitionRulesTest extends OperationsTestCase
{
    public function testGetWorkflowTransitionRuleConfigurations(): void
    {
        $types = ['postfunction'];
        $startAt = 0;
        $maxResults = 10;
        $keys = null;
        $workflowNames = null;
        $withTags = null;
        $draft = null;
        $expand = null;

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
            response: '{"isLast":true,"maxResults":10,"startAt":0,"total":1,"values":[{"workflowId":{"name":"My Workflow name","draft":false},"postFunctions":[{"id":"b4d6cbdc-59f5-11e9-8647-d663bd873d93","key":"postfunction-key","configuration":{"value":"{\"color\":\"red\"}","disabled":false,"tag":"Sample tag"},"transition":{"id":1,"name":"Open"}}],"conditions":[{"id":"d663bd873d93-59f5-11e9-8647-b4d6cbdc","key":"condition-key","configuration":{"value":"{\"size\":\"medium\"}","disabled":false,"tag":"Another tag"},"transition":{"id":1,"name":"Open"}}],"validators":[{"id":"11e9-59f5-b4d6cbdc-8647-d663bd873d93","key":"validator-key","configuration":{"value":"{\"shape\":\"square\"}","disabled":false},"transition":{"id":1,"name":"Open"}}]}]}',
        );
    }

    public function testUpdateWorkflowTransitionRuleConfigurations(): void
    {
        $request = $this->deserialize(Schema\WorkflowTransitionRulesUpdate::class, [
            'workflows' => [
                [
                    'conditions' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'tag' => 'Another tag',
                                'value' => '{ "size": "medium" }',
                            ],
                            'id' => 'd663bd873d93-59f5-11e9-8647-b4d6cbdc',
                            'key' => 'foo',
                        ],
                    ],
                    'postFunctions' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'tag' => 'Sample tag',
                                'value' => '{ "color": "red" }',
                            ],
                            'id' => 'b4d6cbdc-59f5-11e9-8647-d663bd873d93',
                            'key' => 'bar',
                        ],
                    ],
                    'validators' => [
                        [
                            'configuration' => [
                                'disabled' => '',
                                'value' => '{ "shape": "square" }',
                            ],
                            'id' => '11e9-59f5-b4d6cbdc-8647-d663bd873d93',
                            'key' => 'baz',
                        ],
                    ],
                    'workflowId' => [
                        'draft' => '',
                        'name' => 'My Workflow name',
                    ],
                ],
            ],
        ]);

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
        $request = $this->deserialize(Schema\WorkflowsWithTransitionRulesDetails::class, [
            'workflows' => [
                [
                    'workflowId' => [
                        'draft' => '',
                        'name' => 'Internal support workflow',
                    ],
                    'workflowRuleIds' => [
                        'b4d6cbdc-59f5-11e9-8647-d663bd873d93',
                        'd663bd873d93-59f5-11e9-8647-b4d6cbdc',
                        '11e9-59f5-b4d6cbdc-8647-d663bd873d93',
                    ],
                ],
            ],
        ]);

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
