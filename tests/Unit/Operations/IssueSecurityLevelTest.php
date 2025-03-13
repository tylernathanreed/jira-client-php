<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueSecurityLevelTest extends OperationsTestCase
{
    public function testGetIssueSecurityLevelMembers(): void
    {
        $issueSecuritySchemeId = 1234;
        $startAt = 0;
        $maxResults = 50;
        $issueSecurityLevelId = null;
        $expand = null;

        $this->assertCall(
            method: 'getIssueSecurityLevelMembers',
            call: [
                'uri' => '/rest/api/3/issuesecurityschemes/{issueSecuritySchemeId}/members',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'issueSecurityLevelId', 'expand'),
                'path' => compact('issueSecuritySchemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueSecurityLevelMember::class,
            ],
            arguments: [
                $issueSecuritySchemeId,
                $startAt,
                $maxResults,
                $issueSecurityLevelId,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"id":10000,"issueSecurityLevelId":10020,"holder":{"expand":"user","type":"user","user":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}}},{"id":10001,"issueSecurityLevelId":10020,"holder":{"expand":"group","parameter":"jira-core-users","type":"group","value":"9c559b11-6c5d-4f96-992c-a746cabab28b"}},{"id":10002,"issueSecurityLevelId":10021,"holder":{"type":"assignee"}}]}',
        );
    }

    public function testGetIssueSecurityLevel(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getIssueSecurityLevel',
            call: [
                'uri' => '/rest/api/3/securitylevel/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\SecurityLevel::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"description":"Only the reporter and internal staff can see this issue.","id":"10021","name":"Reporter Only","self":"https://your-domain.atlassian.net/rest/api/3/securitylevel/10021"}',
        );
    }
}
