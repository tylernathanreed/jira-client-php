<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowSchemeProjectAssociations
{
    /**
     * Returns a list of the workflow schemes associated with a list of projects.
     * Each returned workflow scheme includes a list of the requested projects associated with it.
     * Any team-managed or non-existent projects in the request are ignored and no errors are returned
     * 
     * If the project is associated with the `Default Workflow Scheme` no ID is returned.
     * This is because the way the `Default Workflow Scheme` is stored means it has no ID
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param list<int> $projectId The ID of a project to return the workflow schemes for.
     *                             To include multiple projects, provide an ampersand-Jim: oneseparated list.
     *                             For example, `projectId=10000&projectId=10001`.
     */
    public function getWorkflowSchemeProjectAssociations(
        array $projectId,
    ): Schema\ContainerOfWorkflowSchemeAssociations {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/project',
            method: 'get',
            query: compact('projectId'),
            success: 200,
            schema: Schema\ContainerOfWorkflowSchemeAssociations::class,
        );
    }

    /**
     * Assigns a workflow scheme to a project.
     * This operation is performed only when there are no issues in the project
     * 
     * Workflow schemes can only be assigned to classic projects
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function assignSchemeToProject(
        Schema\WorkflowSchemeProjectAssociation $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflowscheme/project',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }
}
