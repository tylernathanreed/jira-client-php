<?php

namespace Jira\Client;

use Jira\Client\Operations;

/** @phpstan-require-extends Client */
trait PerformsOperations
{
    use Operations\AnnouncementBanner;
    use Operations\AppDataPolicies;
    use Operations\ApplicationRoles;
    use Operations\AuditRecords;
    use Operations\Avatars;
    use Operations\ClassificationLevels;
    use Operations\Dashboards;
    use Operations\FilterSharing;
    use Operations\Filters;
    use Operations\Groups;
    use Operations\IssueAttachments;
    use Operations\IssueBulkOperations;
    use Operations\IssueCommentProperties;
    use Operations\IssueComments;
    use Operations\IssueCustomFieldConfigurationApps;
    use Operations\IssueCustomFieldContexts;
    use Operations\IssueCustomFieldOptions;
    use Operations\IssueCustomFieldOptionsApps;
    use Operations\IssueCustomFieldValuesApps;
    use Operations\IssueFieldConfigurations;
    use Operations\IssueFields;
    use Operations\Issues;
    use Operations\JiraExpressions;
    use Operations\JiraSettings;
    use Operations\ProjectComponents;
    use Operations\Screens;
    use Operations\TimeTracking;
}
