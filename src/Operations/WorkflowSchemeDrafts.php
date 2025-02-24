<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowSchemeDrafts
{
    /**
     * Create a draft workflow scheme from an active workflow scheme, by copying the active workflow scheme.
     * Note that an active workflow scheme can only have one draft workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the active workflow scheme that the draft is created from.
     */
    public function createWorkflowSchemeDraftFromParent(
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/createdraft',
            method: 'post',
            path: compact('id'),
            success: 201,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Returns the draft workflow scheme for an active workflow scheme.
     * Draft workflow schemes allow changes to be made to the active workflow schemes: When an active workflow scheme is updated, a draft copy is created.
     * The draft is modified, then the changes in the draft are copied back to the active workflow scheme.
     * See "Configuring workflow schemes" for more information.
     *  
     * Note that:
     * 
     *  - Only active workflow schemes can have draft workflow schemes
     *  - An active workflow scheme can only have one draft workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/tohKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the active workflow scheme that the draft was created from.
     */
    public function getWorkflowSchemeDraft(
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Updates a draft workflow scheme.
     * If a draft workflow scheme does not exist for the active workflow scheme, then a draft is created.
     * Note that an active workflow scheme can only have one draft workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the active workflow scheme that the draft was created from.
     */
    public function updateWorkflowSchemeDraft(
        Schema\WorkflowScheme $request,
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes a draft workflow scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the active workflow scheme that the draft was created from.
     */
    public function deleteWorkflowSchemeDraft(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the default workflow for a workflow scheme's draft.
     * The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow.
     * The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     */
    public function getDraftDefaultWorkflow(
        int $id,
    ): Schema\DefaultWorkflow {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/default',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\DefaultWorkflow::class,
        );
    }

    /**
     * Sets the default workflow for a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     */
    public function updateDraftDefaultWorkflow(
        Schema\DefaultWorkflow $request,
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/default',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Resets the default workflow for a workflow scheme's draft.
     * That is, the default workflow is set to Jira's system workflow (the *jira* workflow)
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     */
    public function deleteDraftDefaultWorkflow(
        int $id,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/default',
            method: 'delete',
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     */
    public function getWorkflowSchemeDraftIssueType(
        int $id,
        string $issueType,
    ): Schema\IssueTypeWorkflowMapping {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
            method: 'get',
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\IssueTypeWorkflowMapping::class,
        );
    }

    /**
     * Sets the workflow for an issue type in a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     */
    public function setWorkflowSchemeDraftIssueType(
        Schema\IssueTypeWorkflowMapping $request,
        int $id,
        string $issueType,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
            method: 'put',
            body: $request,
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes the issue type-workflow mapping for an issue type in a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     */
    public function deleteWorkflowSchemeDraftIssueType(
        int $id,
        string $issueType,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
            method: 'delete',
            path: compact('id', 'issueType'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Publishes a draft workflow scheme
     * 
     * Where the draft workflow includes new workflow statuses for an issue type, mappings are provided to update issues with the original workflow status to the new workflow status
     * 
     * This operation is "asynchronous".
     * Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain updates
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param bool $validateOnly Whether the request only performs a validation.
     */
    public function publishDraftWorkflowScheme(
        Schema\PublishDraftWorkflowScheme $request,
        int $id,
        ?bool $validateOnly = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/publish',
            method: 'post',
            body: $request,
            query: compact('validateOnly'),
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the workflow-issue type mappings for a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $workflowName The name of a workflow in the scheme.
     *                             Limits the results to the workflow-issue type mapping for the specified workflow.
     */
    public function getDraftWorkflow(
        int $id,
        ?string $workflowName = null,
    ): Schema\IssueTypesWorkflowMapping {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/workflow',
            method: 'get',
            query: compact('workflowName'),
            path: compact('id'),
            success: 200,
            schema: Schema\IssueTypesWorkflowMapping::class,
        );
    }

    /**
     * Sets the issue types for a workflow in a workflow scheme's draft.
     * The workflow can also be set as the default workflow for the draft workflow scheme.
     * Unmapped issues types are mapped to the default workflow
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $workflowName The name of the workflow.
     */
    public function updateDraftWorkflowMapping(
        Schema\IssueTypesWorkflowMapping $request,
        int $id,
        string $workflowName,
    ): Schema\WorkflowScheme {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/workflow',
            method: 'put',
            body: $request,
            query: compact('workflowName'),
            path: compact('id'),
            success: 200,
            schema: Schema\WorkflowScheme::class,
        );
    }

    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $workflowName The name of the workflow.
     */
    public function deleteDraftWorkflowMapping(
        int $id,
        string $workflowName,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/{id}/draft/workflow',
            method: 'delete',
            query: compact('workflowName'),
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }
}
