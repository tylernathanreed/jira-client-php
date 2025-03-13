<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueLinksTest extends OperationsTestCase
{
    public function testLinkIssues(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'linkIssues',
            call: [
                'uri' => '/rest/api/3/issueLink',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testGetIssueLink(): void
    {
        $linkId = 'foo';

        $this->assertCall(
            method: 'getIssueLink',
            call: [
                'uri' => '/rest/api/3/issueLink/{linkId}',
                'method' => 'get',
                'path' => compact('linkId'),
                'success' => 200,
                'schema' => Schema\IssueLink::class,
            ],
            arguments: [
                $linkId,
            ],
            response: '{"id":"10001","inwardIssue":{"fields":{"issuetype":{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false},"priority":{"description":"Very little impact.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/trivial.png","id":"2","name":"Trivial","self":"https://your-domain.atlassian.net/rest/api/3/priority/5","statusColor":"#cfcfcf"},"status":{"description":"The issue is closed.","iconUrl":"https://your-domain.atlassian.net/images/icons/closed.gif","id":"5","name":"Closed","self":"https://your-domain.atlassian.net/rest/api/3/status/5","statusCategory":{"colorName":"green","id":9,"key":"completed","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/9"}}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"outwardIssue":{"fields":{"issuetype":{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},"priority":{"description":"Major loss of function.","iconUrl":"https://your-domain.atlassian.net/images/icons/priorities/major.png","id":"1","name":"Major","self":"https://your-domain.atlassian.net/rest/api/3/priority/3","statusColor":"#009900"},"status":{"description":"The issue is currently being worked on.","iconUrl":"https://your-domain.atlassian.net/images/icons/progress.gif","id":"10000","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/status/10000","statusCategory":{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"}}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"1000","inward":"Duplicated by","name":"Duplicate","outward":"Duplicates","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1000"}}',
        );
    }

    public function testDeleteIssueLink(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteIssueLink',
            call: [
                'uri' => '/rest/api/3/issueLink/{linkId}',
                'method' => 'delete',
                'path' => compact('linkId'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $linkId,
            ],
            response: null,
        );
    }
}
