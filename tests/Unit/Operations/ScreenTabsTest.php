<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ScreenTabsTest extends OperationsTestCase
{
    public function testGetBulkScreenTabs(): void
    {
        $screenId = null;
        $tabId = null;
        $startAt = 0;
        $maxResult = 100;

        $this->assertCall(
            method: 'getBulkScreenTabs',
            call: [
                'uri' => '/rest/api/3/screens/tabs',
                'method' => 'get',
                'query' => compact('screenId', 'tabId', 'startAt', 'maxResult'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $screenId,
                $tabId,
                $startAt,
                $maxResult,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":2,"values":[{"screenId":10000,"tabId":10001,"tabName":"My Custom Tab 1"},{"screenId":10001,"tabId":10002,"tabName":"My Custom Tab 2"}]}',
        );
    }

    public function testGetAllScreenTabs(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAllScreenTabs',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs',
                'method' => 'get',
                'query' => compact('projectKey'),
                'path' => compact('screenId'),
                'success' => 200,
                'schema' => [Schema\ScreenableTab::class],
            ],
            arguments: [
                $screenId,
                $projectKey,
            ],
            response: null,
        );
    }

    public function testAddScreenTab(): void
    {
        $request = new Schema\ScreenableTab(
            name: 'Fields Tab',
        );

        $screenId = 1234;

        $this->assertCall(
            method: 'addScreenTab',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs',
                'method' => 'post',
                'body' => $request,
                'path' => compact('screenId'),
                'success' => 200,
                'schema' => Schema\ScreenableTab::class,
            ],
            arguments: [
                $request,
                $screenId,
            ],
            response: '{"id":10000,"name":"Fields Tab"}',
        );
    }

    public function testRenameScreenTab(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $screenId = 1234;
        $tabId = 1234;

        $this->assertCall(
            method: 'renameScreenTab',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('screenId', 'tabId'),
                'success' => 200,
                'schema' => Schema\ScreenableTab::class,
            ],
            arguments: [
                $request,
                $screenId,
                $tabId,
            ],
            response: '{"id":10000,"name":"Fields Tab"}',
        );
    }

    public function testDeleteScreenTab(): void
    {
        $screenId = 1234;
        $tabId = 1234;

        $this->assertCall(
            method: 'deleteScreenTab',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}',
                'method' => 'delete',
                'path' => compact('screenId', 'tabId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $screenId,
                $tabId,
            ],
            response: null,
        );
    }

    public function testMoveScreenTab(): void
    {
        $screenId = 1234;
        $tabId = 1234;
        $pos = 1234;

        $this->assertCall(
            method: 'moveScreenTab',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/tabs/{tabId}/move/{pos}',
                'method' => 'post',
                'path' => compact('screenId', 'tabId', 'pos'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $screenId,
                $tabId,
                $pos,
            ],
            response: null,
        );
    }
}
