<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class UsersTest extends OperationsTestCase
{
    public function testGetUser(): void
    {
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $username = null;
        $key = null;
        $expand = null;

        $this->assertCall(
            method: 'getUser',
            call: [
                'uri' => '/rest/api/3/user',
                'method' => 'get',
                'query' => compact('accountId', 'username', 'key', 'expand'),
                'success' => 200,
                'schema' => Schema\User::class,
            ],
            arguments: [
                $accountId,
                $username,
                $key,
                $expand,
            ],
            response: '{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}',
        );
    }

    public function testCreateUser(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createUser',
            call: [
                'uri' => '/rest/api/3/user',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\User::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}',
        );
    }

    public function testRemoveUser(): void
    {
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $username = null;
        $key = null;

        $this->assertCall(
            method: 'removeUser',
            call: [
                'uri' => '/rest/api/3/user',
                'method' => 'delete',
                'query' => compact('accountId', 'username', 'key'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $accountId,
                $username,
                $key,
            ],
            response: null,
        );
    }

    public function testBulkGetUsers(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'bulkGetUsers',
            call: [
                'uri' => '/rest/api/3/user/bulk',
                'method' => 'get',
                'query' => compact('accountId', 'startAt', 'maxResults', 'username', 'key'),
                'success' => 200,
                'schema' => Schema\PageBeanUser::class,
            ],
            arguments: [
                $accountId,
                $startAt,
                $maxResults,
                $username,
                $key,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":1,"values":[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}]}',
        );
    }

    public function testBulkGetUsersMigration(): void
    {
        $startAt = 0;
        $maxResults = 10;
        $username = null;
        $key = null;

        $this->assertCall(
            method: 'bulkGetUsersMigration',
            call: [
                'uri' => '/rest/api/3/user/bulk/migration',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'username', 'key'),
                'success' => 200,
                'schema' => [Schema\UserMigrationBean::class],
            ],
            arguments: [
                $startAt,
                $maxResults,
                $username,
                $key,
            ],
            response: '[{"username":"mia","accountId":"5b10a2844c20165700ede21g"},{"username":"emma","accountId":"5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }

    public function testGetUserDefaultColumns(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getUserDefaultColumns',
            call: [
                'uri' => '/rest/api/3/user/columns',
                'method' => 'get',
                'query' => compact('accountId', 'username'),
                'success' => 200,
                'schema' => [Schema\ColumnItem::class],
            ],
            arguments: [
                $accountId,
                $username,
            ],
            response: null,
        );
    }

    public function testSetUserColumns(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setUserColumns',
            call: [
                'uri' => '/rest/api/3/user/columns',
                'method' => 'put',
                'query' => compact('accountId'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $accountId,
            ],
            response: null,
        );
    }

    public function testResetUserColumns(): void
    {
        $accountId = '5b10ac8d82e05b22cc7d4ef5';
        $username = null;

        $this->assertCall(
            method: 'resetUserColumns',
            call: [
                'uri' => '/rest/api/3/user/columns',
                'method' => 'delete',
                'query' => compact('accountId', 'username'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $accountId,
                $username,
            ],
            response: null,
        );
    }

    public function testGetUserEmail(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getUserEmail',
            call: [
                'uri' => '/rest/api/3/user/email',
                'method' => 'get',
                'query' => compact('accountId'),
                'success' => 200,
                'schema' => Schema\UnrestrictedUserEmail::class,
            ],
            arguments: [
                $accountId,
            ],
            response: 'name@example.com',
        );
    }

    public function testGetUserEmailBulk(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getUserEmailBulk',
            call: [
                'uri' => '/rest/api/3/user/email/bulk',
                'method' => 'get',
                'query' => compact('accountId'),
                'success' => 200,
                'schema' => Schema\UnrestrictedUserEmail::class,
            ],
            arguments: [
                $accountId,
            ],
            response: null,
        );
    }

    public function testGetUserGroups(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getUserGroups',
            call: [
                'uri' => '/rest/api/3/user/groups',
                'method' => 'get',
                'query' => compact('accountId', 'username', 'key'),
                'success' => 200,
                'schema' => [Schema\GroupName::class],
            ],
            arguments: [
                $accountId,
                $username,
                $key,
            ],
            response: '{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"}',
        );
    }

    public function testGetAllUsersDefault(): void
    {
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getAllUsersDefault',
            call: [
                'uri' => '/rest/api/3/users',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $startAt,
                $maxResults,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }

    public function testGetAllUsers(): void
    {
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getAllUsers',
            call: [
                'uri' => '/rest/api/3/users/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'success' => 200,
                'schema' => [Schema\User::class],
            ],
            arguments: [
                $startAt,
                $maxResults,
            ],
            response: '[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},{"accountId":"5b10ac8d82e05b22cc7d4ef5","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/AA-3.png?size=48&s=48"},"displayName":"Emma Richards","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10ac8d82e05b22cc7d4ef5"}]',
        );
    }
}
