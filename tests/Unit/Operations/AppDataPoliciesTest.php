<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AppDataPoliciesTest extends OperationsTestCase
{
    public function testGetPolicy(): void
    {
        $this->assertCall(
            method: 'getPolicy',
            call: [
                'uri' => '/rest/api/3/data-policy',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\WorkspaceDataPolicy::class,
            ],
            arguments: [],
            response: '{"anyContentBlocked":false}',
        );
    }

    public function testGetPolicies(): void
    {
        $ids = null;

        $this->assertCall(
            method: 'getPolicies',
            call: [
                'uri' => '/rest/api/3/data-policy/project',
                'method' => 'get',
                'query' => compact('ids'),
                'success' => 200,
                'schema' => Schema\ProjectDataPolicies::class,
            ],
            arguments: [],
            response: '{"projectDataPolicies":[{"dataPolicy":{"anyContentBlocked":false},"id":1000},{"dataPolicy":{"anyContentBlocked":true},"id":1001}]}',
        );
    }
}
