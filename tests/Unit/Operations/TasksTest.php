<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class TasksTest extends OperationsTestCase
{
    public function testGetTask(): void
    {
        $taskId = 'foo';

        $this->assertCall(
            method: 'getTask',
            call: [
                'uri' => '/rest/api/3/task/{taskId}',
                'method' => 'get',
                'path' => compact('taskId'),
                'success' => 200,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $taskId,
            ],
            response: '{"self":"https://your-domain.atlassian.net/rest/api/3/task/1","id":"1","description":"Task description","status":"COMPLETE","result":"the task result, this may be any JSON","submittedBy":10000,"progress":100,"elapsedRuntime":156,"submitted":1501708132800,"started":1501708132900,"finished":1501708133000,"lastUpdate":1501708133000}',
        );
    }

    public function testCancelTask(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'cancelTask',
            call: [
                'uri' => '/rest/api/3/task/{taskId}/cancel',
                'method' => 'post',
                'path' => compact('taskId'),
                'success' => 202,
                'schema' => true,
            ],
            arguments: [
                $taskId,
            ],
            response: null,
        );
    }
}
