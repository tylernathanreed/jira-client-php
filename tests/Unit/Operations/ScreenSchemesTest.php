<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ScreenSchemesTest extends OperationsTestCase
{
    public function testGetScreenSchemes(): void
    {
        $startAt = 0;
        $maxResults = 25;
        $id = null;
        $expand = '';
        $queryString = '';
        $orderBy = null;

        $this->assertCall(
            method: 'getScreenSchemes',
            call: [
                'uri' => '/rest/api/3/screenscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'expand', 'queryString', 'orderBy'),
                'success' => 200,
                'schema' => Schema\PageBeanScreenScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $expand,
                $queryString,
                $orderBy,
            ],
            response: '{"isLast":true,"maxResults":100,"self":"https://your-domain.atlassian.net/rest/api/3/screenscheme?maxResults=25&startAt=0","startAt":0,"total":2,"values":[{"id":10010,"name":"Employee screen scheme","description":"Manage employee data","screens":{"default":10017,"edit":10019,"create":10019,"view":10020},"issueTypeScreenSchemes":{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"id":"10000","name":"Office issue type screen scheme","description":"Managing office projects"}]}},{"id":10032,"name":"Office screen scheme","description":"Manage office data","screens":{"default":10020}}]}',
        );
    }

    public function testCreateScreenScheme(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createScreenScheme',
            call: [
                'uri' => '/rest/api/3/screenscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\ScreenSchemeId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":10001}',
        );
    }

    public function testUpdateScreenScheme(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateScreenScheme',
            call: [
                'uri' => '/rest/api/3/screenscheme/{screenSchemeId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('screenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $screenSchemeId,
            ],
            response: null,
        );
    }

    public function testDeleteScreenScheme(): void
    {
        $screenSchemeId = 'foo';

        $this->assertCall(
            method: 'deleteScreenScheme',
            call: [
                'uri' => '/rest/api/3/screenscheme/{screenSchemeId}',
                'method' => 'delete',
                'path' => compact('screenSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $screenSchemeId,
            ],
            response: null,
        );
    }
}
