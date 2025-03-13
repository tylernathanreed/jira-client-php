<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldConfigurationAppsTest extends OperationsTestCase
{
    public function testGetCustomFieldsConfigurations(): void
    {
        $request = new Schema\ConfigurationsListParameters(
            fieldIdsOrKeys: [
                'customfield_10035',
                'customfield_10036',
            ],
        );

        $id = null;
        $fieldContextId = null;
        $issueId = null;
        $projectKeyOrId = null;
        $issueTypeId = null;
        $startAt = 0;
        $maxResults = 100;

        $this->assertCall(
            method: 'getCustomFieldsConfigurations',
            call: [
                'uri' => '/rest/api/3/app/field/context/configuration/list',
                'method' => 'post',
                'body' => $request,
                'query' => compact('id', 'fieldContextId', 'issueId', 'projectKeyOrId', 'issueTypeId', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanBulkContextualConfiguration::class,
            ],
            arguments: [
                $request,
                $id,
                $fieldContextId,
                $issueId,
                $projectKeyOrId,
                $issueTypeId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":1000,"startAt":0,"total":2,"values":[{"customFieldId":"customfield_10035","fieldContextId":"10010","id":"10000"},{"configuration":{"maxValue":10000,"minValue":0},"customFieldId":"customfield_10036","fieldContextId":"10011","id":"10001","schema":{"properties":{"amount":{"type":"number"},"currency":{"type":"string"}},"required":["amount","currency"]}}]}',
        );
    }

    public function testGetCustomFieldConfiguration(): void
    {
        $fieldIdOrKey = 'foo';
        $id = null;
        $fieldContextId = null;
        $issueId = null;
        $projectKeyOrId = null;
        $issueTypeId = null;
        $startAt = 0;
        $maxResults = 100;

        $this->assertCall(
            method: 'getCustomFieldConfiguration',
            call: [
                'uri' => '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration',
                'method' => 'get',
                'query' => compact('id', 'fieldContextId', 'issueId', 'projectKeyOrId', 'issueTypeId', 'startAt', 'maxResults'),
                'path' => compact('fieldIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageBeanContextualConfiguration::class,
            ],
            arguments: [
                $fieldIdOrKey,
                $id,
                $fieldContextId,
                $issueId,
                $projectKeyOrId,
                $issueTypeId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":1000,"startAt":0,"total":2,"values":[{"id":"10000","fieldContextId":"10010"},{"id":"10001","fieldContextId":"10011","configuration":{"minValue":0,"maxValue":10000},"schema":{"properties":{"amount":{"type":"number"},"currency":{"type":"string"}},"required":["amount","currency"]}}]}',
        );
    }

    public function testUpdateCustomFieldConfiguration(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updateCustomFieldConfiguration',
            call: [
                'uri' => '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration',
                'method' => 'put',
                'body' => $request,
                'path' => compact('fieldIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $fieldIdOrKey,
            ],
            response: null,
        );
    }
}
