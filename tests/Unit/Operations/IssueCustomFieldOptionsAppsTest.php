<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldOptionsAppsTest extends OperationsTestCase
{
    public function testGetAllIssueFieldOptions(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getAllIssueFieldOptions',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('fieldKey'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueFieldOption::class,
            ],
            arguments: [
                $fieldKey,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":false,"maxResults":1,"nextPage":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option?startAt=1&maxResults=1","self":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option?startAt=0&maxResults=1","startAt":0,"total":10,"values":[{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"},"config":{"scope":{"projects":[],"projects2":[{"id":1001,"attributes":["notSelectable"]},{"id":1002,"attributes":["notSelectable"]}],"global":{}},"attributes":[]}}]}',
        );
    }

    public function testCreateIssueFieldOption(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createIssueFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option',
                'method' => 'post',
                'body' => $request,
                'path' => compact('fieldKey'),
                'success' => 200,
                'schema' => Schema\IssueFieldOption::class,
            ],
            arguments: [
                $request,
                $fieldKey,
            ],
            response: '{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"},"config":{"scope":{"projects":[],"projects2":[{"id":1001,"attributes":["notSelectable"]},{"id":1002,"attributes":["notSelectable"]}],"global":{}},"attributes":[]}}',
        );
    }

    public function testGetSelectableIssueFieldOptions(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getSelectableIssueFieldOptions',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/suggestions/edit',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'projectId'),
                'path' => compact('fieldKey'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueFieldOption::class,
            ],
            arguments: [
                $fieldKey,
                $startAt,
                $maxResults,
                $projectId,
            ],
            response: '{"isLast":false,"maxResults":1,"nextPage":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option/suggestions?startAt=1&maxResults=1","self":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option/suggestions?startAt=0&maxResults=1","startAt":0,"total":10,"values":[{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"}}]}',
        );
    }

    public function testGetVisibleIssueFieldOptions(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getVisibleIssueFieldOptions',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/suggestions/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'projectId'),
                'path' => compact('fieldKey'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueFieldOption::class,
            ],
            arguments: [
                $fieldKey,
                $startAt,
                $maxResults,
                $projectId,
            ],
            response: '{"isLast":false,"maxResults":1,"nextPage":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option/suggestions?startAt=1&maxResults=1","self":"https://your-domain.atlassian.net/rest/api/3/field/fieldKey/option/suggestions?startAt=0&maxResults=1","startAt":0,"total":10,"values":[{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"}}]}',
        );
    }

    public function testGetIssueFieldOption(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getIssueFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/{optionId}',
                'method' => 'get',
                'path' => compact('fieldKey', 'optionId'),
                'success' => 200,
                'schema' => Schema\IssueFieldOption::class,
            ],
            arguments: [
                $fieldKey,
                $optionId,
            ],
            response: '{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"},"config":{"scope":{"projects":[],"projects2":[{"id":1001,"attributes":["notSelectable"]},{"id":1002,"attributes":["notSelectable"]}],"global":{}},"attributes":[]}}',
        );
    }

    public function testUpdateIssueFieldOption(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateIssueFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/{optionId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('fieldKey', 'optionId'),
                'success' => 200,
                'schema' => Schema\IssueFieldOption::class,
            ],
            arguments: [
                $request,
                $fieldKey,
                $optionId,
            ],
            response: '{"id":1,"value":"Team 1","properties":{"leader":{"name":"Leader Name","email":"lname@example.com"},"members":42,"description":"The team\'s description","founded":"2016-06-06"},"config":{"scope":{"projects":[],"projects2":[{"id":1001,"attributes":["notSelectable"]},{"id":1002,"attributes":["notSelectable"]}],"global":{}},"attributes":[]}}',
        );
    }

    public function testDeleteIssueFieldOption(): void
    {
        $fieldKey = 'foo';
        $optionId = 1234;

        $this->assertCall(
            method: 'deleteIssueFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/{optionId}',
                'method' => 'delete',
                'path' => compact('fieldKey', 'optionId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $fieldKey,
                $optionId,
            ],
            response: null,
        );
    }

    public function testReplaceIssueFieldOption(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'replaceIssueFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldKey}/option/{optionId}/issue',
                'method' => 'delete',
                'query' => compact('replaceWith', 'jql', 'overrideScreenSecurity', 'overrideEditableFlag'),
                'path' => compact('fieldKey', 'optionId'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanRemoveOptionFromIssuesResult::class,
            ],
            arguments: [
                $fieldKey,
                $optionId,
                $replaceWith,
                $jql,
                $overrideScreenSecurity,
                $overrideEditableFlag,
            ],
            response: '{"self":"https://your-domain.atlassian.net/rest/api/3/task/1","id":"1","description":"Remove option 1 from issues matched by \'*\', and replace with option 3","status":"COMPLETE","result":{"errors":{"errorMessages":["Option 2 cannot be set on issue MKY-5 as it is not in the correct scope"],"errors":{},"httpStatusCode":{"empty":false,"present":true}},"modifiedIssues":[10001,10010],"unmodifiedIssues":[10005]},"elapsedRuntime":42}',
        );
    }
}
