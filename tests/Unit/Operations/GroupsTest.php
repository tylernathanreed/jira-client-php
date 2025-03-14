<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class GroupsTest extends OperationsTestCase
{
    public function testGetGroup(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getGroup',
            call: [
                'uri' => '/rest/api/3/group',
                'method' => 'get',
                'query' => compact('groupname', 'groupId', 'expand'),
                'success' => 200,
                'schema' => Schema\Group::class,
            ],
            arguments: [
                $groupname,
                $groupId,
                $expand,
            ],
            response: null,
        );
    }

    public function testCreateGroup(): void
    {
        $request = $this->deserialize(Schema\AddGroupBean::class, [
            'name' => 'power-users',
        ]);

        $this->assertCall(
            method: 'createGroup',
            call: [
                'uri' => '/rest/api/3/group',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\Group::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"expand":"users","groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"power-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625","users":{"end-index":0,"items":[{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}],"max-results":50,"size":1,"start-index":0}}',
        );
    }

    public function testRemoveGroup(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'removeGroup',
            call: [
                'uri' => '/rest/api/3/group',
                'method' => 'delete',
                'query' => compact('groupname', 'groupId', 'swapGroup', 'swapGroupId'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $groupname,
                $groupId,
                $swapGroup,
                $swapGroupId,
            ],
            response: null,
        );
    }

    public function testBulkGetGroups(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'bulkGetGroups',
            call: [
                'uri' => '/rest/api/3/group/bulk',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'groupId', 'groupName', 'accessType', 'applicationKey'),
                'success' => 200,
                'schema' => Schema\PageBeanGroupDetails::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $groupId,
                $groupName,
                $accessType,
                $applicationKey,
            ],
            response: '{"isLast":true,"maxResults":10,"startAt":0,"total":2,"values":[{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jdog-developers"},{"groupId":"6e87dc72-4f1f-421f-9382-2fee8b652487","name":"juvenal-bot"}]}',
        );
    }

    public function testGetUsersFromGroup(): void
    {
        $groupname = null;
        $groupId = null;
        $includeInactiveUsers = false;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getUsersFromGroup',
            call: [
                'uri' => '/rest/api/3/group/member',
                'method' => 'get',
                'query' => compact('groupname', 'groupId', 'includeInactiveUsers', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanUserDetails::class,
            ],
            arguments: [
                $groupname,
                $groupId,
                $includeInactiveUsers,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":false,"maxResults":2,"nextPage":"https://your-domain.atlassian.net/rest/api/3/group/member?groupId=276f955c-63d7-42c8-9520-92d01dca0625&includeInactiveUsers=false&startAt=4&maxResults=2","self":"https://your-domain.atlassian.net/rest/api/3/group/member?groupId=276f955c-63d7-42c8-9520-92d01dca0625&includeInactiveUsers=false&startAt=2&maxResults=2","startAt":3,"total":5,"values":[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"avatarUrls":{},"displayName":"Mia","emailAddress":"mia@example.com","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},{"accountId":"5b10a0effa615349cb016cd8","accountType":"atlassian","active":false,"avatarUrls":{},"displayName":"Will","emailAddress":"will@example.com","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a0effa615349cb016cd8","timeZone":"Australia/Sydney"}]}',
        );
    }

    public function testAddUserToGroup(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'addUserToGroup',
            call: [
                'uri' => '/rest/api/3/group/user',
                'method' => 'post',
                'body' => $request,
                'query' => compact('groupname', 'groupId'),
                'success' => 201,
                'schema' => Schema\Group::class,
            ],
            arguments: [
                $request,
                $groupname,
                $groupId,
            ],
            response: null,
        );
    }

    public function testRemoveUserFromGroup(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'removeUserFromGroup',
            call: [
                'uri' => '/rest/api/3/group/user',
                'method' => 'delete',
                'query' => compact('accountId', 'groupname', 'groupId', 'username'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $accountId,
                $groupname,
                $groupId,
                $username,
            ],
            response: null,
        );
    }

    public function testFindGroups(): void
    {
        $accountId = null;
        $query = 'query';
        $exclude = null;
        $excludeId = null;
        $maxResults = null;
        $caseInsensitive = false;
        $userName = null;

        $this->assertCall(
            method: 'findGroups',
            call: [
                'uri' => '/rest/api/3/groups/picker',
                'method' => 'get',
                'query' => compact('accountId', 'query', 'exclude', 'excludeId', 'maxResults', 'caseInsensitive', 'userName'),
                'success' => 200,
                'schema' => Schema\FoundGroups::class,
            ],
            arguments: [
                $accountId,
                $query,
                $exclude,
                $excludeId,
                $maxResults,
                $caseInsensitive,
                $userName,
            ],
            response: '{"groups":[{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","html":"<b>j</b>dog-developers","name":"jdog-developers"},{"groupId":"6e87dc72-4f1f-421f-9382-2fee8b652487","html":"<b>j</b>uvenal-bot","name":"juvenal-bot"}],"header":"Showing 20 of 25 matching groups","total":25}',
        );
    }
}
