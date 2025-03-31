# Error Collection

Error messages from an operation.

Source: [`Jira\Client\Schema\ErrorCollection`](/src/Schema/ErrorCollection.php)

| Property | Type | Description |
| --- | --- | --- |
| `errorMessages` | `?list<string>` | The list of error messages produced by this operation. For example, "input parameter 'key' must be provided" |
| `errors` | `array<string,string>` | The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters." |
| `status` | `int` |  |

## References

### Operations

| Group | Operation |
| --- | --- |
| [AnnouncementBanner](/docs/operations/announcement-banner.md) | [getBanner](/docs/operations/announcement-banner.md#get-banner) |
| [AnnouncementBanner](/docs/operations/announcement-banner.md) | [setBanner](/docs/operations/announcement-banner.md#set-banner) |
| [JiraSettings](/docs/operations/jira-settings.md) | [getApplicationProperty](/docs/operations/jira-settings.md#get-application-property) |
| [JiraSettings](/docs/operations/jira-settings.md) | [setApplicationProperty](/docs/operations/jira-settings.md#set-application-property) |
| [AuditRecords](/docs/operations/audit-records.md) | [getAuditRecords](/docs/operations/audit-records.md#get-audit-records) |
| [Avatars](/docs/operations/avatars.md) | [getAvatarImageByType](/docs/operations/avatars.md#get-avatar-image-by-type) |
| [Avatars](/docs/operations/avatars.md) | [getAvatarImageByID](/docs/operations/avatars.md#get-avatar-image-by-i-d) |
| [Avatars](/docs/operations/avatars.md) | [getAvatarImageByOwner](/docs/operations/avatars.md#get-avatar-image-by-owner) |
| [Issues](/docs/operations/issues.md) | [createIssue](/docs/operations/issues.md#create-issue) |
| [Dashboards](/docs/operations/dashboards.md) | [getAllDashboards](/docs/operations/dashboards.md#get-all-dashboards) |
| [Dashboards](/docs/operations/dashboards.md) | [createDashboard](/docs/operations/dashboards.md#create-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [bulkEditDashboards](/docs/operations/dashboards.md#bulk-edit-dashboards) |
| [Dashboards](/docs/operations/dashboards.md) | [getAllAvailableDashboardGadgets](/docs/operations/dashboards.md#get-all-available-dashboard-gadgets) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboardsPaginated](/docs/operations/dashboards.md#get-dashboards-paginated) |
| [Dashboards](/docs/operations/dashboards.md) | [getAllGadgets](/docs/operations/dashboards.md#get-all-gadgets) |
| [Dashboards](/docs/operations/dashboards.md) | [addGadget](/docs/operations/dashboards.md#add-gadget) |
| [Dashboards](/docs/operations/dashboards.md) | [updateGadget](/docs/operations/dashboards.md#update-gadget) |
| [Dashboards](/docs/operations/dashboards.md) | [removeGadget](/docs/operations/dashboards.md#remove-gadget) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboardItemPropertyKeys](/docs/operations/dashboards.md#get-dashboard-item-property-keys) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboardItemProperty](/docs/operations/dashboards.md#get-dashboard-item-property) |
| [Dashboards](/docs/operations/dashboards.md) | [setDashboardItemProperty](/docs/operations/dashboards.md#set-dashboard-item-property) |
| [Dashboards](/docs/operations/dashboards.md) | [deleteDashboardItemProperty](/docs/operations/dashboards.md#delete-dashboard-item-property) |
| [Dashboards](/docs/operations/dashboards.md) | [getDashboard](/docs/operations/dashboards.md#get-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [updateDashboard](/docs/operations/dashboards.md#update-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [deleteDashboard](/docs/operations/dashboards.md#delete-dashboard) |
| [Dashboards](/docs/operations/dashboards.md) | [copyDashboard](/docs/operations/dashboards.md#copy-dashboard) |
| [AppDataPolicies](/docs/operations/app-data-policies.md) | [getPolicy](/docs/operations/app-data-policies.md#get-policy) |
| [AppDataPolicies](/docs/operations/app-data-policies.md) | [getPolicies](/docs/operations/app-data-policies.md#get-policies) |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [analyseExpression](/docs/operations/jira-expressions.md#analyse-expression) |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [evaluateJiraExpression](/docs/operations/jira-expressions.md#evaluate-jira-expression) |
| [JiraExpressions](/docs/operations/jira-expressions.md) | [evaluateJSISJiraExpression](/docs/operations/jira-expressions.md#evaluate-j-s-i-s-jira-expression) |
| [IssueFields](/docs/operations/issue-fields.md) | [getFieldsPaginated](/docs/operations/issue-fields.md#get-fields-paginated) |
| [IssueFields](/docs/operations/issue-fields.md) | [getTrashedFieldsPaginated](/docs/operations/issue-fields.md#get-trashed-fields-paginated) |
| [IssueFields](/docs/operations/issue-fields.md) | [deleteCustomField](/docs/operations/issue-fields.md#delete-custom-field) |
| [IssueFields](/docs/operations/issue-fields.md) | [restoreCustomField](/docs/operations/issue-fields.md#restore-custom-field) |
| [IssueFields](/docs/operations/issue-fields.md) | [trashCustomField](/docs/operations/issue-fields.md#trash-custom-field) |
| [IssueFieldConfigurations](/docs/operations/issue-field-configurations.md) | [removeIssueTypesFromGlobalFieldConfigurationScheme](/docs/operations/issue-field-configurations.md#remove-issue-types-from-global-field-configuration-scheme) |
| [Filters](/docs/operations/filters.md) | [getFiltersPaginated](/docs/operations/filters.md#get-filters-paginated) |
| [LicenseMetrics](/docs/operations/license-metrics.md) | [getApproximateApplicationLicenseCount](/docs/operations/license-metrics.md#get-approximate-application-license-count) |
| [IssueProperties](/docs/operations/issue-properties.md) | [bulkSetIssuesPropertiesList](/docs/operations/issue-properties.md#bulk-set-issues-properties-list) |
| [IssueProperties](/docs/operations/issue-properties.md) | [bulkSetIssuePropertiesByIssue](/docs/operations/issue-properties.md#bulk-set-issue-properties-by-issue) |
| [IssueProperties](/docs/operations/issue-properties.md) | [bulkSetIssueProperty](/docs/operations/issue-properties.md#bulk-set-issue-property) |
| [IssueProperties](/docs/operations/issue-properties.md) | [bulkDeleteIssueProperty](/docs/operations/issue-properties.md#bulk-delete-issue-property) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [createIssueSecurityScheme](/docs/operations/issue-security-schemes.md#create-issue-security-scheme) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [getSecurityLevels](/docs/operations/issue-security-schemes.md#get-security-levels) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [setDefaultLevels](/docs/operations/issue-security-schemes.md#set-default-levels) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [searchProjectsUsingSecuritySchemes](/docs/operations/issue-security-schemes.md#search-projects-using-security-schemes) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [associateSchemesToProjects](/docs/operations/issue-security-schemes.md#associate-schemes-to-projects) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [updateIssueSecurityScheme](/docs/operations/issue-security-schemes.md#update-issue-security-scheme) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [deleteSecurityScheme](/docs/operations/issue-security-schemes.md#delete-security-scheme) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [addSecurityLevel](/docs/operations/issue-security-schemes.md#add-security-level) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [updateSecurityLevel](/docs/operations/issue-security-schemes.md#update-security-level) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [removeLevel](/docs/operations/issue-security-schemes.md#remove-level) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [addSecurityLevelMembers](/docs/operations/issue-security-schemes.md#add-security-level-members) |
| [IssueSecuritySchemes](/docs/operations/issue-security-schemes.md) | [removeMemberFromSecurityLevel](/docs/operations/issue-security-schemes.md#remove-member-from-security-level) |
| [JQL](/docs/operations/j-q-l.md) | [parseJqlQueries](/docs/operations/j-q-l.md#parse-jql-queries) |
| [JQL](/docs/operations/j-q-l.md) | [sanitiseJqlQueries](/docs/operations/j-q-l.md#sanitise-jql-queries) |
| [Permissions](/docs/operations/permissions.md) | [getMyPermissions](/docs/operations/permissions.md#get-my-permissions) |
| [Permissions](/docs/operations/permissions.md) | [getBulkPermissions](/docs/operations/permissions.md#get-bulk-permissions) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [createNotificationScheme](/docs/operations/issue-notification-schemes.md#create-notification-scheme) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [getNotificationSchemeToProjectMappings](/docs/operations/issue-notification-schemes.md#get-notification-scheme-to-project-mappings) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [updateNotificationScheme](/docs/operations/issue-notification-schemes.md#update-notification-scheme) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [addNotifications](/docs/operations/issue-notification-schemes.md#add-notifications) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [deleteNotificationScheme](/docs/operations/issue-notification-schemes.md#delete-notification-scheme) |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [removeNotificationFromNotificationScheme](/docs/operations/issue-notification-schemes.md#remove-notification-from-notification-scheme) |
| [Plans](/docs/operations/plans.md) | [getPlans](/docs/operations/plans.md#get-plans) |
| [Plans](/docs/operations/plans.md) | [createPlan](/docs/operations/plans.md#create-plan) |
| [Plans](/docs/operations/plans.md) | [getPlan](/docs/operations/plans.md#get-plan) |
| [Plans](/docs/operations/plans.md) | [updatePlan](/docs/operations/plans.md#update-plan) |
| [Plans](/docs/operations/plans.md) | [archivePlan](/docs/operations/plans.md#archive-plan) |
| [Plans](/docs/operations/plans.md) | [duplicatePlan](/docs/operations/plans.md#duplicate-plan) |
| [Plans](/docs/operations/plans.md) | [trashPlan](/docs/operations/plans.md#trash-plan) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getTeams](/docs/operations/teams-in-plan.md#get-teams) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [addAtlassianTeam](/docs/operations/teams-in-plan.md#add-atlassian-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getAtlassianTeam](/docs/operations/teams-in-plan.md#get-atlassian-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [updateAtlassianTeam](/docs/operations/teams-in-plan.md#update-atlassian-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [removeAtlassianTeam](/docs/operations/teams-in-plan.md#remove-atlassian-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [createPlanOnlyTeam](/docs/operations/teams-in-plan.md#create-plan-only-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [getPlanOnlyTeam](/docs/operations/teams-in-plan.md#get-plan-only-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [updatePlanOnlyTeam](/docs/operations/teams-in-plan.md#update-plan-only-team) |
| [TeamsInPlan](/docs/operations/teams-in-plan.md) | [deletePlanOnlyTeam](/docs/operations/teams-in-plan.md#delete-plan-only-team) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [createPriority](/docs/operations/issue-priorities.md#create-priority) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [setDefaultPriority](/docs/operations/issue-priorities.md#set-default-priority) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [movePriorities](/docs/operations/issue-priorities.md#move-priorities) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [searchPriorities](/docs/operations/issue-priorities.md#search-priorities) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [updatePriority](/docs/operations/issue-priorities.md#update-priority) |
| [IssuePriorities](/docs/operations/issue-priorities.md) | [deletePriority](/docs/operations/issue-priorities.md#delete-priority) |
| [ProjectKeyAndNameValidation](/docs/operations/project-key-and-name-validation.md) | [validateProjectKey](/docs/operations/project-key-and-name-validation.md#validate-project-key) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [createResolution](/docs/operations/issue-resolutions.md#create-resolution) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [setDefaultResolution](/docs/operations/issue-resolutions.md#set-default-resolution) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [moveResolutions](/docs/operations/issue-resolutions.md#move-resolutions) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [searchResolutions](/docs/operations/issue-resolutions.md#search-resolutions) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [updateResolution](/docs/operations/issue-resolutions.md#update-resolution) |
| [IssueResolutions](/docs/operations/issue-resolutions.md) | [deleteResolution](/docs/operations/issue-resolutions.md#delete-resolution) |
| [IssueNavigatorSettings](/docs/operations/issue-navigator-settings.md) | [getIssueNavigatorDefaultColumns](/docs/operations/issue-navigator-settings.md#get-issue-navigator-default-columns) |
| [UserSearch](/docs/operations/user-search.md) | [findUsersByQuery](/docs/operations/user-search.md#find-users-by-query) |
| [UserSearch](/docs/operations/user-search.md) | [findUserKeysByQuery](/docs/operations/user-search.md#find-user-keys-by-query) |
| [Webhooks](/docs/operations/webhooks.md) | [getDynamicWebhooksForApp](/docs/operations/webhooks.md#get-dynamic-webhooks-for-app) |
| [Webhooks](/docs/operations/webhooks.md) | [registerDynamicWebhooks](/docs/operations/webhooks.md#register-dynamic-webhooks) |
| [Webhooks](/docs/operations/webhooks.md) | [deleteWebhookById](/docs/operations/webhooks.md#delete-webhook-by-id) |
| [Webhooks](/docs/operations/webhooks.md) | [getFailedWebhooks](/docs/operations/webhooks.md#get-failed-webhooks) |
| [Webhooks](/docs/operations/webhooks.md) | [refreshWebhooks](/docs/operations/webhooks.md#refresh-webhooks) |
| [Workflows](/docs/operations/workflows.md) | [getWorkflowsPaginated](/docs/operations/workflows.md#get-workflows-paginated) |
| [WorkflowTransitionRules](/docs/operations/workflow-transition-rules.md) | [getWorkflowTransitionRuleConfigurations](/docs/operations/workflow-transition-rules.md#get-workflow-transition-rule-configurations) |
| [WorkflowTransitionRules](/docs/operations/workflow-transition-rules.md) | [updateWorkflowTransitionRuleConfigurations](/docs/operations/workflow-transition-rules.md#update-workflow-transition-rule-configurations) |
| [WorkflowTransitionRules](/docs/operations/workflow-transition-rules.md) | [deleteWorkflowTransitionRuleConfigurations](/docs/operations/workflow-transition-rules.md#delete-workflow-transition-rule-configurations) |

### Schema

| Schema |
| --- |
| [BulkOperationErrorResult](/docs/schema/bulk-operation-error-result.md) |
| [NestedResponse](/docs/schema/nested-response.md) |
| [SanitizedJqlQuery](/docs/schema/sanitized-jql-query.md) |
