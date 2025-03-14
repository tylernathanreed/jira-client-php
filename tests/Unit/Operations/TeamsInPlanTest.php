<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class TeamsInPlanTest extends OperationsTestCase
{
    public function testGetTeams(): void
    {
        $planId = 1234;
        $cursor = '';
        $maxResults = 50;

        $this->assertCall(
            method: 'getTeams',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team',
                'method' => 'get',
                'query' => compact('cursor', 'maxResults'),
                'path' => compact('planId'),
                'success' => 200,
                'schema' => Schema\PageWithCursorGetTeamResponseForPage::class,
            ],
            arguments: [
                $planId,
                $cursor,
                $maxResults,
            ],
            response: '{"cursor":"","isLast":true,"maxResults":2,"nextPageCursor":"2","total":10,"values":[{"id":"1","name":"Team 1","type":"PlanOnly"},{"id":"2","type":"Atlassian"}]}',
        );
    }

    public function testAddAtlassianTeam(): void
    {
        $request = $this->deserialize(Schema\AddAtlassianTeamRequest::class, [
            'capacity' => '200',
            'id' => 'AtlassianTeamId',
            'issueSourceId' => '0',
            'planningStyle' => 'Scrum',
            'sprintLength' => '2',
        ]);

        $planId = 1234;

        $this->assertCall(
            method: 'addAtlassianTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/atlassian',
                'method' => 'post',
                'body' => $request,
                'path' => compact('planId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $planId,
            ],
            response: null,
        );
    }

    public function testGetAtlassianTeam(): void
    {
        $planId = 1234;
        $atlassianTeamId = 'foo';

        $this->assertCall(
            method: 'getAtlassianTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
                'method' => 'get',
                'path' => compact('planId', 'atlassianTeamId'),
                'success' => 200,
                'schema' => Schema\GetAtlassianTeamResponse::class,
            ],
            arguments: [
                $planId,
                $atlassianTeamId,
            ],
            response: '{"capacity":220.0,"id":"98WA-2JBO-12N3-2298","issueSourceId":1,"planningStyle":"Scrum","sprintLength":2}',
        );
    }

    public function testUpdateAtlassianTeam(): void
    {
        $planId = 1234;
        $atlassianTeamId = 'foo';

        $this->assertCall(
            method: 'updateAtlassianTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
                'method' => 'put',
                'path' => compact('planId', 'atlassianTeamId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
                $atlassianTeamId,
            ],
            response: null,
        );
    }

    public function testRemoveAtlassianTeam(): void
    {
        $planId = 1234;
        $atlassianTeamId = 'foo';

        $this->assertCall(
            method: 'removeAtlassianTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
                'method' => 'delete',
                'path' => compact('planId', 'atlassianTeamId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
                $atlassianTeamId,
            ],
            response: null,
        );
    }

    public function testCreatePlanOnlyTeam(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'createPlanOnlyTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/planonly',
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

    public function testGetPlanOnlyTeam(): void
    {
        $planId = 1234;
        $planOnlyTeamId = 1234;

        $this->assertCall(
            method: 'getPlanOnlyTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
                'method' => 'get',
                'path' => compact('planId', 'planOnlyTeamId'),
                'success' => 200,
                'schema' => Schema\GetPlanOnlyTeamResponse::class,
            ],
            arguments: [
                $planId,
                $planOnlyTeamId,
            ],
            response: '{"capacity":30.0,"id":123,"issueSourceId":1,"memberAccountIds":["mek2-3jno-01n3","kdsn-2nk3-2nn1"],"name":"Team1","planningStyle":"Scrum","sprintLength":2}',
        );
    }

    public function testUpdatePlanOnlyTeam(): void
    {
        $planId = 1234;
        $planOnlyTeamId = 1234;

        $this->assertCall(
            method: 'updatePlanOnlyTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
                'method' => 'put',
                'path' => compact('planId', 'planOnlyTeamId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
                $planOnlyTeamId,
            ],
            response: null,
        );
    }

    public function testDeletePlanOnlyTeam(): void
    {
        $planId = 1234;
        $planOnlyTeamId = 1234;

        $this->assertCall(
            method: 'deletePlanOnlyTeam',
            call: [
                'uri' => '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
                'method' => 'delete',
                'path' => compact('planId', 'planOnlyTeamId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $planId,
                $planOnlyTeamId,
            ],
            response: null,
        );
    }
}
