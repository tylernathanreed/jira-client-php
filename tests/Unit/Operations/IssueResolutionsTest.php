<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueResolutionsTest extends OperationsTestCase
{
    public function testGetResolutions(): void
    {
        $this->assertCall(
            method: 'getResolutions',
            call: [
                'uri' => '/rest/api/3/resolution',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\Resolution::class],
            ],
            arguments: [],
            response: '[{"description":"A fix for this issue is checked into the tree and tested.","id":"10000","name":"Fixed","self":"https://your-domain.atlassian.net/rest/api/3/resolution/1"},{"description":"This is what it is supposed to do.","id":"10001","name":"Works as designed","self":"https://your-domain.atlassian.net/rest/api/3/resolution/3"}]',
        );
    }

    public function testCreateResolution(): void
    {
        $request = new Schema\CreateResolutionDetails(
            description: 'My resolution description',
            name: 'My new resolution',
        );

        $this->assertCall(
            method: 'createResolution',
            call: [
                'uri' => '/rest/api/3/resolution',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\ResolutionId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testSetDefaultResolution(): void
    {
        $request = new Schema\SetDefaultResolutionRequest(
            id: '3',
        );

        $this->assertCall(
            method: 'setDefaultResolution',
            call: [
                'uri' => '/rest/api/3/resolution/default',
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

    public function testMoveResolutions(): void
    {
        $request = new Schema\ReorderIssueResolutionsRequest(
            after: '10002',
            ids: [
                '10000',
                '10001',
            ],
        );

        $this->assertCall(
            method: 'moveResolutions',
            call: [
                'uri' => '/rest/api/3/resolution/move',
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

    public function testSearchResolutions(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $onlyDefault = false;

        $this->assertCall(
            method: 'searchResolutions',
            call: [
                'uri' => '/rest/api/3/resolution/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'onlyDefault'),
                'success' => 200,
                'schema' => Schema\PageBeanResolutionJsonBean::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $onlyDefault,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"description":"This is what it is supposed to do.","id":"10001","isDefault":true,"name":"Works as designed"}]}',
        );
    }

    public function testGetResolution(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getResolution',
            call: [
                'uri' => '/rest/api/3/resolution/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Resolution::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"description":"A fix for this issue is checked into the tree and tested.","id":"10000","name":"Fixed","self":"https://your-domain.atlassian.net/rest/api/3/resolution/1"}',
        );
    }

    public function testUpdateResolution(): void
    {
        $request = new Schema\UpdateResolutionDetails(
            description: 'My updated resolution description',
            name: 'My updated resolution',
        );

        $id = 'foo';

        $this->assertCall(
            method: 'updateResolution',
            call: [
                'uri' => '/rest/api/3/resolution/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteResolution(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteResolution',
            call: [
                'uri' => '/rest/api/3/resolution/{id}',
                'method' => 'delete',
                'query' => compact('replaceWith'),
                'path' => compact('id'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $id,
                $replaceWith,
            ],
            response: null,
        );
    }
}
