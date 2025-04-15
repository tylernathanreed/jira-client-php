<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class UserPropertiesTest extends OperationsTestCase
{
    public function testGetUserPropertyKeys(): void
    {
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $userKey = null;
        $username = null;

        $this->assertCall(
            method: 'getUserPropertyKeys',
            call: [
                'uri' => '/rest/api/3/user/properties',
                'method' => 'get',
                'query' => compact('accountId', 'userKey', 'username'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $accountId,
                $userKey,
                $username,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetUserProperty(): void
    {
        $propertyKey = 'foo';
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $userKey = null;
        $username = null;

        $this->assertCall(
            method: 'getUserProperty',
            call: [
                'uri' => '/rest/api/3/user/properties/{propertyKey}',
                'method' => 'get',
                'query' => compact('accountId', 'userKey', 'username'),
                'path' => compact('propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $propertyKey,
                $accountId,
                $userKey,
                $username,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetUserProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setUserProperty',
            call: [
                'uri' => '/rest/api/3/user/properties/{propertyKey}',
                'method' => 'put',
                'query' => compact('accountId', 'userKey', 'username'),
                'path' => compact('propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $propertyKey,
                $accountId,
                $userKey,
                $username,
            ],
            response: null,
        );
    }

    public function testDeleteUserProperty(): void
    {
        $propertyKey = 'foo';
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $userKey = null;
        $username = null;

        $this->assertCall(
            method: 'deleteUserProperty',
            call: [
                'uri' => '/rest/api/3/user/properties/{propertyKey}',
                'method' => 'delete',
                'query' => compact('accountId', 'userKey', 'username'),
                'path' => compact('propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $propertyKey,
                $accountId,
                $userKey,
                $username,
            ],
            response: null,
        );
    }
}
