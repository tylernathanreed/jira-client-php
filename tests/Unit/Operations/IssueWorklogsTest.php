<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueWorklogsTest extends OperationsTestCase
{
    public function testGetIssueWorklog(): void
    {
        $issueIdOrKey = 'foo';
        $startAt = 0;
        $maxResults = 5000;
        $startedAfter = null;
        $startedBefore = null;
        $expand = '';

        $this->assertCall(
            method: 'getIssueWorklog',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'startedAfter', 'startedBefore', 'expand'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageOfWorklogs::class,
            ],
            arguments: [
                $issueIdOrKey,
                $startAt,
                $maxResults,
                $startedAfter,
                $startedBefore,
                $expand,
            ],
            response: '{"maxResults":1,"startAt":0,"total":1,"worklogs":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}]}',
        );
    }

    public function testAddWorklog(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'addWorklog',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog',
                'method' => 'post',
                'body' => $request,
                'query' => compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'reduceBy', 'expand', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey'),
                'success' => 201,
                'schema' => Schema\Worklog::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $notifyUsers,
                $adjustEstimate,
                $newEstimate,
                $reduceBy,
                $expand,
                $overrideEditableFlag,
            ],
            response: null,
        );
    }

    public function testBulkDeleteWorklogs(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkDeleteWorklogs',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog',
                'method' => 'delete',
                'body' => $request,
                'query' => compact('adjustEstimate', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $adjustEstimate,
                $overrideEditableFlag,
            ],
            response: null,
        );
    }

    public function testBulkMoveWorklogs(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'bulkMoveWorklogs',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/move',
                'method' => 'post',
                'body' => $request,
                'query' => compact('adjustEstimate', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $adjustEstimate,
                $overrideEditableFlag,
            ],
            response: null,
        );
    }

    public function testGetWorklog(): void
    {
        $issueIdOrKey = 'foo';
        $id = 'foo';
        $expand = '';

        $this->assertCall(
            method: 'getWorklog',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\Worklog::class,
            ],
            arguments: [
                $issueIdOrKey,
                $id,
                $expand,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}',
        );
    }

    public function testUpdateWorklog(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateWorklog',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'expand', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\Worklog::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $id,
                $notifyUsers,
                $adjustEstimate,
                $newEstimate,
                $expand,
                $overrideEditableFlag,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}',
        );
    }

    public function testDeleteWorklog(): void
    {
        $issueIdOrKey = 'foo';
        $id = 'foo';
        $notifyUsers = true;
        $adjustEstimate = 'auto';
        $newEstimate = null;
        $increaseBy = null;
        $overrideEditableFlag = false;

        $this->assertCall(
            method: 'deleteWorklog',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/worklog/{id}',
                'method' => 'delete',
                'query' => compact('notifyUsers', 'adjustEstimate', 'newEstimate', 'increaseBy', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $id,
                $notifyUsers,
                $adjustEstimate,
                $newEstimate,
                $increaseBy,
                $overrideEditableFlag,
            ],
            response: null,
        );
    }

    public function testGetIdsOfWorklogsDeletedSince(): void
    {
        $since = 0;

        $this->assertCall(
            method: 'getIdsOfWorklogsDeletedSince',
            call: [
                'uri' => '/rest/api/3/worklog/deleted',
                'method' => 'get',
                'query' => compact('since'),
                'success' => 200,
                'schema' => Schema\ChangedWorklogs::class,
            ],
            arguments: [
                $since,
            ],
            response: '{"lastPage":true,"nextPage":"https://your-domain.atlassian.net/api/~ver~/worklog/deleted?since=1438013693136","self":"https://your-domain.atlassian.net/api/~ver~/worklog/deleted?since=1438013671562","since":1438013671562,"until":1438013693136,"values":[{"properties":[],"updatedTime":1438013671562,"worklogId":103},{"properties":[],"updatedTime":1438013672165,"worklogId":104},{"properties":[],"updatedTime":1438013693136,"worklogId":105}]}',
        );
    }

    public function testGetWorklogsForIds(): void
    {
        $request = $this->deserialize(Schema\WorklogIdsRequestBean::class, [
            'ids' => [
                '1',
                '2',
                '5',
                '10',
            ],
        ]);

        $expand = '';

        $this->assertCall(
            method: 'getWorklogsForIds',
            call: [
                'uri' => '/rest/api/3/worklog/list',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => [Schema\Worklog::class],
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}]',
        );
    }

    public function testGetIdsOfWorklogsModifiedSince(): void
    {
        $since = 0;
        $expand = '';

        $this->assertCall(
            method: 'getIdsOfWorklogsModifiedSince',
            call: [
                'uri' => '/rest/api/3/worklog/updated',
                'method' => 'get',
                'query' => compact('since', 'expand'),
                'success' => 200,
                'schema' => Schema\ChangedWorklogs::class,
            ],
            arguments: [
                $since,
                $expand,
            ],
            response: '{"lastPage":true,"nextPage":"https://your-domain.atlassian.net/api/~ver~/worklog/updated?since=1438013693136","self":"https://your-domain.atlassian.net/api/~ver~/worklog/updated?since=1438013671562","since":1438013671562,"until":1438013693136,"values":[{"properties":[],"updatedTime":1438013671562,"worklogId":103},{"properties":[],"updatedTime":1438013672165,"worklogId":104},{"properties":[],"updatedTime":1438013693136,"worklogId":105}]}',
        );
    }
}
