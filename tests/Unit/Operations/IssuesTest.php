<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssuesTest extends OperationsTestCase
{
    public function testGetBulkChangelogs(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $this->assertCall(
            method: 'getBulkChangelogs',
            call: [
                'uri' => '/rest/api/3/changelog/bulkfetch',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\BulkChangelogResponseBean::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issueChangeLogs":[{"changeHistories":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":1492070429,"id":"10001","items":[{"field":"fields","fieldId":"fieldId","fieldtype":"jira","fromString":"old summary","toString":"new summary"}]},{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":1492071429,"id":"10002","items":[{"field":"fields","fieldId":"fieldId","fieldtype":"jira","fromString":"old summary 2","toString":"new summary 2"}]}],"issueId":"10100"}],"nextPageToken":"UxAQBFRF"}',
        );
    }

    public function testGetEvents(): void
    {
        $this->assertCall(
            method: 'getEvents',
            call: [
                'uri' => '/rest/api/3/events',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\IssueEvent::class],
            ],
            arguments: [],
            response: '[{"id":1,"name":"Issue Created"},{"id":2,"name":"Issue Updated"}]',
        );
    }

    public function testCreateIssue(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createIssue',
            call: [
                'uri' => '/rest/api/3/issue',
                'method' => 'post',
                'body' => $request,
                'query' => compact('updateHistory'),
                'success' => 201,
                'schema' => Schema\CreatedIssue::class,
            ],
            arguments: [
                $request,
                $updateHistory,
            ],
            response: '{"id":"10000","key":"ED-24","self":"https://your-domain.atlassian.net/rest/api/3/issue/10000","transition":{"status":200,"errorCollection":{"errorMessages":[],"errors":{}}}}',
        );
    }

    public function testArchiveIssues(): void
    {
        $request = $this->deserialize(Schema\IssueArchivalSyncRequest::class, [
            'issueIdsOrKeys' => [
                'PR-1',
                '1001',
                'PROJECT-2',
            ],
        ]);

        $this->assertCall(
            method: 'archiveIssues',
            call: [
                'uri' => '/rest/api/3/issue/archive',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\IssueArchivalSyncResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"errors":{"issueIsSubtask":{"count":3,"issueIdsOrKeys":["ST-1","ST-2","ST-3"],"message":"Issue is subtask."},"issuesInArchivedProjects":{"count":2,"issueIdsOrKeys":["AR-1","AR-2"],"message":"Issue exists in archived project."},"issuesInUnlicensedProjects":{"count":3,"issueIdsOrKeys":["UL-1","UL-2","UL-3"],"message":"Issues with these IDs are in unlicensed projects."},"issuesNotFound":{"count":3,"issueIdsOrKeys":["PR-1","PR-2","PR-3"],"message":"Issue not found."}},"numberOfIssuesUpdated":10}',
        );
    }

    public function testArchiveIssuesAsync(): void
    {
        $request = $this->deserialize(Schema\ArchiveIssueAsyncRequest::class, [
            'jql' => 'project = FOO AND updated < -2y',
        ]);

        $this->assertCall(
            method: 'archiveIssuesAsync',
            call: [
                'uri' => '/rest/api/3/issue/archive',
                'method' => 'post',
                'body' => $request,
                'success' => 202,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: '"https://your-domain.atlassian.net/rest/api/3/task/1010"',
        );
    }

    public function testCreateIssues(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createIssues',
            call: [
                'uri' => '/rest/api/3/issue/bulk',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\CreatedIssues::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issues":[{"id":"10000","key":"ED-24","self":"https://your-domain.atlassian.net/rest/api/3/issue/10000","transition":{"status":200,"errorCollection":{"errorMessages":[],"errors":{}}}},{"id":"10001","key":"ED-25","self":"https://your-domain.atlassian.net/rest/api/3/issue/10001"}],"errors":[]}',
        );
    }

    public function testBulkFetchIssues(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'bulkFetchIssues',
            call: [
                'uri' => '/rest/api/3/issue/bulkfetch',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\BulkIssueResults::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"expand":"schema,names","issueErrors":[],"issues":[{"expand":"","fields":{"summary":"My first example issue","project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"assignee":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}},"id":"10002","key":"EX-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"},{"expand":"","fields":{"summary":"My second example issue","project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10001","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10001","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10001","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10001"},"id":"10001","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"ABC","name":"Alphabetical","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/ABC","simplified":false,"style":"classic"},"assignee":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}},"id":"10005","key":"EX-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/10003"},{"expand":"","fields":{"summary":"My fourth example issue","project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10002","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10002","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10002","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10002"},"deleted":true,"deletedBy":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"deletedDate":"2022-11-11T13:35:29.000+0000","id":"10002","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"MKY","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"retentionTillDate":"2023-01-10T13:35:29.000+0000","self":"https://your-domain.atlassian.net/rest/api/3/project/MKY","simplified":false,"style":"classic"},"assignee":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}},"id":"10005","key":"EX-4","self":"https://your-domain.atlassian.net/rest/api/3/issue/10005"}]}',
        );
    }

    public function testGetCreateIssueMeta(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getCreateIssueMeta',
            call: [
                'uri' => '/rest/api/3/issue/createmeta',
                'method' => 'get',
                'query' => compact('projectIds', 'projectKeys', 'issuetypeIds', 'issuetypeNames', 'expand'),
                'success' => 200,
                'schema' => Schema\IssueCreateMetadata::class,
            ],
            arguments: [
                $projectIds,
                $projectKeys,
                $issuetypeIds,
                $issuetypeNames,
                $expand,
            ],
            response: '{"projects":[{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000&avatarId=10011","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000&avatarId=10011","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000&avatarId=10011","48x48":"https://your-domain.atlassian.net/secure/projectavatar?pid=10000&avatarId=10011"},"id":"10000","issuetypes":[{"description":"An error in the code","fields":{"issuetype":{"allowedValues":["set"],"autoCompleteUrl":"issuetype","hasDefaultValue":false,"key":"issuetype","name":"Issue Type","required":true}},"iconUrl":"https://your-domain.atlassian.net/images/icons/issuetypes/bug.png","id":"1","name":"Bug","self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}],"key":"ED","name":"Edison Project","self":"https://your-domain.atlassian.net/rest/api/3/project/ED"}]}',
        );
    }

    public function testGetCreateIssueMetaIssueTypes(): void
    {
        $projectIdOrKey = 'foo';
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getCreateIssueMetaIssueTypes',
            call: [
                'uri' => '/rest/api/3/issue/createmeta/{projectIdOrKey}/issuetypes',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageOfCreateMetaIssueTypes::class,
            ],
            arguments: [
                $projectIdOrKey,
                $startAt,
                $maxResults,
            ],
            response: '{"issueTypes":[{"description":"An error in the code","iconUrl":"https://your-domain.atlassian.net/images/icons/issuetypes/bug.png","id":"1","name":"Bug","self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}],"maxResults":1,"startAt":0,"total":1}',
        );
    }

    public function testGetCreateIssueMetaIssueTypeId(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getCreateIssueMetaIssueTypeId',
            call: [
                'uri' => '/rest/api/3/issue/createmeta/{projectIdOrKey}/issuetypes/{issueTypeId}',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('projectIdOrKey', 'issueTypeId'),
                'success' => 200,
                'schema' => Schema\PageOfCreateMetaIssueTypeWithField::class,
            ],
            arguments: [
                $projectIdOrKey,
                $issueTypeId,
                $startAt,
                $maxResults,
            ],
            response: '{"fields":[{"fieldId":"assignee","hasDefaultValue":false,"key":"assignee","name":"Assignee","operations":["set"],"required":true}],"maxResults":1,"startAt":0,"total":1}',
        );
    }

    public function testGetIssueLimitReport(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIssueLimitReport',
            call: [
                'uri' => '/rest/api/3/issue/limit/report',
                'method' => 'get',
                'query' => compact('isReturningKeys'),
                'success' => 200,
                'schema' => Schema\IssueLimitReportResponseBean::class,
            ],
            arguments: [
                $isReturningKeys,
            ],
            response: '{"issuesApproachingLimit":{"attachment":{"15070L":1822,"15111L":1999},"comment":{"10000L":4997,"15073L":4999,"15110L":5000},"remoteIssueLinks":{"15107L":2000},"worklog":{"15101L":10342}},"issuesBreachingLimit":{"attachment":{"15057L":2005,"15116L":2065,"15117L":3005},"comment":{"15055L":5202},"issuelinks":{"15058L":2120},"remoteIssueLinks":{"15059L":2094},"worklog":{"15056L":10085,"15169L":120864}},"limits":{"attachment":2000,"comment":5000,"issuelinks":2000,"remoteIssueLinks":2000,"worklog":10000}}',
        );
    }

    public function testUnarchiveIssues(): void
    {
        $request = $this->deserialize(Schema\IssueArchivalSyncRequest::class, [
            'issueIdsOrKeys' => [
                'PR-1',
                '1001',
                'PROJECT-2',
            ],
        ]);

        $this->assertCall(
            method: 'unarchiveIssues',
            call: [
                'uri' => '/rest/api/3/issue/unarchive',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\IssueArchivalSyncResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"errors":{"issueIsSubtask":{"count":3,"issueIdsOrKeys":["ST-1","ST-2","ST-3"],"message":"Issue is subtask."},"issuesInArchivedProjects":{"count":2,"issueIdsOrKeys":["AR-1","AR-2"],"message":"Issue exists in archived project."},"issuesNotFound":{"count":3,"issueIdsOrKeys":["PR-1","PR-2","PR-3"],"message":"Issue not found."}},"numberOfIssuesUpdated":10}',
        );
    }

    public function testGetIssue(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIssue',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}',
                'method' => 'get',
                'query' => compact('fields', 'fieldsByKeys', 'expand', 'properties', 'updateHistory', 'failFast'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\IssueBean::class,
            ],
            arguments: [
                $issueIdOrKey,
                $fields,
                $fieldsByKeys,
                $expand,
                $properties,
                $updateHistory,
                $failFast,
            ],
            response: '{"fields":{"watcher":{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1},"attachment":[{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10000","created":"2022-10-06T07:32:47.000+0000","filename":"picture.jpg","id":10000,"mimeType":"image/jpeg","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10000","size":23123,"thumbnail":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/thumbnail/10000"}],"sub-tasks":[{"id":"10000","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10003","key":"ED-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/ED-2"},"type":{"id":"10000","inward":"Parent","name":"","outward":"Sub-task"}}],"description":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Main order flow broken"}]}]},"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"comment":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"issuelinks":[{"id":"10001","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}},{"id":"10002","inwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}}],"worklog":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}],"updated":1,"timetracking":{"originalEstimate":"10m","originalEstimateSeconds":600,"remainingEstimate":"3m","remainingEstimateSeconds":200,"timeSpent":"6m","timeSpentSeconds":400}},"id":"10002","key":"ED-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"}',
        );
    }

    public function testEditIssue(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'editIssue',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('notifyUsers', 'overrideScreenSecurity', 'overrideEditableFlag', 'returnIssue', 'expand'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
                $notifyUsers,
                $overrideScreenSecurity,
                $overrideEditableFlag,
                $returnIssue,
                $expand,
            ],
            response: null,
        );
    }

    public function testDeleteIssue(): void
    {
        $issueIdOrKey = 'foo';
        $deleteSubtasks = 'false';

        $this->assertCall(
            method: 'deleteIssue',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}',
                'method' => 'delete',
                'query' => compact('deleteSubtasks'),
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueIdOrKey,
                $deleteSubtasks,
            ],
            response: null,
        );
    }

    public function testAssignIssue(): void
    {
        $request = $this->deserialize(Schema\User::class, [
            'accountId' => '5b10ac8d82e05b22cc7d4ef5',
        ]);

        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'assignIssue',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/assignee',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
            ],
            response: null,
        );
    }

    public function testGetChangeLogs(): void
    {
        $issueIdOrKey = 'foo';
        $startAt = 0;
        $maxResults = 100;

        $this->assertCall(
            method: 'getChangeLogs',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/changelog',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageBeanChangelog::class,
            ],
            arguments: [
                $issueIdOrKey,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":false,"maxResults":2,"nextPage":"https://your-domain.atlassian.net/rest/api/3/issue/TT-1/changelog?&startAt=4&maxResults=2","self":"https://your-domain.atlassian.net/rest/api/3/issue/TT-1/changelog?startAt=2&maxResults=2","startAt":2,"total":5,"values":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":"1970-01-18T06:27:50.429+0000","id":"10001","items":[{"field":"fields","fieldtype":"jira","fieldId":"fieldId","from":null,"fromString":"","to":null,"toString":"label-1"}]},{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":"1970-01-18T06:27:51.429+0000","id":"10002","items":[{"field":"fields","fieldtype":"jira","fieldId":"fieldId","from":null,"fromString":"label-1","to":null,"toString":"label-1 label-2"}]}]}',
        );
    }

    public function testGetChangeLogsByIds(): void
    {
        $request = $this->deserialize(Schema\IssueChangelogIds::class, [
            'changelogIds' => [
                '10001',
                '10002',
            ],
        ]);

        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'getChangeLogsByIds',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/changelog/list',
                'method' => 'post',
                'body' => $request,
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageOfChangelogs::class,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
            ],
            response: '{"histories":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":"1970-01-18T06:27:50.429+0000","id":"10001","items":[{"field":"fields","fieldtype":"jira","fieldId":"fieldId","from":null,"fromString":"","to":null,"toString":"label-1"}]},{"author":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"created":"1970-01-18T06:27:51.429+0000","id":"10002","items":[{"field":"fields","fieldtype":"jira","fieldId":"fieldId","from":null,"fromString":"label-1","to":null,"toString":"label-1 label-2"}]}],"maxResults":2,"startAt":0,"total":2}',
        );
    }

    public function testGetEditIssueMeta(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getEditIssueMeta',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/editmeta',
                'method' => 'get',
                'query' => compact('overrideScreenSecurity', 'overrideEditableFlag'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\IssueUpdateMetadata::class,
            ],
            arguments: [
                $issueIdOrKey,
                $overrideScreenSecurity,
                $overrideEditableFlag,
            ],
            response: '{"fields":{"summary":{"allowedValues":["red","blue"],"defaultValue":"red","hasDefaultValue":false,"key":"field_key","name":"My Multi Select","operations":["set","add"],"required":false,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiselect","customId":10001,"items":"option","type":"array"}}}}',
        );
    }

    public function testNotify(): void
    {
        $request = $this->deserialize(Schema\Notification::class, [
            'htmlBody' => 'The <strong>latest</strong> test results for this ticket are now available.',
            'restrict' => [
                'groupIds' => [
                ],
                'groups' => [
                    0 => [
                        'name' => 'notification-group',
                    ],
                ],
                'permissions' => [
                    0 => [
                        'key' => 'BROWSE',
                    ],
                ],
            ],
            'subject' => 'Latest test results',
            'textBody' => 'The latest test results for this ticket are now available.',
            'to' => [
                'assignee' => '',
                'groupIds' => [
                ],
                'groups' => [
                    0 => [
                        'name' => 'notification-group',
                    ],
                ],
                'reporter' => '',
                'users' => [
                    0 => [
                        'accountId' => '5b10a2844c20165700ede21g',
                        'active' => '',
                    ],
                ],
                'voters' => '1',
                'watchers' => '1',
            ],
        ]);

        $issueIdOrKey = 'foo';

        $this->assertCall(
            method: 'notify',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/notify',
                'method' => 'post',
                'body' => $request,
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
            ],
            response: null,
        );
    }

    public function testGetTransitions(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getTransitions',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/transitions',
                'method' => 'get',
                'query' => compact('expand', 'transitionId', 'skipRemoteOnlyCondition', 'includeUnavailableTransitions', 'sortByOpsBarAndStatus'),
                'path' => compact('issueIdOrKey'),
                'success' => 200,
                'schema' => Schema\Transitions::class,
            ],
            arguments: [
                $issueIdOrKey,
                $expand,
                $transitionId,
                $skipRemoteOnlyCondition,
                $includeUnavailableTransitions,
                $sortByOpsBarAndStatus,
            ],
            response: '{"transitions":[{"fields":{"summary":{"allowedValues":["red","blue"],"defaultValue":"red","hasDefaultValue":false,"key":"field_key","name":"My Multi Select","operations":["set","add"],"required":false,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiselect","customId":10001,"items":"option","type":"array"}}},"hasScreen":false,"id":"2","isAvailable":true,"isConditional":false,"isGlobal":false,"isInitial":false,"name":"Close Issue","to":{"description":"The issue is currently being worked on.","iconUrl":"https://your-domain.atlassian.net/images/icons/progress.gif","id":"10000","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/status/10000","statusCategory":{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"}}},{"fields":{"summary":{"allowedValues":["red","blue"],"defaultValue":"red","hasDefaultValue":false,"key":"field_key","name":"My Multi Select","operations":["set","add"],"required":false,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiselect","customId":10001,"items":"option","type":"array"}},"colour":{"allowedValues":["red","blue"],"defaultValue":"red","hasDefaultValue":false,"key":"field_key","name":"My Multi Select","operations":["set","add"],"required":false,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiselect","customId":10001,"items":"option","type":"array"}}},"hasScreen":true,"id":"711","name":"QA Review","to":{"description":"The issue is closed.","iconUrl":"https://your-domain.atlassian.net/images/icons/closed.gif","id":"5","name":"Closed","self":"https://your-domain.atlassian.net/rest/api/3/status/5","statusCategory":{"colorName":"green","id":9,"key":"completed","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/9"}}}]}',
        );
    }

    public function testDoTransition(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'doTransition',
            call: [
                'uri' => '/rest/api/3/issue/{issueIdOrKey}/transitions',
                'method' => 'post',
                'body' => $request,
                'path' => compact('issueIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $issueIdOrKey,
            ],
            response: null,
        );
    }

    public function testExportArchivedIssues(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'exportArchivedIssues',
            call: [
                'uri' => '/rest/api/3/issues/archive/export',
                'method' => 'put',
                'body' => $request,
                'success' => 202,
                'schema' => Schema\ExportArchivedIssuesTaskProgressResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"payload":"{projects=[FOO, BAR], reporters=[uuid-rep-001, uuid-rep-002], issueTypes=[10001, 10002], archivedDate={dateAfterInstant=2023-01-01, dateBeforeInstant=2023-01-12}, archivedBy=[uuid-rep-001, uuid-rep-002]}","progress":0,"status":"ENQUEUED","submittedTime":1623230887000,"taskId":"10990"}',
        );
    }
}
