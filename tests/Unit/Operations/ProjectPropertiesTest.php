<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectPropertiesTest extends OperationsTestCase
{
    public function testGetProjectPropertyKeys(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getProjectPropertyKeys',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/properties',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetProjectProperty(): void
    {
        $projectIdOrKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getProjectProperty',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('projectIdOrKey', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $projectIdOrKey,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetProjectProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setProjectProperty',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('projectIdOrKey', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteProjectProperty(): void
    {
        $projectIdOrKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteProjectProperty',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('projectIdOrKey', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
                $propertyKey,
            ],
            response: null,
        );
    }
}
