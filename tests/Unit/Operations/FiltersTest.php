<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class FiltersTest extends OperationsTestCase
{
    public function testCreateFilter(): void
    {
        $request = new Schema\Filter(
            description: 'Lists all open bugs',
            jql: 'type = Bug and resolution is empty',
            name: 'All Open Bugs',
        );

        $expand = null;
        $overrideSharePermissions = false;

        $this->assertCall(
            method: 'createFilter',
            call: [
                'uri' => '/rest/api/3/filter',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand', 'overrideSharePermissions'),
                'success' => 200,
                'schema' => Schema\Filter::class,
            ],
            arguments: [
                $request,
                $expand,
                $overrideSharePermissions,
            ],
            response: '{"approximateLastUsed":null,"description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"}',
        );
    }

    public function testGetFavouriteFilters(): void
    {
        $expand = null;

        $this->assertCall(
            method: 'getFavouriteFilters',
            call: [
                'uri' => '/rest/api/3/filter/favourite',
                'method' => 'get',
                'query' => compact('expand'),
                'success' => 200,
                'schema' => [Schema\Filter::class],
            ],
            arguments: [
                $expand,
            ],
            response: '[{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"},{"approximateLastUsed":null,"description":"Issues assigned to me","favourite":true,"favouritedCount":0,"id":"10010","jql":"assignee = currentUser() and resolution is empty","name":"My issues","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=assignee+in+%28currentUser%28%29%29+and+resolution+is+empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10010","sharePermissions":[{"id":10000,"type":"global"},{"id":10010,"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"type":"project"}],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10010"}]',
        );
    }

    public function testGetMyFilters(): void
    {
        $expand = null;
        $includeFavourites = false;

        $this->assertCall(
            method: 'getMyFilters',
            call: [
                'uri' => '/rest/api/3/filter/my',
                'method' => 'get',
                'query' => compact('expand', 'includeFavourites'),
                'success' => 200,
                'schema' => [Schema\Filter::class],
            ],
            arguments: [
                $expand,
                $includeFavourites,
            ],
            response: '[{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"},{"approximateLastUsed":null,"description":"Issues assigned to me","favourite":true,"favouritedCount":0,"id":"10010","jql":"assignee = currentUser() and resolution is empty","name":"My issues","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=assignee+in+%28currentUser%28%29%29+and+resolution+is+empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10010","sharePermissions":[{"id":10000,"type":"global"},{"id":10010,"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"type":"project"}],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10010"}]',
        );
    }

    public function testGetFiltersPaginated(): void
    {
        $filterName = null;
        $accountId = null;
        $owner = null;
        $groupname = null;
        $groupId = null;
        $projectId = null;
        $id = null;
        $orderBy = 'name';
        $startAt = 0;
        $maxResults = 50;
        $expand = null;
        $overrideSharePermissions = false;
        $isSubstringMatch = false;

        $this->assertCall(
            method: 'getFiltersPaginated',
            call: [
                'uri' => '/rest/api/3/filter/search',
                'method' => 'get',
                'query' => compact('filterName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'id', 'orderBy', 'startAt', 'maxResults', 'expand', 'overrideSharePermissions', 'isSubstringMatch'),
                'success' => 200,
                'schema' => Schema\PageBeanFilterDetails::class,
            ],
            arguments: [
                $filterName,
                $accountId,
                $owner,
                $groupname,
                $groupId,
                $projectId,
                $id,
                $orderBy,
                $startAt,
                $maxResults,
                $expand,
                $overrideSharePermissions,
                $isSubstringMatch,
            ],
            response: '{"isLast":true,"maxResults":100,"self":"https://your-domain.atlassian.net/rest/api/3/filter/search?accountId=&maxResults=50&filterName=&orderBy=name&startAt=0&expand=description,owner,jql,searchUrl,viewUrl,favourite,favouritedCount,sharePermissions,editPermissions,isWritable,subscriptions,approximateLastUsed","startAt":0,"total":2,"values":[{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","editPermissions":[],"expand":"description,owner,jql,searchUrl,viewUrl,favourite,favouritedCount,sharePermissions,editPermissions,isWritable,approximateLastUsed,subscriptions","favourite":false,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":[],"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"},{"approximateLastUsed":null,"description":"Issues assigned to me","editPermissions":[{"id":10010,"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10002","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10002","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10002","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10002"},"deleted":true,"deletedBy":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"deletedDate":"2022-11-11T13:35:29.000+0000","id":"10002","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"MKY","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"retentionTillDate":"2023-01-10T13:35:29.000+0000","self":"https://your-domain.atlassian.net/rest/api/3/project/MKY","simplified":false,"style":"classic"},"role":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"type":"project"},{"group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":10010,"type":"group"}],"expand":"description,owner,jql,searchUrl,viewUrl,favourite,favouritedCount,sharePermissions,editPermissions,isWritable,approximateLastUsed,subscriptions","favourite":true,"favouritedCount":123,"id":"10010","jql":"assignee = currentUser() and resolution is empty","name":"My issues","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=assignee+in+%28currentUser%28%29%29+and+resolution+is+empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10010","sharePermissions":[{"id":10000,"type":"global"},{"id":10010,"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"type":"project"}],"subscriptions":[{"id":1,"user":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}}],"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10010"}]}',
        );
    }

    public function testGetFilter(): void
    {
        $id = 1234;
        $expand = null;
        $overrideSharePermissions = false;

        $this->assertCall(
            method: 'getFilter',
            call: [
                'uri' => '/rest/api/3/filter/{id}',
                'method' => 'get',
                'query' => compact('expand', 'overrideSharePermissions'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Filter::class,
            ],
            arguments: [
                $id,
                $expand,
                $overrideSharePermissions,
            ],
            response: '{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"}',
        );
    }

    public function testUpdateFilter(): void
    {
        $request = new Schema\Filter(
            description: 'Lists all open bugs',
            jql: 'type = Bug and resolution is empty',
            name: 'All Open Bugs',
        );

        $id = 1234;
        $expand = null;
        $overrideSharePermissions = false;

        $this->assertCall(
            method: 'updateFilter',
            call: [
                'uri' => '/rest/api/3/filter/{id}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('expand', 'overrideSharePermissions'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Filter::class,
            ],
            arguments: [
                $request,
                $id,
                $expand,
                $overrideSharePermissions,
            ],
            response: '{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"}',
        );
    }

    public function testDeleteFilter(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteFilter',
            call: [
                'uri' => '/rest/api/3/filter/{id}',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testGetColumns(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getColumns',
            call: [
                'uri' => '/rest/api/3/filter/{id}/columns',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => [Schema\ColumnItem::class],
            ],
            arguments: [
                $id,
            ],
            response: '[{"label":"Key","value":"issuekey"},{"label":"Summary","value":"summary"}]',
        );
    }

    public function testSetColumns(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setColumns',
            call: [
                'uri' => '/rest/api/3/filter/{id}/columns',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testResetColumns(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'resetColumns',
            call: [
                'uri' => '/rest/api/3/filter/{id}/columns',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testSetFavouriteForFilter(): void
    {
        $id = 1234;
        $expand = null;

        $this->assertCall(
            method: 'setFavouriteForFilter',
            call: [
                'uri' => '/rest/api/3/filter/{id}/favourite',
                'method' => 'put',
                'query' => compact('expand'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Filter::class,
            ],
            arguments: [
                $id,
                $expand,
            ],
            response: '{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"}',
        );
    }

    public function testDeleteFavouriteForFilter(): void
    {
        $id = 1234;
        $expand = null;

        $this->assertCall(
            method: 'deleteFavouriteForFilter',
            call: [
                'uri' => '/rest/api/3/filter/{id}/favourite',
                'method' => 'delete',
                'query' => compact('expand'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Filter::class,
            ],
            arguments: [
                $id,
                $expand,
            ],
            response: '{"approximateLastUsed":"2023-03-01T13:15:00.000+0000","description":"Lists all open bugs","favourite":true,"favouritedCount":0,"id":"10000","jql":"type = Bug and resolution is empty","name":"All Open Bugs","owner":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"searchUrl":"https://your-domain.atlassian.net/rest/api/3/search?jql=type%20%3D%20Bug%20and%20resolutino%20is%20empty","self":"https://your-domain.atlassian.net/rest/api/3/filter/10000","sharePermissions":[],"subscriptions":{"end-index":0,"items":[],"max-results":0,"size":0,"start-index":0},"viewUrl":"https://your-domain.atlassian.net/issues/?filter=10000"}',
        );
    }

    public function testChangeFilterOwner(): void
    {
        $request = new Schema\ChangeFilterOwner(
            accountId: '0000-0000-0000-0000',
        );

        $id = 1234;

        $this->assertCall(
            method: 'changeFilterOwner',
            call: [
                'uri' => '/rest/api/3/filter/{id}/owner',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }
}
