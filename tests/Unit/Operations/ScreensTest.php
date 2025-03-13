<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ScreensTest extends OperationsTestCase
{
    public function testGetScreensForField(): void
    {
        $fieldId = 'foo';
        $startAt = 0;
        $maxResults = 100;
        $expand = null;

        $this->assertCall(
            method: 'getScreensForField',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/screens',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'expand'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanScreenWithTab::class,
            ],
            arguments: [
                $fieldId,
                $startAt,
                $maxResults,
                $expand,
            ],
            response: '{"isLast":false,"maxResults":1,"startAt":0,"total":5,"values":[{"id":10001,"name":"Default Screen","description":"Provides for the update of all system fields.","tab":{"id":10000,"name":"Fields Tab"}}]}',
        );
    }

    public function testGetScreens(): void
    {
        $startAt = 0;
        $maxResults = 100;
        $id = null;
        $queryString = '';
        $scope = null;
        $orderBy = null;

        $this->assertCall(
            method: 'getScreens',
            call: [
                'uri' => '/rest/api/3/screens',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'queryString', 'scope', 'orderBy'),
                'success' => 200,
                'schema' => Schema\PageBeanScreen::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $queryString,
                $scope,
                $orderBy,
            ],
            response: '{"isLast":true,"maxResults":100,"self":"https://your-domain.atlassian.net/rest/api/3/screens","startAt":0,"total":3,"values":[{"id":1,"name":"Default Screen","description":"Provides for the update all system fields."},{"id":2,"name":"Workflow Screen","description":"This screen is used in the workflow and enables you to assign issues."},{"id":3,"name":"Resolve Issue Screen","description":"Offers the ability to set resolution, change fix versions, and assign an issue."}]}',
        );
    }

    public function testCreateScreen(): void
    {
        $request = new Schema\ScreenDetails(
            description: 'Enables changes to resolution and linked issues.',
            name: 'Resolve Security Issue Screen',
        );

        $this->assertCall(
            method: 'createScreen',
            call: [
                'uri' => '/rest/api/3/screens',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\Screen::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":10005,"name":"Resolve Security Issue Screen","description":"Enables changes to resolution and linked issues."}',
        );
    }

    public function testAddFieldToDefaultScreen(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'addFieldToDefaultScreen',
            call: [
                'uri' => '/rest/api/3/screens/addToDefault/{fieldId}',
                'method' => 'post',
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $fieldId,
            ],
            response: null,
        );
    }

    public function testUpdateScreen(): void
    {
        $request = new Schema\UpdateScreenDetails(
            description: 'Enables changes to resolution and linked issues for accessibility related issues.',
            name: 'Resolve Accessibility Issue Screen',
        );

        $screenId = 1234;

        $this->assertCall(
            method: 'updateScreen',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('screenId'),
                'success' => 200,
                'schema' => Schema\Screen::class,
            ],
            arguments: [
                $request,
                $screenId,
            ],
            response: '{"id":10005,"name":"Resolve Security Issue Screen","description":"Enables changes to resolution and linked issues."}',
        );
    }

    public function testDeleteScreen(): void
    {
        $screenId = 1234;

        $this->assertCall(
            method: 'deleteScreen',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}',
                'method' => 'delete',
                'path' => compact('screenId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $screenId,
            ],
            response: null,
        );
    }

    public function testGetAvailableScreenFields(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getAvailableScreenFields',
            call: [
                'uri' => '/rest/api/3/screens/{screenId}/availableFields',
                'method' => 'get',
                'path' => compact('screenId'),
                'success' => 200,
                'schema' => [Schema\ScreenableField::class],
            ],
            arguments: [
                $screenId,
            ],
            response: null,
        );
    }
}
