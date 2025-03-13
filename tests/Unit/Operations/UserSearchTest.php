<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class UserSearchTest extends OperationsTestCase
{
    public function testFindBulkAssignableUsers(): void
    {
        $projectKeys = 'foo';
        $query = 'query';
        $username = null;
        $accountId = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'findBulkAssignableUsers',
            call: [
                'uri' => '/rest/api/3/user/assignable/multiProjectSearch',
                'method' => 'get',
                'query' => compact('projectKeys', 'query', 'username', 'accountId', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $projectKeys,
                $query,
                $username,
                $accountId,
                $startAt,
                $maxResults,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }

    public function testFindAssignableUsers(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'findAssignableUsers',
            call: [
                'uri' => '/rest/api/3/user/assignable/search',
                'method' => 'get',
                'query' => compact('query', 'sessionId', 'username', 'accountId', 'project', 'issueKey', 'issueId', 'startAt', 'maxResults', 'actionDescriptorId', 'recommend'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $query,
                $sessionId,
                $username,
                $accountId,
                $project,
                $issueKey,
                $issueId,
                $startAt,
                $maxResults,
                $actionDescriptorId,
                $recommend,
            ],
            response: '{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}',
        );
    }

    public function testFindUsersWithAllPermissions(): void
    {
        $permissions = 'foo';
        $query = 'query';
        $username = null;
        $accountId = null;
        $issueKey = null;
        $projectKey = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'findUsersWithAllPermissions',
            call: [
                'uri' => '/rest/api/3/user/permission/search',
                'method' => 'get',
                'query' => compact('permissions', 'query', 'username', 'accountId', 'issueKey', 'projectKey', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $permissions,
                $query,
                $username,
                $accountId,
                $issueKey,
                $projectKey,
                $startAt,
                $maxResults,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }

    public function testFindUsersForPicker(): void
    {
        $query = 'foo';
        $maxResults = 50;
        $showAvatar = false;
        $exclude = null;
        $excludeAccountIds = null;
        $avatarSize = null;
        $excludeConnectUsers = false;

        $this->assertCall(
            method: 'findUsersForPicker',
            call: [
                'uri' => '/rest/api/3/user/picker',
                'method' => 'get',
                'query' => compact('query', 'maxResults', 'showAvatar', 'exclude', 'excludeAccountIds', 'avatarSize', 'excludeConnectUsers'),
                'success' => 200,
                'schema' => Schema\FoundUsers::class,
            ],
            arguments: [
                $query,
                $maxResults,
                $showAvatar,
                $exclude,
                $excludeAccountIds,
                $avatarSize,
                $excludeConnectUsers,
            ],
            response: '{"header":"Showing 20 of 25 matching groups","total":25,"users":[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","avatarUrl":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","displayName":"Mia Krystof","html":"<strong>Mi</strong>a Krystof - <strong>mi</strong>a@example.com (<strong>mi</strong>a)","key":"mia","name":"mia"}]}',
        );
    }

    public function testFindUsers(): void
    {
        $query = 'query';
        $username = null;
        $accountId = null;
        $startAt = 0;
        $maxResults = 50;
        $property = null;

        $this->assertCall(
            method: 'findUsers',
            call: [
                'uri' => '/rest/api/3/user/search',
                'method' => 'get',
                'query' => compact('query', 'username', 'accountId', 'startAt', 'maxResults', 'property'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $query,
                $username,
                $accountId,
                $startAt,
                $maxResults,
                $property,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }

    public function testFindUsersByQuery(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'findUsersByQuery',
            call: [
                'uri' => '/rest/api/3/user/search/query',
                'method' => 'get',
                'query' => compact('query', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanUser::class,
            ],
            arguments: [
                $query,
                $startAt,
                $maxResults,
            ],
            response: null,
        );
    }

    public function testFindUserKeysByQuery(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'findUserKeysByQuery',
            call: [
                'uri' => '/rest/api/3/user/search/query/key',
                'method' => 'get',
                'query' => compact('query', 'startAt', 'maxResult'),
                'success' => 200,
                'schema' => Schema\PageBeanUserKey::class,
            ],
            arguments: [
                $query,
                $startAt,
                $maxResult,
            ],
            response: null,
        );
    }

    public function testFindUsersWithBrowsePermission(): void
    {
        $query = 'query';
        $username = null;
        $accountId = null;
        $issueKey = null;
        $projectKey = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'findUsersWithBrowsePermission',
            call: [
                'uri' => '/rest/api/3/user/viewissue/search',
                'method' => 'get',
                'query' => compact('query', 'username', 'accountId', 'issueKey', 'projectKey', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $query,
                $username,
                $accountId,
                $issueKey,
                $projectKey,
                $startAt,
                $maxResults,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }
}
