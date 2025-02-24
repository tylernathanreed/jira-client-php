<?php

namespace Jira\Client;

use Jira\Client\Operations;

/** @phpstan-require-extends Client */
trait PerformsOperations
{
    use Operations\AnnouncementBanner;
    use Operations\Avatars;
    use Operations\ClassificationLevels;
    use Operations\Dashboards;
    use Operations\IssueBulkOperations;
    use Operations\IssueCustomFieldConfigurationApps;
    use Operations\ProjectComponents;
}
