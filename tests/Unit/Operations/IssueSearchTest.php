<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueSearchTest extends OperationsTestCase
{
    public function testGetIssuePickerResource(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getIssuePickerResource',
            call: [
                'uri' => '/rest/api/3/issue/picker',
                'method' => 'get',
                'query' => compact('query', 'currentJQL', 'currentIssueKey', 'currentProjectId', 'showSubTasks', 'showSubTaskParent'),
                'success' => 200,
                'schema' => Schema\IssuePickerSuggestions::class,
            ],
            arguments: [
                $query,
                $currentJQL,
                $currentIssueKey,
                $currentProjectId,
                $showSubTasks,
                $showSubTaskParent,
            ],
            response: null,
        );
    }

    public function testMatchIssues(): void
    {
        $request = $this->deserialize(Schema\IssuesAndJQLQueries::class, [
            'issueIds' => [
                '10001',
                '1000',
                '10042',
            ],
            'jqls' => [
                'project = FOO',
                'issuetype = Bug',
                'summary ~ "some text" AND project in (FOO, BAR]',
            ],
        ]);

        $this->assertCall(
            method: 'matchIssues',
            call: [
                'uri' => '/rest/api/3/jql/match',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\IssueMatches::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"matches":[{"matchedIssues":[10000,10004],"errors":[]},{"matchedIssues":[100134,10025,10236],"errors":[]},{"matchedIssues":[],"errors":[]},{"matchedIssues":[],"errors":["Invalid JQL: broken = value"]}]}',
        );
    }

    public function testSearchForIssuesUsingJql(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'searchForIssuesUsingJql',
            call: [
                'uri' => '/rest/api/3/search',
                'method' => 'get',
                'query' => compact('jql', 'startAt', 'maxResults', 'validateQuery', 'fields', 'expand', 'properties', 'fieldsByKeys', 'failFast'),
                'success' => 200,
                'schema' => Schema\SearchResults::class,
            ],
            arguments: [
                $jql,
                $startAt,
                $maxResults,
                $validateQuery,
                $fields,
                $expand,
                $properties,
                $fieldsByKeys,
                $failFast,
            ],
            response: '{"expand":"names,schema","issues":[{"expand":"","fields":{"watcher":{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1},"attachment":[{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10000","created":"2022-10-06T07:32:47.000+0000","filename":"picture.jpg","id":10000,"mimeType":"image/jpeg","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10000","size":23123,"thumbnail":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/thumbnail/10000"}],"sub-tasks":[{"id":"10000","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10003","key":"ED-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/ED-2"},"type":{"id":"10000","inward":"Parent","name":"","outward":"Sub-task"}}],"description":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Main order flow broken"}]}]},"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"comment":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"issuelinks":[{"id":"10001","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}},{"id":"10002","inwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}}],"worklog":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}],"updated":1,"timetracking":{"originalEstimate":"10m","originalEstimateSeconds":600,"remainingEstimate":"3m","remainingEstimateSeconds":200,"timeSpent":"6m","timeSpentSeconds":400}},"id":"10002","key":"ED-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"}],"maxResults":50,"startAt":0,"total":1,"warningMessages":["The value \'bar\' does not exist for the field \'foo\'."]}',
        );
    }

    public function testSearchForIssuesUsingJqlPost(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'searchForIssuesUsingJqlPost',
            call: [
                'uri' => '/rest/api/3/search',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\SearchResults::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"expand":"names,schema","issues":[{"expand":"","fields":{"watcher":{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1},"attachment":[{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10000","created":"2022-10-06T07:32:47.000+0000","filename":"picture.jpg","id":10000,"mimeType":"image/jpeg","self":"https://your-domain.atlassian.net/rest/api/3/attachments/10000","size":23123,"thumbnail":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/thumbnail/10000"}],"sub-tasks":[{"id":"10000","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10003","key":"ED-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/ED-2"},"type":{"id":"10000","inward":"Parent","name":"","outward":"Sub-task"}}],"description":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Main order flow broken"}]}]},"project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"comment":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper."}]}]},"created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"issuelinks":[{"id":"10001","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}},{"id":"10002","inwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}}],"worklog":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":{"type":"doc","version":1,"content":[{"type":"paragraph","content":[{"type":"text","text":"I did some work here."}]}]},"id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}],"updated":1,"timetracking":{"originalEstimate":"10m","originalEstimateSeconds":600,"remainingEstimate":"3m","remainingEstimateSeconds":200,"timeSpent":"6m","timeSpentSeconds":400}},"id":"10002","key":"ED-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"}],"maxResults":50,"startAt":0,"total":1,"warningMessages":["The value \'bar\' does not exist for the field \'foo\'."]}',
        );
    }

    public function testCountIssues(): void
    {
        $request = $this->deserialize(Schema\JQLCountRequestBean::class, [
            'jql' => 'project = HSP',
        ]);

        $this->assertCall(
            method: 'countIssues',
            call: [
                'uri' => '/rest/api/3/search/approximate-count',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\JQLCountResultsBean::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"count":153}',
        );
    }

    public function testSearchForIssuesIds(): void
    {
        $request = $this->deserialize(Schema\IdSearchRequestBean::class, [
            'jql' => 'project = HSP',
            'maxResults' => '1000',
            'nextPageToken' => 'EgQIlMIC',
        ]);

        $this->assertCall(
            method: 'searchForIssuesIds',
            call: [
                'uri' => '/rest/api/3/search/id',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\IdSearchResults::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issueIds":[10000,10001,10002],"nextPageToken":"EgQIlMIC"}',
        );
    }

    public function testSearchAndReconsileIssuesUsingJql(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'searchAndReconsileIssuesUsingJql',
            call: [
                'uri' => '/rest/api/3/search/jql',
                'method' => 'get',
                'query' => compact('jql', 'nextPageToken', 'maxResults', 'fields', 'expand', 'properties', 'fieldsByKeys', 'failFast', 'reconcileIssues'),
                'success' => 200,
                'schema' => Schema\SearchAndReconcileResults::class,
            ],
            arguments: [
                $jql,
                $nextPageToken,
                $maxResults,
                $fields,
                $expand,
                $properties,
                $fieldsByKeys,
                $failFast,
                $reconcileIssues,
            ],
            response: '{"issues":[{"expand":"","fields":{"watcher":{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1},"attachment":[{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10001","created":"2023-06-24T19:24:50.000+0000","filename":"debuglog.txt","id":10001,"mimeType":"text/plain","self":"https://your-domain.atlassian.net/rest/api/2/attachments/10001","size":2460}],"sub-tasks":[{"id":"10000","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10003","key":"ED-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/ED-2"},"type":{"id":"10000","inward":"Parent","name":"","outward":"Sub-task"}}],"description":"Main order flow broken","project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"comment":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper.","created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"issuelinks":[{"id":"10001","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}},{"id":"10002","inwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}}],"worklog":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":"I did some work here.","id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}],"updated":1,"timetracking":{"originalEstimate":"10m","originalEstimateSeconds":600,"remainingEstimate":"3m","remainingEstimateSeconds":200,"timeSpent":"6m","timeSpentSeconds":400}},"id":"10002","key":"ED-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"}]}',
        );
    }

    public function testSearchAndReconsileIssuesUsingJqlPost(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $this->assertCall(
            method: 'searchAndReconsileIssuesUsingJqlPost',
            call: [
                'uri' => '/rest/api/3/search/jql',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\SearchAndReconcileResults::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"issues":[{"expand":"","fields":{"watcher":{"isWatching":false,"self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-1/watchers","watchCount":1},"attachment":[{"author":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"content":"https://your-domain.atlassian.net/jira/rest/api/3/attachment/content/10001","created":"2023-06-24T19:24:50.000+0000","filename":"debuglog.txt","id":10001,"mimeType":"text/plain","self":"https://your-domain.atlassian.net/rest/api/2/attachments/10001","size":2460}],"sub-tasks":[{"id":"10000","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10003","key":"ED-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/ED-2"},"type":{"id":"10000","inward":"Parent","name":"","outward":"Sub-task"}}],"description":"Main order flow broken","project":{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},"comment":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"body":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget venenatis elit. Duis eu justo eget augue iaculis fermentum. Sed semper quam laoreet nisi egestas at posuere augue semper.","created":"2021-01-17T12:34:00.000+0000","id":"10000","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/comment/10000","updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"Administrators","type":"role","value":"Administrators"}}],"issuelinks":[{"id":"10001","outwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004L","key":"PR-2","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-2"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}},{"id":"10002","inwardIssue":{"fields":{"status":{"iconUrl":"https://your-domain.atlassian.net/images/icons/statuses/open.png","name":"Open"}},"id":"10004","key":"PR-3","self":"https://your-domain.atlassian.net/rest/api/3/issue/PR-3"},"type":{"id":"10000","inward":"depends on","name":"Dependent","outward":"is depended by"}}],"worklog":[{"author":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"comment":"I did some work here.","id":"100028","issueId":"10002","self":"https://your-domain.atlassian.net/rest/api/3/issue/10010/worklog/10000","started":"2021-01-17T12:34:00.000+0000","timeSpent":"3h 20m","timeSpentSeconds":12000,"updateAuthor":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"updated":"2021-01-18T23:45:00.000+0000","visibility":{"identifier":"276f955c-63d7-42c8-9520-92d01dca0625","type":"group","value":"jira-developers"}}],"updated":1,"timetracking":{"originalEstimate":"10m","originalEstimateSeconds":600,"remainingEstimate":"3m","remainingEstimateSeconds":200,"timeSpent":"6m","timeSpentSeconds":400}},"id":"10002","key":"ED-1","self":"https://your-domain.atlassian.net/rest/api/3/issue/10002"}]}',
        );
    }
}
