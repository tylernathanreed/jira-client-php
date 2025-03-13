<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCommentsTest extends OperationsTestCase
{
    public function testGetCommentsByIds(): void
    {
        $request = new Schema\IssueCommentListRequestBean(
            ids: [
                1,
                2,
                5,
                10,
            ],
        );

        $expand = null;

        $this->assertCall(
            method: 'getCommentsByIds',
            call: [
                'uri' => '/rest/api/3/comment/list',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\PageBeanComment::class,
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":1048576,"startAt":0,"total":1,"values":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}]}',
        );
    }

    public function testGetComments(): void
    {
        $issueIdOrKey = 'foo';
        $startAt = 0;
        $maxResults = 100;
        $orderBy = null;
        $expand = null;

        $this->assertCall(
            method: 'getComments',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/comment',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'orderBy', 'expand'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageOfComments::class,
            ],
            arguments: [
                $issueIdOrKey,
                $startAt,
                $maxResults,
                $orderBy,
                $expand,
            ],
            response: '{"comments":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"maxResults":1,"startAt":0,"total":1}',
        );
    }

    public function testAddComment(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'addComment',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/comment',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'path' => compact('issueIdOrKey'),
                'success' => 201,
                'schema' => Schema\Comment::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $expand,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}',
        );
    }

    public function testGetComment(): void
    {
        $issueIdOrKey = 'foo';
        $id = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'getComment',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\Comment::class,
            ],
            arguments: [
                $issueIdOrKey,
                $id,
                $expand,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}',
        );
    }

    public function testUpdateComment(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateComment',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('notifyUsers', 'overrideEditableFlag', 'expand'),
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 200,
                'schema' => Schema\Comment::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $id,
                $notifyUsers,
                $overrideEditableFlag,
                $expand,
            ],
            response: '{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}',
        );
    }

    public function testDeleteComment(): void
    {
        $issueIdOrKey = 'foo';
        $id = 'foo';

        $this->assertCall(
            method: 'deleteComment',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/comment/{id}',
                'method' => 'delete',
                'path' => compact('issueIdOrKey', 'id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $id,
            ],
            response: null,
        );
    }
}
