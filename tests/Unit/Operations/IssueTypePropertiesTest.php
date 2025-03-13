<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueTypePropertiesTest extends OperationsTestCase
{
    public function testGetIssueTypePropertyKeys(): void
    {
        $issueTypeId = 'foo';

        $this->assertCall(
            method: 'getIssueTypePropertyKeys',
            call: [
                'uri' => '/rest/api/3/issuetype/{issueTypeId}/properties',
                'method' => 'get',
                'path' => compact('issueTypeId'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $issueTypeId,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetIssueTypeProperty(): void
    {
        $issueTypeId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getIssueTypeProperty',
            call: [
                'uri' => '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('issueTypeId', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $issueTypeId,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetIssueTypeProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setIssueTypeProperty',
            call: [
                'uri' => '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('issueTypeId', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $issueTypeId,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteIssueTypeProperty(): void
    {
        $issueTypeId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteIssueTypeProperty',
            call: [
                'uri' => '/rest/api/3/issuetype/{issueTypeId}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('issueTypeId', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueTypeId,
                $propertyKey,
            ],
            response: null,
        );
    }
}
