<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueRemoteLinksTest extends OperationsTestCase
{
    public function testGetRemoteIssueLinks(): void
    {
        $issueIdOrKey = 10000;
        $globalId = null;

        $this->assertCall(
            method: 'getRemoteIssueLinks',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink',
                'method' => 'get',
                'query' => compact('globalId'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\RemoteIssueLink::class,
            ],
            arguments: [
                $issueIdOrKey,
                $globalId,
            ],
            response: '[{"application":{"name":"My Acme Tracker","type":"com.acme.tracker"},"globalId":"system=http://www.mycompany.com/support&id=1","id":10000,"object":{"icon":{"title":"Support Ticket","url16x16":"http://www.mycompany.com/support/ticket.png"},"status":{"icon":{"link":"http://www.mycompany.com/support?id=1&details=closed","title":"Case Closed","url16x16":"http://www.mycompany.com/support/resolved.png"},"resolved":true},"summary":"Customer support issue","title":"TSTSUP-111","url":"http://www.mycompany.com/support?id=1"},"relationship":"causes","self":"https://your-domain.atlassian.net/rest/api/issue/MKY-1/remotelink/10000"},{"application":{"name":"My Acme Tester","type":"com.acme.tester"},"globalId":"system=http://www.anothercompany.com/tester&id=1234","id":10001,"object":{"icon":{"title":"Test Case","url16x16":"http://www.anothercompany.com/tester/images/testcase.gif"},"status":{"icon":{"link":"http://www.anothercompany.com/tester/person?accountId=5b10a2844c20165700ede21g","title":"Tested by Mia Krystof","url16x16":"http://www.anothercompany.com/tester/images/person/mia.gif"},"resolved":false},"summary":"Test that the submit button saves the item","title":"Test Case #1234","url":"http://www.anothercompany.com/tester/testcase/1234"},"relationship":"is tested by","self":"https://your-domain.atlassian.net/rest/api/issue/MKY-1/remotelink/10001"}]',
        );
    }

    public function testCreateOrUpdateRemoteIssueLink(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createOrUpdateRemoteIssueLink',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink',
                'method' => 'post',
                'body' => $request,
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\RemoteIssueLinkIdentifies::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
            ],
            response: '{"id":10000,"self":"https://your-domain.atlassian.net/rest/api/issue/MKY-1/remotelink/10000"}',
        );
    }

    public function testDeleteRemoteIssueLinkByGlobalId(): void
    {
        $issueIdOrKey = 10000;
        $globalId = 'system=http://www.mycompany.com/support&id=1';

        $this->assertCall(
            method: 'deleteRemoteIssueLinkByGlobalId',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink',
                'method' => 'delete',
                'query' => compact('globalId'),
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $globalId,
            ],
            response: null,
        );
    }

    public function testGetRemoteIssueLinkById(): void
    {
        $issueIdOrKey = 'foo';
        $linkId = 'foo';

        $this->assertCall(
            method: 'getRemoteIssueLinkById',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
                'method' => 'get',
                'path' => compact('issueIdOrKey', 'linkId'),
                'success' => 200,
                'schema' => Schema\RemoteIssueLink::class,
            ],
            arguments: [
                $issueIdOrKey,
                $linkId,
            ],
            response: '{"application":{"name":"My Acme Tracker","type":"com.acme.tracker"},"globalId":"system=http://www.mycompany.com/support&id=1","id":10000,"object":{"icon":{"title":"Support Ticket","url16x16":"http://www.mycompany.com/support/ticket.png"},"status":{"icon":{"link":"http://www.mycompany.com/support?id=1&details=closed","title":"Case Closed","url16x16":"http://www.mycompany.com/support/resolved.png"},"resolved":true},"summary":"Customer support issue","title":"TSTSUP-111","url":"http://www.mycompany.com/support?id=1"},"relationship":"causes","self":"https://your-domain.atlassian.net/rest/api/issue/MKY-1/remotelink/10000"}',
        );
    }

    public function testUpdateRemoteIssueLink(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateRemoteIssueLink',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueIdOrKey', 'linkId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $linkId,
            ],
            response: null,
        );
    }

    public function testDeleteRemoteIssueLinkById(): void
    {
        $issueIdOrKey = 10000;
        $linkId = 10000;

        $this->assertCall(
            method: 'deleteRemoteIssueLinkById',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/remotelink/{linkId}',
                'method' => 'delete',
                'path' => compact('issueIdOrKey', 'linkId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $linkId,
            ],
            response: null,
        );
    }
}
