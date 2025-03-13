<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueVotesTest extends OperationsTestCase
{
    public function testGetVotes(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'getVotes',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/votes',
                'method' => 'get',
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\Votes::class,
            ],
            arguments: [
                $issueIdOrKey,
            ],
            response: '{"hasVoted":true,"self":"https://your-domain.atlassian.net/rest/api/issue/MKY-1/votes","voters":[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}],"votes":24}',
        );
    }

    public function testAddVote(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'addVote',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/votes',
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

    public function testRemoveVote(): void
    {
        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'removeVote',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/votes',
                'method' => 'delete',
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
}
