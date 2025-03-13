<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueWatchersTest extends OperationsTestCase
{
    public function testGetIsWatchingIssueBulk(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIsWatchingIssueBulk',
            call: [
                'uri' => '/rest/api/3/issue/watching',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\BulkIssueIsWatching::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issuesIsWatching":{"10001":true,"10002":false,"10005":true}}',
        );
    }

    public function testGetIssueWatchers(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'getIssueWatchers',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/watchers',
                'method' => 'get',
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\Watchers::class,
            ],
            arguments: [
                $issueIdOrKey,
            ],
            response: '{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1,"watchers":[{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}]}',
        );
    }

    public function testAddWatcher(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'addWatcher',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/watchers',
                'method' => 'post',
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
            ],
            response: null,
        );
    }

    public function testRemoveWatcher(): void
    {
        $issueIdOrKey = 'foo';
        $username = null;
        $accountId = '5b10ac8d82e05b22cc7d4ef5';

        $this->assertCall(
            method: 'removeWatcher',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/watchers',
                'method' => 'delete',
                'query' => compact('username', 'accountId'),
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $username,
                $accountId,
            ],
            response: null,
        );
    }
}
