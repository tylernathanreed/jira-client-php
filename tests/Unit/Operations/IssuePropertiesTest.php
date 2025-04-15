<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssuePropertiesTest extends OperationsTestCase
{
    public function testBulkSetIssuesPropertiesList(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkSetIssuesPropertiesList',
            call: [
                'uri' => '/rest/api/3/issue/properties',
                'method' => 'post',
                'body' => $request,
                'success' => 303,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testBulkSetIssuePropertiesByIssue(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkSetIssuePropertiesByIssue',
            call: [
                'uri' => '/rest/api/3/issue/properties/multi',
                'method' => 'post',
                'body' => $request,
                'success' => 303,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testBulkSetIssueProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkSetIssueProperty',
            call: [
                'uri' => '/rest/api/3/issue/properties/{propertyKey}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('propertyKey'),
                'success' => 303,
                'schema' => true,
            ],
            arguments: [
                $request,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testBulkDeleteIssueProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkDeleteIssueProperty',
            call: [
                'uri' => '/rest/api/3/issue/properties/{propertyKey}',
                'method' => 'delete',
                'body' => $request,
                'path' => compact('propertyKey'),
                'success' => 303,
                'schema' => true,
            ],
            arguments: [
                $request,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testGetIssuePropertyKeys(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'getIssuePropertyKeys',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/properties',
                'method' => 'get',
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $issueIdOrKey,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetIssueProperty(): void
    {
        $issueIdOrKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getIssueProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('issueIdOrKey', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $issueIdOrKey,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetIssueProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setIssueProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('issueIdOrKey', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteIssueProperty(): void
    {
        $issueIdOrKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteIssueProperty',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('issueIdOrKey', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $propertyKey,
            ],
            response: null,
        );
    }
}
