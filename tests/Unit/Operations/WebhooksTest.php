<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WebhooksTest extends OperationsTestCase
{
    public function testGetDynamicWebhooksForApp(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getDynamicWebhooksForApp',
            call: [
                'uri' => '/rest/api/3/webhook',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanWebhook::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":3,"startAt":0,"total":3,"values":[{"events":["jira:issue_updated","jira:issue_created"],"expirationDate":"2019-06-01T12:42:30.000+0000","fieldIdsFilter":["summary","customfield_10029"],"id":10000,"jqlFilter":"project = PRJ"},{"events":["jira:issue_created"],"expirationDate":"2019-06-01T12:42:30.000+0000","id":10001,"jqlFilter":"issuetype = Bug"},{"events":["issue_property_set"],"expirationDate":"2019-06-01T12:42:30.000+0000","id":10002,"issuePropertyKeysFilter":["my-issue-property-key"],"jqlFilter":"project = PRJ"}]}',
        );
    }

    public function testRegisterDynamicWebhooks(): void
    {
        $request = new Schema\WebhookRegistrationDetails(
            url: 'https://your-app.example.com/webhook-received',
            webhooks: [
                [
                    'events' => [
                        'jira:issue_created',
                        'jira:issue_updated',
                    ],
                    'fieldIdsFilter' => [
                        'summary',
                        'customfield_10029',
                    ],
                    'jqlFilter' => 'project = PROJ',
                ],
                [
                    'events' => [
                        'jira:issue_deleted',
                    ],
                    'jqlFilter' => 'project IN (PROJ, EXP] AND status = done',
                ],
                [
                    'events' => [
                        'issue_property_set',
                    ],
                    'issuePropertyKeysFilter' => [
                        'my-issue-property-key',
                    ],
                    'jqlFilter' => 'project = PROJ',
                ],
            ],
        );

        $this->assertCall(
            method: 'registerDynamicWebhooks',
            call: [
                'uri' => '/rest/api/3/webhook',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\ContainerForRegisteredWebhooks::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"webhookRegistrationResult":[{"createdWebhookId":1000},{"errors":["The clause watchCount is unsupported"]},{"createdWebhookId":1001}]}',
        );
    }

    public function testDeleteWebhookById(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteWebhookById',
            call: [
                'uri' => '/rest/api/3/webhook',
                'method' => 'delete',
                'body' => $request,
                'success' => 202,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testGetFailedWebhooks(): void
    {
        $maxResults = null;
        $after = null;

        $this->assertCall(
            method: 'getFailedWebhooks',
            call: [
                'uri' => '/rest/api/3/webhook/failed',
                'method' => 'get',
                'query' => compact('maxResults', 'after'),
                'success' => 200,
                'schema' => Schema\FailedWebhooks::class,
            ],
            arguments: [
                $maxResults,
                $after,
            ],
            response: '{"values":[{"id":"1","body":"{\"data\":\"webhook data\"}","url":"https://example.com","failureTime":1573118132000},{"id":"2","url":"https://example.com","failureTime":1573540473480}],"maxResults":100,"next":"https://your-domain.atlassian.net/rest/api/3/webhook/failed?failedAfter=1573540473480&maxResults=100"}',
        );
    }

    public function testRefreshWebhooks(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'refreshWebhooks',
            call: [
                'uri' => '/rest/api/3/webhook/refresh',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WebhooksExpirationDate::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"expirationDate":"2019-06-01T12:42:30.000+0000"}',
        );
    }
}
