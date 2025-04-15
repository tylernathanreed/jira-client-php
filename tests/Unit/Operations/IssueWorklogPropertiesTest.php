<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueWorklogPropertiesTest extends OperationsTestCase
{
    public function testGetWorklogPropertyKeys(): void
    {
        $issueIdOrKey = 'foo';
        $worklogId = 'foo';

        $this->assertCall(
            method: 'getWorklogPropertyKeys',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties',
                'method' => 'get',
                'path' => compact('issueIdOrKey', 'worklogId'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $issueIdOrKey,
                $worklogId,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetWorklogProperty(): void
    {
        $issueIdOrKey = 'foo';
        $worklogId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getWorklogProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('issueIdOrKey', 'worklogId', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $issueIdOrKey,
                $worklogId,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetWorklogProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setWorklogProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('issueIdOrKey', 'worklogId', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $worklogId,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteWorklogProperty(): void
    {
        $issueIdOrKey = 'foo';
        $worklogId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteWorklogProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{worklogId}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('issueIdOrKey', 'worklogId', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $worklogId,
                $propertyKey,
            ],
            response: null,
        );
    }
}
