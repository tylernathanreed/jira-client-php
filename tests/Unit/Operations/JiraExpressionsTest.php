<?php

namespace Tests\Unit\Operations;

use Reedware\OpenApi\Client\Schema;
use Tests\OperationsTestCase;

class JiraExpressionsTest extends OperationsTestCase
{
    public function testAnalyseExpression(): void
    {
        $request = $this->deserialize(Schema\JiraExpressionForAnalysis::class, [
            'contextVariables' => [
                'listOfStrings' => 'List<String>',
                'record' => '{ a: Number, b: String }',
                'value' => 'User',
            ],
            'expressions' => [
                'issues.map(issue => issue.properties[\\\'property_key\\\']]',
            ],
        ]);

        $check = 'syntax';

        $this->assertCall(
            method: 'analyseExpression',
            call: [
                'uri' => '/rest/api/3/expression/analyse',
                'method' => 'post',
                'body' => $request,
                'query' => compact('check'),
                'success' => 200,
                'schema' => Schema\JiraExpressionsAnalysis::class,
            ],
            arguments: [
                $request,
                $check,
            ],
            response: '{"results":[{"expression":"analysed expression","errors":[{"line":1,"column":4,"message":"!, -, typeof, (, IDENTIFIER, null, true, false, NUMBER, STRING, TEMPLATE_LITERAL, new, [ or { expected, > encountered.","type":"syntax"},{"message":"Jira expression is too long (1040), limit: 1000 characters","type":"other"},{"message":"Jira expression has too many nodes (150), limit: 100 leaves","type":"other"}],"valid":false},{"expression":"issues.map(i => {idAndKey: [i.id, i.key], summary: i.summary, comments: i.comments})","valid":true,"type":"List<{idAndKey: [Number, String], summary: String, comments: List<Comment>}>","complexity":{"expensiveOperations":"N","variables":{"N":"issues"}}},{"expression":"issues.map(i => i.id > \'0\')","errors":[{"expression":"i.id > 0","message":"Can\'t compare Number to String.","type":"type"}],"valid":false,"type":"TypeError"}]}',
        );
    }

    public function testEvaluateJiraExpression(): void
    {
        $request = $this->deserialize(Schema\JiraExpressionEvalRequestBean::class, [
            'context' => [
                'board' => '10100',
                'custom' => [
                    'config' => [
                        'type' => 'json',
                        'value' => [
                            'userId' => '10002',
                        ],
                    ],
                    'issuesList' => [
                        'type' => 'json',
                        'value' => [
                            0 => [
                                'key' => 'ACJIRA-1471',
                                'type' => 'issue',
                            ],
                            1 => [
                                'id' => '100001',
                                'type' => 'issue',
                            ],
                        ],
                    ],
                    'myUser' => [
                        'accountId' => '100001',
                        'type' => 'user',
                    ],
                    'nullField' => [
                        'type' => 'json',
                    ],
                ],
                'customerRequest' => '1450',
                'issue' => [
                    'key' => 'ACJIRA-1470',
                ],
                'issues' => [
                    'jql' => [
                        'maxResults' => '100',
                        'query' => 'project = HSP',
                        'startAt' => '0',
                        'validation' => 'strict',
                    ],
                ],
                'project' => [
                    'key' => 'ACJIRA',
                ],
                'serviceDesk' => '10023',
                'sprint' => '10001',
            ],
            'expression' => '{ key: issue.key, type: issue.issueType.name, links: issue.links.map(link => link.linkedIssue.id), listCustomVariable: issuesList.includes(issue), customVariables: myUser.accountId == config.userId}',
        ]);

        $expand = null;

        $this->assertCall(
            method: 'evaluateJiraExpression',
            call: [
                'uri' => '/rest/api/3/expression/eval',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\JiraExpressionResult::class,
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '{"value":"The expression\'s result. This value can be any JSON, not necessarily a String","meta":{"complexity":{"steps":{"value":1,"limit":10000},"expensiveOperations":{"value":3,"limit":10},"beans":{"value":0,"limit":1000},"primitiveValues":{"value":1,"limit":10000}},"issues":{"jql":{"startAt":0,"maxResults":1000,"count":140,"totalCount":140,"validationWarnings":["There is a problem with the JQL query."]}}}}',
        );
    }

    public function testEvaluateJSISJiraExpression(): void
    {
        $request = $this->deserialize(Schema\JiraExpressionEvaluateRequestBean::class, [
            'context' => [
                'board' => '10100',
                'custom' => [
                    'config' => [
                        'type' => 'json',
                        'value' => [
                            'userId' => '10002',
                        ],
                    ],
                    'issuesList' => [
                        'type' => 'json',
                        'value' => [
                            0 => [
                                'key' => 'ACJIRA-1471',
                                'type' => 'issue',
                            ],
                            1 => [
                                'id' => '100001',
                                'type' => 'issue',
                            ],
                        ],
                    ],
                    'myUser' => [
                        'accountId' => '100001',
                        'type' => 'user',
                    ],
                    'nullField' => [
                        'type' => 'json',
                    ],
                ],
                'customerRequest' => '1450',
                'issue' => [
                    'key' => 'ACJIRA-1470',
                ],
                'issues' => [
                    'jql' => [
                        'maxResults' => '100',
                        'nextPageToken' => 'EgQIlMIC',
                        'query' => 'project = HSP',
                    ],
                ],
                'project' => [
                    'key' => 'ACJIRA',
                ],
                'serviceDesk' => '10023',
                'sprint' => '10001',
            ],
            'expression' => '{ key: issue.key, type: issue.issueType.name, links: issue.links.map(link => link.linkedIssue.id), listCustomVariable: issuesList.includes(issue), customVariables: myUser.accountId == config.userId}',
        ]);

        $expand = null;

        $this->assertCall(
            method: 'evaluateJSISJiraExpression',
            call: [
                'uri' => '/rest/api/3/expression/evaluate',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\JExpEvaluateJiraExpressionResultBean::class,
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '{"value":"The expression\'s result. This value can be any JSON, not necessarily a String","meta":{"complexity":{"steps":{"value":1,"limit":10000},"expensiveOperations":{"value":3,"limit":10},"beans":{"value":0,"limit":1000},"primitiveValues":{"value":1,"limit":10000}},"issues":{"jql":{"nextPageToken":"EgQIlMIC"}}}}',
        );
    }
}
