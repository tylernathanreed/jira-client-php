<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class JQLFunctionsAppsTest extends OperationsTestCase
{
    public function testGetPrecomputations(): void
    {
        $functionKey = null;
        $startAt = 0;
        $maxResults = 100;
        $orderBy = null;

        $this->assertCall(
            method: 'getPrecomputations',
            call: [
                'uri' => '/rest/api/3/jql/function/computation',
                'method' => 'get',
                'query' => compact('functionKey', 'startAt', 'maxResults', 'orderBy'),
                'success' => 200,
                'schema' => Schema\PageBean2JqlFunctionPrecomputationBean::class,
            ],
            arguments: [
                $functionKey,
                $startAt,
                $maxResults,
                $orderBy,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"arguments":["Test"],"created":"2023-10-14T05:25:20.000+0000","field":"issue","functionKey":"ari:cloud:ecosystem::extension/00000000-1111-2222-3333-4444444/111111-2222-3333-4444-55555/static/issuesWithText","functionName":"issuesWithText","id":"cf75a1b0-4ac6-4bd8-8a50-29a465a96520","operator":"in","updated":"2023-10-14T05:25:20.000+0000","used":"2023-10-14T05:25:20.000+0000","value":"issue in (TEST-1, TEST-2, TEST-3)"},{"arguments":["10001"],"created":"2023-10-14T05:25:20.000+0000","error":"Error message to be displayed to the user","field":"issue","functionKey":"ari:cloud:ecosystem::extension/00000000-1111-2222-3333-4444444/111111-2222-3333-4444-55555/static/issuesWithText","functionName":"issuesWithText","id":"2a854f11-d0e1-4260-aea8-64a562a7062a","operator":"=","updated":"2023-10-14T05:25:20.000+0000","used":"2023-10-14T05:25:20.000+0000"}]}',
        );
    }

    public function testUpdatePrecomputations(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updatePrecomputations',
            call: [
                'uri' => '/rest/api/3/jql/function/computation',
                'method' => 'post',
                'body' => $request,
                'query' => compact('skipNotFoundPrecomputations'),
                'success' => 200,
                'schema' => Schema\JqlFunctionPrecomputationUpdateResponse::class,
            ],
            arguments: [
                $request,
                $skipNotFoundPrecomputations,
            ],
            response: null,
        );
    }

    public function testGetPrecomputationsByID(): void
    {
        $request = new Schema\JqlFunctionPrecomputationGetByIdRequest(
            precomputationIDs: [
                'f2ef228b-367f-4c6b-bd9d-0d0e96b5bd7b',
                '2a854f11-d0e1-4260-aea8-64a562a7062a',
            ],
        );

        $orderBy = null;

        $this->assertCall(
            method: 'getPrecomputationsByID',
            call: [
                'uri' => '/rest/api/3/jql/function/computation/search',
                'method' => 'post',
                'body' => $request,
                'query' => compact('orderBy'),
                'success' => 200,
                'schema' => Schema\JqlFunctionPrecomputationGetByIdResponse::class,
            ],
            arguments: [
                $request,
                $orderBy,
            ],
            response: '{"notFoundPrecomputationIDs":["cce1ef75-d566-40f8-a1a8-a9067f70ad69","82583f5d-0a44-454b-a1f5-4e06838fbf80"],"precomputations":[{"arguments":["Test"],"created":"2023-10-14T05:25:20.000+0000","field":"issue","functionKey":"ari:cloud:ecosystem::extension/00000000-1111-2222-3333-4444444/111111-2222-3333-4444-55555/static/issuesWithText","functionName":"issuesWithText","id":"cf75a1b0-4ac6-4bd8-8a50-29a465a96520","operator":"in","updated":"2023-10-14T05:25:20.000+0000","used":"2023-10-14T05:25:20.000+0000","value":"issue in (TEST-1, TEST-2, TEST-3)"},{"arguments":["10001"],"created":"2023-10-14T05:25:20.000+0000","error":"Error message to be displayed to the user","field":"issue","functionKey":"ari:cloud:ecosystem::extension/00000000-1111-2222-3333-4444444/111111-2222-3333-4444-55555/static/issuesWithText","functionName":"issuesWithText","id":"2a854f11-d0e1-4260-aea8-64a562a7062a","operator":"=","updated":"2023-10-14T05:25:20.000+0000","used":"2023-10-14T05:25:20.000+0000"}]}',
        );
    }
}
