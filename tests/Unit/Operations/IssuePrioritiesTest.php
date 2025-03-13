<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssuePrioritiesTest extends OperationsTestCase
{
    public function testGetPriorities(): void
    {
        $this->assertCall(
            method: 'getPriorities',
            call: [
                'uri' => '/rest/api/3/priority',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\Priority::class],
            ],
            arguments: [],
            response: '[{"description":"Major loss of function.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/major.png","id":"1","name":"Major","self":"https://your-domain.atlassian.net/rest/api/3/priority/3","statusColor":"#009900"},{"description":"Very little impact.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/trivial.png","id":"2","name":"Trivial","self":"https://your-domain.atlassian.net/rest/api/3/priority/5","statusColor":"#cfcfcf"}]',
        );
    }

    public function testCreatePriority(): void
    {
        $request = new Schema\CreatePriorityDetails(
            description: 'My priority description',
            iconUrl: 'images/icons/priorities/major.png',
            name: 'My new priority',
            statusColor: '#ABCDEF',
        );

        $this->assertCall(
            method: 'createPriority',
            call: [
                'uri' => '/rest/api/3/priority',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\PriorityId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testSetDefaultPriority(): void
    {
        $request = new Schema\SetDefaultPriorityRequest(
            id: '3',
        );

        $this->assertCall(
            method: 'setDefaultPriority',
            call: [
                'uri' => '/rest/api/3/priority/default',
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

    public function testMovePriorities(): void
    {
        $request = new Schema\ReorderIssuePriorities(
            after: '10003',
            ids: [
                '10004',
                '10005',
            ],
        );

        $this->assertCall(
            method: 'movePriorities',
            call: [
                'uri' => '/rest/api/3/priority/move',
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

    public function testSearchPriorities(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $projectId = null;
        $priorityName = '';
        $onlyDefault = false;
        $expand = '';

        $this->assertCall(
            method: 'searchPriorities',
            call: [
                'uri' => '/rest/api/3/priority/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'projectId', 'priorityName', 'onlyDefault', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanPriority::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $projectId,
                $priorityName,
                $onlyDefault,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":2,"values":[{"description":"Major loss of function.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/major.png","id":"1","isDefault":true,"name":"Major","self":"https://your-domain.atlassian.net/rest/api/3/priority/3","statusColor":"#009900"},{"description":"Very little impact.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/trivial.png","id":"2","isDefault":false,"name":"Trivial","self":"https://your-domain.atlassian.net/rest/api/3/priority/5","statusColor":"#cfcfcf"}]}',
        );
    }

    public function testGetPriority(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getPriority',
            call: [
                'uri' => '/rest/api/3/priority/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Priority::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"description":"Major loss of function.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/major.png","id":"1","name":"Major","self":"https://your-domain.atlassian.net/rest/api/3/priority/3","statusColor":"#009900"}',
        );
    }

    public function testUpdatePriority(): void
    {
        $request = new Schema\UpdatePriorityDetails(
            description: 'My updated priority description',
            iconUrl: 'images/icons/priorities/minor.png',
            name: 'My updated priority',
            statusColor: '#123456',
        );

        $id = 'foo';

        $this->assertCall(
            method: 'updatePriority',
            call: [
                'uri' => '/rest/api/3/priority/{id}',
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

    public function testDeletePriority(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deletePriority',
            call: [
                'uri' => '/rest/api/3/priority/{id}',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }
}
