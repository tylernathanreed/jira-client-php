<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class LicenseMetricsTest extends OperationsTestCase
{
    public function testGetLicense(): void
    {
        $this->assertCall(
            method: 'getLicense',
            call: [
                'uri' => '/rest/api/3/instance/license',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\License::class,
            ],
            arguments: [],
            response: '{"applications":[{"id":"jira-core","plan":"PAID"},{"id":"jira-product-discovery","plan":"FREE"},{"id":"jira-servicedesk","plan":"FREE"},{"id":"jira-software","plan":"PAID"}]}',
        );
    }

    public function testGetApproximateLicenseCount(): void
    {
        $this->assertCall(
            method: 'getApproximateLicenseCount',
            call: [
                'uri' => '/rest/api/3/license/approximateLicenseCount',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\LicenseMetric::class,
            ],
            arguments: [],
            response: '{"key":"license.totalApproximateUserCount","value":"1000"}',
        );
    }

    public function testGetApproximateApplicationLicenseCount(): void
    {
        $applicationKey = 'foo';

        $this->assertCall(
            method: 'getApproximateApplicationLicenseCount',
            call: [
                'uri' => '/rest/api/3/license/approximateLicenseCount/product/{applicationKey}',
                'method' => 'get',
                'path' => compact('applicationKey'),
                'success' => 200,
                'schema' => Schema\LicenseMetric::class,
            ],
            arguments: [
                $applicationKey,
            ],
            response: '{"key":"license.jira-software.approximateUserCount","value":"115"}',
        );
    }
}
