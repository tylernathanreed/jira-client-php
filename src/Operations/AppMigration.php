<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait AppMigration
{
    /**
     * Updates the value of a custom field added by Connect apps on one or more issues
     * The values of up to 200 custom fields can be updated
     * 
     * **"Permissions" required:** Only Connect apps can make this request
     * 
     * @param string $atlassianTransferId The ID of the transfer.
     */
    public function AppIssueFieldValueUpdateResource.updateIssueFields_put(
        Schema\ConnectCustomFieldValues $request,
        string $atlassianTransferId,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/migration/field',
            method: 'put',
            body: $request,
            success: 200,
            schema: true,
        );
    }

    /**
     * Updates the values of multiple entity properties for an object, up to 50 updates per request.
     * This operation is for use by Connect apps during app migration.
     * 
     * @param string $atlassianTransferId The app migration transfer ID.
     * @param 'IssueProperty'|'CommentProperty'|'DashboardItemProperty'|'IssueTypeProperty'|'ProjectProperty'|'UserProperty'|'WorklogProperty'|'BoardProperty'|'SprintProperty' $entityType
     *        The type indicating the object that contains the entity properties.
     */
    public function MigrationResource.updateEntityPropertiesValue_put(
        string $atlassianTransferId,
        string $entityType,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/migration/properties/{entityType}',
            method: 'put',
            path: compact('entityType'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.
     * 
     * @param string $atlassianTransferId The app migration transfer ID.
     */
    public function MigrationResource.workflowRuleSearch_post(
        Schema\WorkflowRulesSearch $request,
        string $atlassianTransferId,
    ): Schema\WorkflowRulesSearchDetails {
        return $this->call(
            uri: '/rest/atlassian-connect/1/migration/workflow/rule/search',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\WorkflowRulesSearchDetails::class,
        );
    }
}
