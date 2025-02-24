<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Plans
{
    /**
     * Returns a "paginated" list of plans
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param bool $includeTrashed Whether to include trashed plans in the results.
     * @param bool $includeArchived Whether to include archived plans in the results.
     * @param string $cursor The cursor to start from.
     *                       If not provided, the first page will be returned.
     * @param int $maxResults The maximum number of plans to return per page.
     *                        The maximum value is 50.
     *                        The default value is 50.
     */
    public function getPlans(
        ?bool $includeTrashed = false,
        ?bool $includeArchived = false,
        ?string $cursor = '',
        ?int $maxResults = 50,
    ): Schema\PageWithCursorGetPlanResponseForPage {
        return $this->call(
            uri: '/rest/api/3/plans/plan',
            method: 'get',
            query: compact('includeTrashed', 'includeArchived', 'cursor', 'maxResults'),
            success: 200,
            schema: Schema\PageWithCursorGetPlanResponseForPage::class,
        );
    }

    /**
     * Creates a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param bool $useGroupId Whether to accept group IDs instead of group names.
     *                         Group names are deprecated.
     */
    public function createPlan(
        Schema\CreatePlanRequest $request,
        ?bool $useGroupId = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan',
            method: 'post',
            body: $request,
            query: compact('useGroupId'),
            success: 201,
            schema: true,
        );
    }

    /**
     * Returns a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param bool $useGroupId Whether to return group IDs instead of group names.
     *                         Group names are deprecated.
     */
    public function getPlan(
        int $planId,
        ?bool $useGroupId = false,
    ): Schema\GetPlanResponse {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}',
            method: 'get',
            query: compact('useGroupId'),
            path: compact('planId'),
            success: 200,
            schema: Schema\GetPlanResponse::class,
        );
    }

    /**
     * Updates any of the following details of a plan using "JSON Patch"
     * 
     *  - name
     *  - leadAccountId
     *  - scheduling
     *     
     *      - estimation with StoryPoints, Days or Hours as possible values
     *      - startDate
     *         
     *          - type with DueDate, TargetStartDate, TargetEndDate or DateCustomField as possible values
     *          - dateCustomFieldId
     *      - endDate
     *         
     *          - type with DueDate, TargetStartDate, TargetEndDate or DateCustomField as possible values
     *          - dateCustomFieldId
     *      - inferredDates with None, SprintDates or ReleaseDates as possible values
     *      - dependencies with Sequential or Concurrent as possible values
     *  - issueSources
     *     
     *      - type with Board, Project or Filter as possible values
     *      - value
     *  - exclusionRules
     *     
     *      - numberOfDaysToShowCompletedIssues
     *      - issueIds
     *      - workStatusIds
     *      - workStatusCategoryIds
     *      - issueTypeIds
     *      - releaseIds
     *  - crossProjectReleases
     *     
     *      - name
     *      - releaseIds
     *  - customFields
     *     
     *      - customFieldId
     *      - filter
     *  - permissions
     *     
     *      - type with View or Edit as possible values
     *      - holder
     *         
     *          - type with Group or AccountId as possible values
     *          - value
     * 
     * **"Permissions" required:** *Administer Jira* "global permission"
     * 
     * *Note that "add" operations do not respect array indexes in target locations.
     * Call the "Get plan" endpoint to find out the order of array elements.*
     * 
     * @link https://datatracker.ietf.org/doc/html/rfc6902
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     * @param bool $useGroupId Whether to accept group IDs instead of group names.
     *                         Group names are deprecated.
     */
    public function updatePlan(
        int $planId,
        ?bool $useGroupId = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}',
            method: 'put',
            query: compact('useGroupId'),
            path: compact('planId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Archives a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     */
    public function archivePlan(
        int $planId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/archive',
            method: 'put',
            path: compact('planId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Duplicates a plan
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     */
    public function duplicatePlan(
        Schema\DuplicatePlanRequest $request,
        int $planId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/duplicate',
            method: 'post',
            body: $request,
            path: compact('planId'),
            success: 201,
            schema: true,
        );
    }

    /**
     * Moves a plan to trash
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $planId The ID of the plan.
     */
    public function trashPlan(
        int $planId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/plans/plan/{planId}/trash',
            method: 'put',
            path: compact('planId'),
            success: 204,
            schema: true,
        );
    }
}
