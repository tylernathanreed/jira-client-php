<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ServiceRegistryTest extends OperationsTestCase
{
    public function testServices(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'services',
            call: [
                'uri' => '/rest/atlassian-connect/1/service-registry',
                'method' => 'get',
                'query' => compact('serviceIds'),
                'success' => 200,
                'schema' => [Schema\ServiceRegistry::class],
            ],
            arguments: [
                $serviceIds,
            ],
            response: null,
        );
    }
}
