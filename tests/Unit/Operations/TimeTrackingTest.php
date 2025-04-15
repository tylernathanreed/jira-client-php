<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class TimeTrackingTest extends OperationsTestCase
{
    public function testGetSelectedTimeTrackingImplementation(): void
    {
        $this->assertCall(
            method: 'getSelectedTimeTrackingImplementation',
            call: [
                'uri' => '/rest/api/3/configuration/timetracking',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\TimeTrackingProvider::class,
            ],
            arguments: [],
            response: '{"key":"Jira","name":"JIRA provided time tracking","url":"/example/config/url"}',
        );
    }

    public function testSelectTimeTrackingImplementation(): void
    {
        $request = $this->deserialize(Schema\TimeTrackingProvider::class, [
            'key' => 'Jira',
        ]);

        $this->assertCall(
            method: 'selectTimeTrackingImplementation',
            call: [
                'uri' => '/rest/api/3/configuration/timetracking',
                'method' => 'put',
                'body' => $request,
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testGetAvailableTimeTrackingImplementations(): void
    {
        $this->assertCall(
            method: 'getAvailableTimeTrackingImplementations',
            call: [
                'uri' => '/rest/api/3/configuration/timetracking/list',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\TimeTrackingProvider::class],
            ],
            arguments: [],
            response: '[{"key":"Jira","name":"JIRA provided time tracking","url":"/example/config/url"}]',
        );
    }

    public function testGetSharedTimeTrackingConfiguration(): void
    {
        $this->assertCall(
            method: 'getSharedTimeTrackingConfiguration',
            call: [
                'uri' => '/rest/api/3/configuration/timetracking/options',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\TimeTrackingConfiguration::class,
            ],
            arguments: [],
            response: '{"defaultUnit":"hour","timeFormat":"pretty","workingDaysPerWeek":5.5,"workingHoursPerDay":7.6}',
        );
    }

    public function testSetSharedTimeTrackingConfiguration(): void
    {
        $request = $this->deserialize(Schema\TimeTrackingConfiguration::class, [
            'defaultUnit' => 'hour',
            'timeFormat' => 'pretty',
            'workingDaysPerWeek' => '5.5',
            'workingHoursPerDay' => '7.6',
        ]);

        $this->assertCall(
            method: 'setSharedTimeTrackingConfiguration',
            call: [
                'uri' => '/rest/api/3/configuration/timetracking/options',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\TimeTrackingConfiguration::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"defaultUnit":"hour","timeFormat":"pretty","workingDaysPerWeek":5.5,"workingHoursPerDay":7.6}',
        );
    }
}
