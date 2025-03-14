<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectClassificationLevelsTest extends OperationsTestCase
{
    public function testGetDefaultProjectClassification(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getDefaultProjectClassification',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"classification":{"id":"ari:cloud:platform::classification-tag/5bfa70f7-4af1-44f5-9e12-1ce185f15a38","status":"published","name":"Restricted","rank":1,"description":"Data we hold that would be very damaging and would cause loss of trust with customers and present legal risk if mishandled","guideline":"Access to data must be restricted to only individuals who need access in order to perform their job duties.","color":"RED"}}',
        );
    }

    public function testUpdateDefaultProjectClassification(): void
    {
        $request = $this->deserialize(Schema\UpdateDefaultProjectClassificationBean::class, [
            'id' => 'ari:cloud:platform::classification-tag/dec24c48-5073-4c25-8fef-9d81a992c30c',
        ]);

        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'updateDefaultProjectClassification',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
                'method' => 'put',
                'body' => $request,
                'path' => compact('projectIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
            ],
            response: null,
        );
    }

    public function testRemoveDefaultProjectClassification(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'removeDefaultProjectClassification',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/classification-level/default',
                'method' => 'delete',
                'path' => compact('projectIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: null,
        );
    }
}
