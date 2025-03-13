<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class UsernavpropertiesTest extends OperationsTestCase
{
    public function testGetUserNavProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getUserNavProperty',
            call: [
                'uri' => '/rest/api/3/user/nav4-opt-property/{propertyKey}',
                'method' => 'get',
                'query' => compact('accountId'),
                'path' => compact('propertyKey'),
                'success' => 200,
                'schema' => Schema\UserNavPropertyJsonBean::class,
            ],
            arguments: [
                $propertyKey,
                $accountId,
            ],
            response: null,
        );
    }

    public function testSetUserNavProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setUserNavProperty',
            call: [
                'uri' => '/rest/api/3/user/nav4-opt-property/{propertyKey}',
                'method' => 'put',
                'query' => compact('accountId'),
                'path' => compact('propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $propertyKey,
                $accountId,
            ],
            response: null,
        );
    }
}
