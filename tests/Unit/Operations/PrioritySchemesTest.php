<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class PrioritySchemesTest extends OperationsTestCase
{
    public function testGetPrioritySchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $priorityId = null;
        $schemeId = null;
        $schemeName = '';
        $onlyDefault = false;
        $orderBy = '+name';
        $expand = null;

        $this->assertCall(
            method: 'getPrioritySchemes',
            call: [
                'uri' => '/rest/api/3/priorityscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'priorityId', 'schemeId', 'schemeName', 'onlyDefault', 'orderBy', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanPrioritySchemeWithPaginatedPrioritiesAndProjects::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $priorityId,
                $schemeId,
                $schemeName,
                $onlyDefault,
                $orderBy,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"description":"This is the default scheme used by all new and unassigned projects","id":"1","isDefault":true,"name":"Default Priority Scheme","priorities":{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"description":"Serious problem that could block progress.","iconUrl":"/images/icons/priorities/high.svg","id":"1","isDefault":false,"name":"High","statusColor":"#f15C75"},{"description":"Has the potential to affect progress.","iconUrl":"/images/icons/priorities/medium.svg","id":"2","isDefault":true,"name":"Medium","statusColor":"#f79232"},{"description":"Minor problem or easily worked around.","iconUrl":"/images/icons/priorities/low.svg","id":"3","isDefault":false,"name":"Low","statusColor":"#707070"}]},"projects":{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}}]}',
        );
    }

    public function testCreatePriorityScheme(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createPriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\PrioritySchemeId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testSuggestedPrioritiesForMappings(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'suggestedPrioritiesForMappings',
            call: [
                'uri' => '/rest/api/3/priorityscheme/mappings',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\PageBeanPriorityWithSequence::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"description":"Serious problem that could block progress.","iconUrl":"/images/icons/priorities/high.svg","id":"1","isDefault":false,"name":"High","statusColor":"#f15C75"},{"description":"Has the potential to affect progress.","iconUrl":"/images/icons/priorities/medium.svg","id":"2","isDefault":true,"name":"Medium","statusColor":"#f79232"},{"description":"Minor problem or easily worked around.","iconUrl":"/images/icons/priorities/low.svg","id":"3","isDefault":false,"name":"Low","statusColor":"#707070"}]}',
        );
    }

    public function testGetAvailablePrioritiesByPriorityScheme(): void
    {
        $schemeId = 'foo';
        $startAt = 0;
        $maxResults = 50;
        $query = '';
        $exclude = null;

        $this->assertCall(
            method: 'getAvailablePrioritiesByPriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme/priorities/available',
                'method' => 'get',
                'query' => compact('schemeId', 'startAt', 'maxResults', 'query', 'exclude'),
                'success' => 200,
                'schema' => Schema\PageBeanPriorityWithSequence::class,
            ],
            arguments: [
                $schemeId,
                $startAt,
                $maxResults,
                $query,
                $exclude,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"description":"Serious problem that could block progress.","iconUrl":"/images/icons/priorities/high.svg","id":"1","isDefault":false,"name":"High","statusColor":"#f15C75"},{"description":"Has the potential to affect progress.","iconUrl":"/images/icons/priorities/medium.svg","id":"2","isDefault":true,"name":"Medium","statusColor":"#f79232"},{"description":"Minor problem or easily worked around.","iconUrl":"/images/icons/priorities/low.svg","id":"3","isDefault":false,"name":"Low","statusColor":"#707070"}]}',
        );
    }

    public function testUpdatePriorityScheme(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updatePriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme/{schemeId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('schemeId'),
                'success' => 202,
                'schema' => Schema\UpdatePrioritySchemeResponseBean::class,
            ],
            arguments: [
                $request,
                $schemeId,
            ],
            response: '{"task":{"self":"https://your-domain.atlassian.net/rest/api/3/task/1","id":"1","description":"Task description","status":"COMPLETE","result":"the task result, this may be any JSON","submittedBy":10000,"progress":100,"elapsedRuntime":156,"submitted":1501708132800,"started":1501708132900,"finished":1501708133000,"lastUpdate":1501708133000},"updated":{"description":"This is the default scheme used by all new and unassigned projects","id":"1","isDefault":true,"name":"Default Priority Scheme","priorities":{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"description":"Serious problem that could block progress.","iconUrl":"/images/icons/priorities/high.svg","id":"1","isDefault":false,"name":"High","statusColor":"#f15C75"},{"description":"Has the potential to affect progress.","iconUrl":"/images/icons/priorities/medium.svg","id":"2","isDefault":true,"name":"Medium","statusColor":"#f79232"},{"description":"Minor problem or easily worked around.","iconUrl":"/images/icons/priorities/low.svg","id":"3","isDefault":false,"name":"Low","statusColor":"#707070"}]},"projects":{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}}}',
        );
    }

    public function testDeletePriorityScheme(): void
    {
        $schemeId = 1234;

        $this->assertCall(
            method: 'deletePriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme/{schemeId}',
                'method' => 'delete',
                'path' => compact('schemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $schemeId,
            ],
            response: null,
        );
    }

    public function testGetPrioritiesByPriorityScheme(): void
    {
        $schemeId = 'foo';
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getPrioritiesByPriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme/{schemeId}/priorities',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('schemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanPriorityWithSequence::class,
            ],
            arguments: [
                $schemeId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"description":"Serious problem that could block progress.","iconUrl":"/images/icons/priorities/high.svg","id":"1","isDefault":false,"name":"High","statusColor":"#f15C75"},{"description":"Has the potential to affect progress.","iconUrl":"/images/icons/priorities/medium.svg","id":"2","isDefault":true,"name":"Medium","statusColor":"#f79232"},{"description":"Minor problem or easily worked around.","iconUrl":"/images/icons/priorities/low.svg","id":"3","isDefault":false,"name":"Low","statusColor":"#707070"}]}',
        );
    }

    public function testGetProjectsByPriorityScheme(): void
    {
        $schemeId = 'foo';
        $startAt = 0;
        $maxResults = 50;
        $projectId = null;
        $query = '';

        $this->assertCall(
            method: 'getProjectsByPriorityScheme',
            call: [
                'uri' => '/rest/api/3/priorityscheme/{schemeId}/projects',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'projectId', 'query'),
                'path' => compact('schemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanProject::class,
            ],
            arguments: [
                $schemeId,
                $startAt,
                $maxResults,
                $projectId,
                $query,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":1,"values":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}]}',
        );
    }
}
