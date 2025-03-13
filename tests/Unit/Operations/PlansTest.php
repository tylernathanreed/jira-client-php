<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class PlansTest extends OperationsTestCase
{
    public function testGetPlans(): void
    {
        $includeTrashed = false;
        $includeArchived = false;
        $cursor = '';
        $maxResults = 50;

        $this->assertCall(
            method: 'getPlans',
            call: [
                'uri' => '/rest/api/3/plans/plan',
                'method' => 'get',
                'query' => compact('includeTrashed', 'includeArchived', 'cursor', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageWithCursorGetPlanResponseForPage::class,
            ],
            arguments: [
                $includeTrashed,
                $includeArchived,
                $cursor,
                $maxResults,
            ],
            response: '{"cursor":"","isLast":true,"maxResults":2,"nextPageCursor":"2","total":10,"values":[{"id":"100","issueSources":[{"type":"Project","value":10000}],"name":"Plan 1","status":"Active"},{"id":"200","issueSources":[{"type":"Board","value":20000}],"name":"Plan 2","status":"Trashed"}]}',
        );
    }

    public function testCreatePlan(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'createPlan',
            call: [
                'uri' => '/rest/api/3/plans/plan',
                'method' => 'post',
                'body' => $request,
                'query' => compact('useGroupId'),
                'success' => 201,
                'schema' => true,
            ],
            arguments: [
                $request,
                $useGroupId,
            ],
            response: null,
        );
    }

    public function testGetPlan(): void
    {
        $planId = 1234;
        $useGroupId = false;

        $this->assertCall(
            method: 'getPlan',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}',
                'method' => 'get',
                'query' => compact('useGroupId'),
                'path' => compact('planId'),
                'success' => 200,
                'schema' => Schema\GetPlanResponse::class,
            ],
            arguments: [
                $planId,
                $useGroupId,
            ],
            response: '{"crossProjectReleases":[{"name":"x-plr","releaseIds":[345]}],"customFields":[{"customFieldId":34,"filter":false},{"customFieldId":39,"filter":true}],"exclusionRules":{"issueIds":[1,2],"issueTypeIds":[13,23],"numberOfDaysToShowCompletedIssues":50,"releaseIds":[14,24],"workStatusCategoryIds":[12,22],"workStatusIds":[11,21]},"id":23,"issueSources":[{"type":"Project","value":12},{"type":"Filter","value":10293}],"lastSaved":"2024-10-03T10:15:30Z","leadAccountId":"628f5e86d5ec1f006ne7363x2s","name":"Onset TBJ Plan","permissions":[{"holder":{"type":"AccountId","value":"04jekw86d5jjje006ne7363x2s"},"type":"Edit"}],"scheduling":{"dependencies":"Concurrent","endDate":{"dateCustomFieldId":1098,"type":"DateCustomField"},"estimation":"Hours","inferredDates":"ReleaseDates","startDate":{"type":"TargetStartDate"}},"status":"Active"}',
        );
    }

    public function testUpdatePlan(): void
    {
        $planId = 1234;
        $useGroupId = false;

        $this->assertCall(
            method: 'updatePlan',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}',
                'method' => 'put',
                'query' => compact('useGroupId'),
                'path' => compact('planId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
                $useGroupId,
            ],
            response: null,
        );
    }

    public function testArchivePlan(): void
    {
        $planId = 1234;

        $this->assertCall(
            method: 'archivePlan',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/archive',
                'method' => 'put',
                'path' => compact('planId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
            ],
            response: null,
        );
    }

    public function testDuplicatePlan(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'duplicatePlan',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/duplicate',
                'method' => 'post',
                'body' => $request,
                'path' => compact('planId'),
                'success' => 201,
                'schema' => true,
            ],
            arguments: [
                $request,
                $planId,
            ],
            response: null,
        );
    }

    public function testTrashPlan(): void
    {
        $planId = 1234;

        $this->assertCall(
            method: 'trashPlan',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/trash',
                'method' => 'put',
                'path' => compact('planId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
            ],
            response: null,
        );
    }
}
