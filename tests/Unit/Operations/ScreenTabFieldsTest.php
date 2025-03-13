<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ScreenTabFieldsTest extends OperationsTestCase
{
    public function testGetAllScreenTabFields(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAllScreenTabFields',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields',
                'method' => 'get',
                'query' => compact('projectKey'),
                'path' => compact('screenId', 'tabId'),
                'success' => 200,
                'schema' => [Schema\ScreenableField::class],
            ],
            arguments: [
                $screenId,
                $tabId,
                $projectKey,
            ],
            response: null,
        );
    }

    public function testAddScreenTabField(): void
    {
        $request = new Schema\AddFieldBean(
            fieldId: 'summary',
        );

        $screenId = 1234;
        $tabId = 1234;

        $this->assertCall(
            method: 'addScreenTabField',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields',
                'method' => 'post',
                'body' => $request,
                'path' => compact('screenId', 'tabId'),
                'success' => 200,
                'schema' => Schema\ScreenableField::class,
            ],
            arguments: [
                $request,
                $screenId,
                $tabId,
            ],
            response: '{"id":"summary","name":"Summary"}',
        );
    }

    public function testRemoveScreenTabField(): void
    {
        $screenId = 1234;
        $tabId = 1234;
        $id = 'foo';

        $this->assertCall(
            method: 'removeScreenTabField',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}',
                'method' => 'delete',
                'path' => compact('screenId', 'tabId', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $screenId,
                $tabId,
                $id,
            ],
            response: null,
        );
    }

    public function testMoveScreenTabField(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $screenId = 1234;
        $tabId = 1234;
        $id = 'foo';

        $this->assertCall(
            method: 'moveScreenTabField',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}/move',
                'method' => 'post',
                'body' => $request,
                'path' => compact('screenId', 'tabId', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $screenId,
                $tabId,
                $id,
            ],
            response: null,
        );
    }
}
