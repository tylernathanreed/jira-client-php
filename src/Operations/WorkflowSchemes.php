<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowSchemes
{
    /**
     * Returns a "paginated" list of all workflow schemes, not including draft workflow schemes
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getAllWorkflowSchemes(
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): Schema\PageBeanWorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanWorkflowScheme::class,
        );
    }

    /**
     * Creates a workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createWorkflowScheme(
        Schema\WorkflowScheme $request,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Returns a list of workflow schemes by providing workflow scheme IDs or project IDs
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* global permission to access all, including project-scoped, workflow schemes
     *  - *Administer projects* project permissions to access project-scoped workflow schemes
     * 
     * @param string $expand Deprecated.
     *                       See the "deprecation notice" for details
     *                       Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `workflows.usages` Returns the project and issue types that each workflow in the workflow scheme is associated with.
     *                       @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
     */
    public function readWorkflowSchemes(
        Schema\WorkflowSchemeReadRequest $request,
        ?string $expand = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/read',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Updates company-managed and team-managed project workflow schemes.
     * This API doesn't have a concept of draft, so any changes made to a workflow scheme are immediately available.
     * When changing the available statuses for issue types, an "asynchronous task" migrates the issues as defined in the provided mappings
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* project permission to update all, including global-scoped, workflow schemes
     *  - *Administer projects* project permission to update project-scoped workflow schemes.
     */
    public function updateSchemes(
        Schema\WorkflowSchemeUpdateRequest $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/update',
            method: 'post',
            body: $request,
            success: 200,
            schema: true,
        );
    }

    /**
     * Gets the required status mappings for the desired changes to a workflow scheme.
     * The results are provided per issue type and workflow.
     * When updating a workflow scheme, status mappings can be provided per issue type, per workflow, or both
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* permission to update all, including global-scoped, workflow schemes
     *  - *Administer projects* project permission to update project-scoped workflow schemes.
     */
    public function updateWorkflowSchemeMappings(
        Schema\WorkflowSchemeUpdateRequiredMappingsRequest $request,
    ): Schema\WorkflowSchemeUpdateRequiredMappingsResponse {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/update/mappings',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\WorkflowSchemeUpdateRequiredMappingsResponse::class,
        );
    }

    /**
     * Returns a workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     *                Find this ID by editing the desired workflow scheme in Jira.
     *                The ID is shown in the URL as `schemeId`.
     *                For example, *schemeId=10301*.
     * @param bool $returnDraftIfExists Returns the workflow scheme's draft rather than scheme itself, if set to true.
     *                                  If the workflow scheme does not have a draft, then the workflow scheme is returned.
     */
    public function getWorkflowScheme(
        int $id,
        ?bool $returnDraftIfExists = false,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}',
            method: 'get',
            query: compact('returnDraftIfExists'),
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Updates a company-manged project workflow scheme, including the name, default workflow, issue type to project mappings, and more.
     * If the workflow scheme is active (that is, being used by at least one project), then a draft workflow scheme is created or updated instead, provided that `updateDraftIfNeeded` is set to `true`
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     *                Find this ID by editing the desired workflow scheme in Jira.
     *                The ID is shown in the URL as `schemeId`.
     *                For example, *schemeId=10301*.
     */
    public function updateWorkflowScheme(
        Schema\WorkflowScheme $request,
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes a workflow scheme.
     * Note that a workflow scheme cannot be deleted if it is active (that is, being used by at least one project)
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     *                Find this ID by editing the desired workflow scheme in Jira.
     *                The ID is shown in the URL as `schemeId`.
     *                For example, *schemeId=10301*.
     */
    public function deleteWorkflowScheme(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the default workflow for a workflow scheme.
     * The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow.
     * The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param bool $returnDraftIfExists Set to `true` to return the default workflow for the workflow scheme's draft rather than scheme itself.
     *                                  If the workflow scheme does not have a draft, then the default workflow for the workflow scheme is returned.
     */
    public function getDefaultWorkflow(
        int $id,
        ?bool $returnDraftIfExists = false,
    ): Schema\DefaultWorkflow {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/default',
            method: 'get',
            query: compact('returnDraftIfExists'),
            path: compact('id'),
            success: 200,
            schema: Schema\DefaultWorkflow::class,
        );
    }

    /**
     * Sets the default workflow for a workflow scheme
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request object and a draft workflow scheme is created or updated with the new default workflow.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     */
    public function updateDefaultWorkflow(
        Schema\DefaultWorkflow $request,
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/default',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Resets the default workflow for a workflow scheme.
     * That is, the default workflow is set to Jira's system workflow (the *jira* workflow)
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the default workflow reset.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited.
     *                                  Defaults to `false`.
     */
    public function deleteDefaultWorkflow(
        int $id,
        ?bool $updateDraftIfNeeded = null,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/default',
            method: 'delete',
            query: compact('updateDraftIfNeeded'),
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $issueType The ID of the issue type.
     * @param bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true.
     *                                  If no draft exists, the mapping from the workflow scheme is returned.
     */
    public function getWorkflowSchemeIssueType(
        int $id,
        string $issueType,
        ?bool $returnDraftIfExists = false,
    ): Schema\IssueTypeWorkflowMapping {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
            method: 'get',
            query: compact('returnDraftIfExists'),
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\IssueTypeWorkflowMapping::class,
        );
    }

    /**
     * Sets the workflow for an issue type in a workflow scheme
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new issue type-workflow mapping.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $issueType The ID of the issue type.
     */
    public function setWorkflowSchemeIssueType(
        Schema\IssueTypeWorkflowMapping $request,
        int $id,
        string $issueType,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
            method: 'put',
            body: $request,
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes the issue type-workflow mapping for an issue type in a workflow scheme
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the issue type-workflow mapping deleted.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $issueType The ID of the issue type.
     * @param bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited.
     *                                  Defaults to `false`.
     */
    public function deleteWorkflowSchemeIssueType(
        int $id,
        string $issueType,
        ?bool $updateDraftIfNeeded = false,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
            method: 'delete',
            query: compact('updateDraftIfNeeded'),
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Returns the workflow-issue type mappings for a workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $workflowName The name of a workflow in the scheme.
     *                             Limits the results to the workflow-issue type mapping for the specified workflow.
     * @param bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true.
     *                                  If no draft exists, the mapping from the workflow scheme is returned.
     */
    public function getWorkflow(
        int $id,
        ?string $workflowName = null,
        ?bool $returnDraftIfExists = false,
    ): Schema\IssueTypesWorkflowMapping {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/workflow',
            method: 'get',
            query: compact('workflowName', 'returnDraftIfExists'),
            path: compact('id'),
            success: 200,
            schema: Schema\IssueTypesWorkflowMapping::class,
        );
    }

    /**
     * Sets the issue types for a workflow in a workflow scheme.
     * The workflow can also be set as the default workflow for the workflow scheme.
     * Unmapped issues types are mapped to the default workflow
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new workflow-issue types mappings.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $workflowName The name of the workflow.
     */
    public function updateWorkflowMapping(
        Schema\IssueTypesWorkflowMapping $request,
        int $id,
        string $workflowName,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/workflow',
            method: 'put',
            body: $request,
            query: compact('workflowName'),
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme
     * 
     * Note that active workflow schemes cannot be edited.
     * If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the workflow-issue type mapping deleted.
     * The draft workflow scheme can be published in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme.
     * @param string $workflowName The name of the workflow.
     * @param bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited.
     *                                  Defaults to `false`.
     */
    public function deleteWorkflowMapping(
        int $id,
        string $workflowName,
        ?bool $updateDraftIfNeeded = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/workflow',
            method: 'delete',
            query: compact('workflowName', 'updateDraftIfNeeded'),
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a page of projects using a given workflow scheme.
     * 
     * @param string $workflowSchemeId The workflow scheme ID
     * @param string $nextPageToken The cursor for pagination
     * @param int $maxResults The maximum number of results to return.
     *                        Must be an integer between 1 and 200.
     */
    public function getProjectUsagesForWorkflowScheme(
        string $workflowSchemeId,
        ?string $nextPageToken = null,
        ?int $maxResults = 50,
    ): Schema\WorkflowSchemeProjectUsageDTO {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{workflowSchemeId}/projectUsages',
            method: 'get',
            query: compact('nextPageToken', 'maxResults'),
            path: compact('workflowSchemeId'),
            success: 200,
            schema: Schema\WorkflowSchemeProjectUsageDTO::class,
        );
    }
}
