<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait WorkflowTransitionProperties
{
    /**
     * Returns the properties on a workflow transition.
     * Transition properties are used to change the behavior of a transition.
     * For more information, see "Transition properties" and "Workflow properties"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
     * @link https://confluence.atlassian.com/x/JYlKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $transitionId The ID of the transition.
     *                          To get the ID, view the workflow in text mode in the Jira administration console.
     *                          The ID is shown next to the transition.
     * @param string $workflowName The name of the workflow that the transition belongs to.
     * @param bool $includeReservedKeys Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable.
     *                                  To include these properties in the results, set this parameter to *true*.
     * @param string $key The key of the property being returned, also known as the name of the property.
     *                    If this parameter is not specified, all properties on the transition are returned.
     * @param 'live'|'draft'|null $workflowMode
     *        The workflow status.
     *        Set to *live* for active and inactive workflows, or *draft* for draft workflows.
     */
    public function getWorkflowTransitionProperties(
        int $transitionId,
        string $workflowName,
        ?bool $includeReservedKeys = false,
        ?string $key = null,
        ?string $workflowMode = 'live',
    ): Schema\WorkflowTransitionProperty {
        return $this->call(
            uri: '/rest/api/3/workflow/transitions/{transitionId}/properties',
            method: 'get',
            query: compact('workflowName', 'includeReservedKeys', 'key', 'workflowMode'),
            path: compact('transitionId'),
            success: 200,
            schema: Schema\WorkflowTransitionProperty::class,
        );
    }

    /**
     * Updates a workflow transition by changing the property value.
     * Trying to update a property that does not exist results in a new property being added to the transition.
     * Transition properties are used to change the behavior of a transition.
     * For more information, see "Transition properties" and "Workflow properties"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
     * @link https://confluence.atlassian.com/x/JYlKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $transitionId The ID of the transition.
     *                          To get the ID, view the workflow in text mode in the Jira admin settings.
     *                          The ID is shown next to the transition.
     * @param string $key The key of the property being updated, also known as the name of the property.
     *                    Set this to the same value as the `key` defined in the request body.
     * @param string $workflowName The name of the workflow that the transition belongs to.
     * @param 'live'|'draft'|null $workflowMode
     *        The workflow status.
     *        Set to `live` for inactive workflows or `draft` for draft workflows.
     *        Active workflows cannot be edited.
     */
    public function updateWorkflowTransitionProperty(
        Schema\WorkflowTransitionProperty $request,
        int $transitionId,
        string $key,
        string $workflowName,
        ?string $workflowMode = null,
    ): Schema\WorkflowTransitionProperty {
        return $this->call(
            uri: '/rest/api/3/workflow/transitions/{transitionId}/properties',
            method: 'put',
            body: $request,
            query: compact('key', 'workflowName', 'workflowMode'),
            path: compact('transitionId'),
            success: 200,
            schema: Schema\WorkflowTransitionProperty::class,
        );
    }

    /**
     * Adds a property to a workflow transition.
     * Transition properties are used to change the behavior of a transition.
     * For more information, see "Transition properties" and "Workflow properties"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
     * @link https://confluence.atlassian.com/x/JYlKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $transitionId The ID of the transition.
     *                          To get the ID, view the workflow in text mode in the Jira admin settings.
     *                          The ID is shown next to the transition.
     * @param string $key The key of the property being added, also known as the name of the property.
     *                    Set this to the same value as the `key` defined in the request body.
     * @param string $workflowName The name of the workflow that the transition belongs to.
     * @param 'live'|'draft'|null $workflowMode
     *        The workflow status.
     *        Set to *live* for inactive workflows or *draft* for draft workflows.
     *        Active workflows cannot be edited.
     */
    public function createWorkflowTransitionProperty(
        Schema\WorkflowTransitionProperty $request,
        int $transitionId,
        string $key,
        string $workflowName,
        ?string $workflowMode = 'live',
    ): Schema\WorkflowTransitionProperty {
        return $this->call(
            uri: '/rest/api/3/workflow/transitions/{transitionId}/properties',
            method: 'post',
            body: $request,
            query: compact('key', 'workflowName', 'workflowMode'),
            path: compact('transitionId'),
            success: 200,
            schema: Schema\WorkflowTransitionProperty::class,
        );
    }

    /**
     * Deletes a property from a workflow transition.
     * Transition properties are used to change the behavior of a transition.
     * For more information, see "Transition properties" and "Workflow properties"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties
     * @link https://confluence.atlassian.com/x/JYlKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $transitionId The ID of the transition.
     *                          To get the ID, view the workflow in text mode in the Jira admin settings.
     *                          The ID is shown next to the transition.
     * @param string $key The name of the transition property to delete, also known as the name of the property.
     * @param string $workflowName The name of the workflow that the transition belongs to.
     * @param 'live'|'draft'|null $workflowMode
     *        The workflow status.
     *        Set to `live` for inactive workflows or `draft` for draft workflows.
     *        Active workflows cannot be edited.
     */
    public function deleteWorkflowTransitionProperty(
        int $transitionId,
        string $key,
        string $workflowName,
        ?string $workflowMode = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/workflow/transitions/{transitionId}/properties',
            method: 'delete',
            query: compact('key', 'workflowName', 'workflowMode'),
            path: compact('transitionId'),
            success: 200,
            schema: true,
        );
    }
}
