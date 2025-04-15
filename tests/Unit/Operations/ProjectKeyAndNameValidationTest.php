<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectKeyAndNameValidationTest extends OperationsTestCase
{
    public function testValidateProjectKey(): void
    {
        $key = 'HSP';

        $this->assertCall(
            method: 'validateProjectKey',
            call: [
                'uri' => '/rest/api/3/projectvalidate/key',
                'method' => 'get',
                'query' => compact('key'),
                'success' => 200,
                'schema' => Schema\ErrorCollection::class,
            ],
            arguments: [
                $key,
            ],
            response: '{"errorMessages":[],"errors":{"projectKey":"A project with that project key already exists."}}',
        );
    }

    public function testGetValidProjectKey(): void
    {
        $key = 'HSP';

        $this->assertCall(
            method: 'getValidProjectKey',
            call: [
                'uri' => '/rest/api/3/projectvalidate/validProjectKey',
                'method' => 'get',
                'query' => compact('key'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $key,
            ],
            response: '"VPNE"',
        );
    }

    public function testGetValidProjectName(): void
    {
        $name = 'foo';

        $this->assertCall(
            method: 'getValidProjectName',
            call: [
                'uri' => '/rest/api/3/projectvalidate/validProjectName',
                'method' => 'get',
                'query' => compact('name'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $name,
            ],
            response: '"Valid Project Name Example"',
        );
    }
}
