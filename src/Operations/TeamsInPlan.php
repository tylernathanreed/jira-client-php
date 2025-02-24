<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait TeamsInPlan
{
    /**
     * Returns a "paginated" list of plan-only and Atlassian teams in a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param string $cursor The cursor to start from.
     *                       If not provided, the first page will be returned.
     * @param int $maxResults The maximum number of plan teams to return per page.
     *                        The maximum value is 50.
     *                        The default value is 50.
     */
    public function getTeams(
        int $planId,
        ?string $cursor = '',
        ?int $maxResults = 50,
    ): Schema\PageWithCursorGetTeamResponseForPage {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team',
            method: 'get',
            query: compact('cursor', 'maxResults'),
            path: compact('planId'),
            success: 200,
            schema: Schema\PageWithCursorGetTeamResponseForPage::class,
        );
    }

    /**
     * Adds an existing Atlassian team to a plan and configures their plannning settings
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     */
    public function addAtlassianTeam(
        Schema\AddAtlassianTeamRequest $request,
        int $planId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/atlassian',
            method: 'post',
            body: $request,
            path: compact('planId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns planning settings for an Atlassian team in a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param string $atlassianTeamId The ID of the Atlassian team.
     */
    public function getAtlassianTeam(
        int $planId,
        string $atlassianTeamId,
    ): Schema\GetAtlassianTeamResponse {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
            method: 'get',
            path: compact('planId', 'atlassianTeamId'),
            success: 200,
            schema: Schema\GetAtlassianTeamResponse::class,
        );
    }

    /**
     * Updates any of the following planning settings of an Atlassian team in a plan using "JSON Patch"
     * 
     *  - planningStyle
     *  - issueSourceId
     *  - sprintLength
     *  - capacity
     * 
     * **"Permissions" required:** *Administer Jira* "global permission"
     * 
     * *Note that "add" operations do not respect array indexes in target locations.
     * Call the "Get Atlassian team in plan" endpoint to find out the order of array elements.*
     * 
     * @link https://datatracker.ietf.org/doc/html/rfc6902
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param string $atlassianTeamId The ID of the Atlassian team.
     */
    public function updateAtlassianTeam(
        int $planId,
        string $atlassianTeamId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
            method: 'put',
            path: compact('planId', 'atlassianTeamId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes an Atlassian team from a plan and deletes their planning settings
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param string $atlassianTeamId The ID of the Atlassian team.
     */
    public function removeAtlassianTeam(
        int $planId,
        string $atlassianTeamId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/atlassian/{atlassianTeamId}',
            method: 'delete',
            path: compact('planId', 'atlassianTeamId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Creates a plan-only team and configures their planning settings
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     */
    public function createPlanOnlyTeam(
        Schema\CreatePlanOnlyTeamRequest $request,
        int $planId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/planonly',
            method: 'post',
            body: $request,
            path: compact('planId'),
            success: 201,
            schema: true,
        );
    }

    /**
     * Returns planning settings for a plan-only team
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param int $planOnlyTeamId The ID of the plan-only team.
     */
    public function getPlanOnlyTeam(
        int $planId,
        int $planOnlyTeamId,
    ): Schema\GetPlanOnlyTeamResponse {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
            method: 'get',
            path: compact('planId', 'planOnlyTeamId'),
            success: 200,
            schema: Schema\GetPlanOnlyTeamResponse::class,
        );
    }

    /**
     * Updates any of the following planning settings of a plan-only team using "JSON Patch"
     * 
     *  - name
     *  - planningStyle
     *  - issueSourceId
     *  - sprintLength
     *  - capacity
     *  - memberAccountIds
     * 
     * **"Permissions" required:** *Administer Jira* "global permission"
     * 
     * *Note that "add" operations do not respect array indexes in target locations.
     * Call the "Get plan-only team" endpoint to find out the order of array elements.*
     * 
     * @link https://datatracker.ietf.org/doc/html/rfc6902
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param int $planOnlyTeamId The ID of the plan-only team.
     */
    public function updatePlanOnlyTeam(
        int $planId,
        int $planOnlyTeamId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
            method: 'put',
            path: compact('planId', 'planOnlyTeamId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a plan-only team and their planning settings
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param int $planOnlyTeamId The ID of the plan-only team.
     */
    public function deletePlanOnlyTeam(
        int $planId,
        int $planOnlyTeamId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/team/planonly/{planOnlyTeamId}',
            method: 'delete',
            path: compact('planId', 'planOnlyTeamId'),
            success: 204,
            schema: true,
        );
    }
}
