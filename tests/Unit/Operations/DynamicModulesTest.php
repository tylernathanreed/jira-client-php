<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class DynamicModulesTest extends OperationsTestCase
{
    public function testGetModules(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getModules',
            call: [
                'uri' => '/rest/atlassian-connect/1/app/module/dynamic',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\ConnectModules::class,
            ],
            arguments: [],
            response: null,
        );
    }

    public function testRegisterModules(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'registerModules',
            call: [
                'uri' => '/rest/atlassian-connect/1/app/module/dynamic',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testRemoveModules(): void
    {
        $moduleKey = null;

        $this->assertCall(
            method: 'removeModules',
            call: [
                'uri' => '/rest/atlassian-connect/1/app/module/dynamic',
                'method' => 'delete',
                'query' => compact('moduleKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $moduleKey,
            ],
            response: null,
        );
    }
}
