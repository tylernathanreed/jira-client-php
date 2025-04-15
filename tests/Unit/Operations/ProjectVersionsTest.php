<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectVersionsTest extends OperationsTestCase
{
    public function testGetProjectVersionsPaginated(): void
    {
        $projectIdOrKey = 'foo';
        $startAt = 0;
        $maxResults = 50;
        $orderBy = null;
        $query = null;
        $status = null;
        $expand = null;

        $this->assertCall(
            method: 'getProjectVersionsPaginated',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/version',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'orderBy', 'query', 'status', 'expand'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\PageBeanVersion::class,
            ],
            arguments: [
                $projectIdOrKey,
                $startAt,
                $maxResults,
                $orderBy,
                $query,
                $status,
                $expand,
            ],
            response: '{"isLast":false,"maxResults":2,"nextPage":"https://your-domain.atlassian.net/rest/api/3/project/PR/version?startAt=2&maxResults=2","self":"https://your-domain.atlassian.net/rest/api/3/project/PR/version?startAt=0&maxResults=2","startAt":0,"total":7,"values":[{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","overdue":true,"projectId":10000,"releaseDate":"2010-07-06","released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","userReleaseDate":"6/Jul/2010"},{"archived":false,"description":"Minor Bugfix version","id":"10010","issuesStatusForFixVersion":{"done":100,"inProgress":20,"toDo":10,"unmapped":0},"name":"Next Version","overdue":false,"projectId":10000,"released":false,"self":"https://your-domain.atlassian.net/rest/api/3/version/10010"}]}',
        );
    }

    public function testGetProjectVersions(): void
    {
        $projectIdOrKey = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'getProjectVersions',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/versions',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => [Schema\Version::class],
            ],
            arguments: [
                $projectIdOrKey,
                $expand,
            ],
            response: '[{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","overdue":true,"projectId":10000,"releaseDate":1278385482288,"releaseDateSet":true,"released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","startDateSet":false,"userReleaseDate":"6/Jul/2010"},{"archived":false,"description":"Minor Bugfix version","id":"10010","issuesStatusForFixVersion":{"done":100,"inProgress":20,"toDo":10,"unmapped":0},"name":"Next Version","overdue":false,"projectId":10000,"releaseDateSet":false,"released":false,"self":"https://your-domain.atlassian.net/rest/api/3/version/10010","startDateSet":false}]',
        );
    }

    public function testCreateVersion(): void
    {
        $request = $this->deserialize(Schema\Version::class, [
            'archived' => false,
            'description' => 'An excellent version',
            'name' => 'New Version 1',
            'projectId' => '10000',
            'releaseDate' => '2010-07-06',
            'released' => true,
        ]);

        $this->assertCall(
            method: 'createVersion',
            call: [
                'uri' => '/rest/api/3/version',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\Version::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","project":"PXA","projectId":10000,"releaseDate":"2010-07-06","released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","userReleaseDate":"6/Jul/2010"}',
        );
    }

    public function testGetVersion(): void
    {
        $id = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'getVersion',
            call: [
                'uri' => '/rest/api/3/version/{id}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Version::class,
            ],
            arguments: [
                $id,
                $expand,
            ],
            response: '{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","overdue":true,"projectId":10000,"releaseDate":"2010-07-06","released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","userReleaseDate":"6/Jul/2010"}',
        );
    }

    public function testUpdateVersion(): void
    {
        $request = $this->deserialize(Schema\Version::class, [
            'archived' => false,
            'description' => 'An excellent version',
            'id' => '10000',
            'name' => 'New Version 1',
            'overdue' => true,
            'projectId' => '10000',
            'releaseDate' => '2010-07-06',
            'released' => true,
            'self' => 'https://your-domain.atlassian.net/rest/api/~ver~/version/10000',
            'userReleaseDate' => '6/Jul/2010',
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'updateVersion',
            call: [
                'uri' => '/rest/api/3/version/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Version::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","project":"PXA","projectId":10000,"releaseDate":"2010-07-06","released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","userReleaseDate":"6/Jul/2010"}',
        );
    }

    public function testDeleteVersion(): void
    {
        $id = 'foo';
        $moveFixIssuesTo = null;
        $moveAffectedIssuesTo = null;

        $this->assertCall(
            method: 'deleteVersion',
            call: [
                'uri' => '/rest/api/3/version/{id}',
                'method' => 'delete',
                'query' => compact('moveFixIssuesTo', 'moveAffectedIssuesTo'),
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
                $moveFixIssuesTo,
                $moveAffectedIssuesTo,
            ],
            response: null,
        );
    }

    public function testMergeVersions(): void
    {
        $id = 'foo';
        $moveIssuesTo = 'foo';

        $this->assertCall(
            method: 'mergeVersions',
            call: [
                'uri' => '/rest/api/3/version/{id}/mergeto/{moveIssuesTo}',
                'method' => 'put',
                'path' => compact('id', 'moveIssuesTo'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
                $moveIssuesTo,
            ],
            response: null,
        );
    }

    public function testMoveVersion(): void
    {
        $request = $this->deserialize(Schema\VersionMoveBean::class, [
            'after' => 'https://your-domain.atlassian.net/rest/api/~ver~/version/10000',
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'moveVersion',
            call: [
                'uri' => '/rest/api/3/version/{id}/move',
                'method' => 'post',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Version::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"archived":false,"description":"An excellent version","id":"10000","name":"New Version 1","overdue":true,"projectId":10000,"releaseDate":"2010-07-06","released":true,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000","userReleaseDate":"6/Jul/2010"}',
        );
    }

    public function testGetVersionRelatedIssues(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getVersionRelatedIssues',
            call: [
                'uri' => '/rest/api/3/version/{id}/relatedIssueCounts',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\VersionIssueCounts::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"customFieldUsage":[{"customFieldId":10000,"fieldName":"Field1","issueCountWithVersionInCustomField":2},{"customFieldId":10010,"fieldName":"Field2","issueCountWithVersionInCustomField":3}],"issueCountWithCustomFieldsShowingVersion":54,"issuesAffectedCount":101,"issuesFixedCount":23,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000"}',
        );
    }

    public function testGetRelatedWork(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getRelatedWork',
            call: [
                'uri' => '/rest/api/3/version/{id}/relatedwork',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => [Schema\VersionRelatedWork::class],
            ],
            arguments: [
                $id,
            ],
            response: '[{"category":"Design","issueId":10001,"relatedWorkId":"fabcdef6-7878-1234-beaf-43211234abcd","title":"Design link","url":"https://www.atlassian.com"},{"category":"Communications","relatedWorkId":"fabcdef6-7878-1234-beaf-43211234abce","title":"Chat application","url":"https://www.atlassian.com"},{"category":"External Link","issueId":10003,"relatedWorkId":"fabcdef6-7878-1234-beaf-43211234abcf","url":"https://www.atlassian.com"}]',
        );
    }

    public function testUpdateRelatedWork(): void
    {
        $request = $this->deserialize(Schema\VersionRelatedWork::class, [
            'category' => 'Design',
            'relatedWorkId' => 'fabcdef6-7878-1234-beaf-43211234abcd',
            'title' => 'Design link',
            'url' => 'https://www.atlassian.com',
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'updateRelatedWork',
            call: [
                'uri' => '/rest/api/3/version/{id}/relatedwork',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\VersionRelatedWork::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"category":"Design","relatedWorkId":"fabcdef6-7878-1234-beaf-43211234abcd","title":"Design link","url":"https://www.atlassian.com"}',
        );
    }

    public function testCreateRelatedWork(): void
    {
        $request = $this->deserialize(Schema\VersionRelatedWork::class, [
            'category' => 'Design',
            'title' => 'Design link',
            'url' => 'https://www.atlassian.com',
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'createRelatedWork',
            call: [
                'uri' => '/rest/api/3/version/{id}/relatedwork',
                'method' => 'post',
                'body' => $request,
                'path' => compact('id'),
                'success' => 201,
                'schema' => Schema\VersionRelatedWork::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"category":"Design","relatedWorkId":"fabcdef6-7878-1234-beaf-43211234abcd","title":"Design link","url":"https://www.atlassian.com"}',
        );
    }

    public function testDeleteAndReplaceVersion(): void
    {
        $this->markTestIncomplete(
            'Missing body example.'
        );

        $id = 'foo';

        $this->assertCall(
            method: 'deleteAndReplaceVersion',
            call: [
                'uri' => '/rest/api/3/version/{id}/removeAndSwap',
                'method' => 'post',
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

    public function testGetVersionUnresolvedIssues(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getVersionUnresolvedIssues',
            call: [
                'uri' => '/rest/api/3/version/{id}/unresolvedIssueCount',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\VersionUnresolvedIssuesCount::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"issuesCount":30,"issuesUnresolvedCount":23,"self":"https://your-domain.atlassian.net/rest/api/3/version/10000"}',
        );
    }

    public function testDeleteRelatedWork(): void
    {
        $versionId = 'foo';
        $relatedWorkId = 'foo';

        $this->assertCall(
            method: 'deleteRelatedWork',
            call: [
                'uri' => '/rest/api/3/version/{versionId}/relatedwork/{relatedWorkId}',
                'method' => 'delete',
                'path' => compact('versionId', 'relatedWorkId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $versionId,
                $relatedWorkId,
            ],
            response: null,
        );
    }
}
