<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class JiraSettingsTest extends OperationsTestCase
{
    public function testGetApplicationProperty(): void
    {
        $key = null;
        $permissionLevel = null;
        $keyFilter = null;

        $this->assertCall(
            method: 'getApplicationProperty',
            call: [
                'uri' => '/rest/api/3/application-properties',
                'method' => 'get',
                'query' => compact('key', 'permissionLevel', 'keyFilter'),
                'success' => 200,
                'schema' => [Schema\ApplicationProperty::class],
            ],
            arguments: [
                $key,
                $permissionLevel,
                $keyFilter,
            ],
            response: '[{"defaultValue":"","desc":"Jira home directory","id":"jira.home","key":"jira.home","name":"jira.home","type":"string","value":"/var/jira/jira-home"},{"defaultValue":"CLONE -","id":"jira.clone.prefix","key":"jira.clone.prefix","name":"The prefix added to the Summary field of cloned issues","type":"string","value":"CLONE -"}]',
        );
    }

    public function testGetAdvancedSettings(): void
    {
        $this->assertCall(
            method: 'getAdvancedSettings',
            call: [
                'uri' => '/rest/api/3/application-properties/advanced-settings',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ApplicationProperty::class],
            ],
            arguments: [],
            response: '[{"defaultValue":"","desc":"Jira home directory","id":"jira.home","key":"jira.home","name":"jira.home","type":"string","value":"/var/jira/jira-home"},{"defaultValue":"CLONE -","id":"jira.clone.prefix","key":"jira.clone.prefix","name":"The prefix added to the Summary field of cloned issues","type":"string","value":"CLONE -"}]',
        );
    }

    public function testSetApplicationProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setApplicationProperty',
            call: [
                'uri' => '/rest/api/3/application-properties/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ApplicationProperty::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testGetConfiguration(): void
    {
        $this->assertCall(
            method: 'getConfiguration',
            call: [
                'uri' => '/rest/api/3/configuration',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\Configuration::class,
            ],
            arguments: [],
            response: '{"attachmentsEnabled":true,"issueLinkingEnabled":true,"subTasksEnabled":false,"timeTrackingConfiguration":{"defaultUnit":"day","timeFormat":"pretty","workingDaysPerWeek":5.0,"workingHoursPerDay":8.0},"timeTrackingEnabled":true,"unassignedIssuesAllowed":false,"votingEnabled":true,"watchingEnabled":true}',
        );
    }
}
