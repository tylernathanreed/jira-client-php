<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCommentPropertiesTest extends OperationsTestCase
{
    public function testGetCommentPropertyKeys(): void
    {
        $commentId = 'foo';

        $this->assertCall(
            method: 'getCommentPropertyKeys',
            call: [
                'uri' => '/rest/api/3/comment/{commentId}/properties',
                'method' => 'get',
                'path' => compact('commentId'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $commentId,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetCommentProperty(): void
    {
        $commentId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getCommentProperty',
            call: [
                'uri' => '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('commentId', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $commentId,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetCommentProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setCommentProperty',
            call: [
                'uri' => '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('commentId', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $commentId,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteCommentProperty(): void
    {
        $commentId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteCommentProperty',
            call: [
                'uri' => '/rest/api/3/comment/{commentId}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('commentId', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $commentId,
                $propertyKey,
            ],
            response: null,
        );
    }
}
