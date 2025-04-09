<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait LicenseMetrics
{
    /**
     * Returns licensing information about the Jira instance
     * 
     * **"Permissions" required:** None.
     */
    public function getLicense(): Schema\License
    {
        return $this->call(
            uri: '/rest/api/3/instance/license',
            method: 'get',
            success: 200,
            schema: Schema\License::class,
        );
    }

    /**
     * Returns the approximate number of user accounts across all Jira licenses.
     * Note that this information is cached with a 7-day lifecycle and could be stale at the time of call
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getApproximateLicenseCount(): Schema\LicenseMetric
    {
        return $this->call(
            uri: '/rest/api/3/license/approximateLicenseCount',
            method: 'get',
            success: 200,
            schema: Schema\LicenseMetric::class,
        );
    }

    /**
     * Returns the total approximate number of user accounts for a single Jira license.
     * Note that this information is cached with a 7-day lifecycle and could be stale at the time of call
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param 'jira-core'|'jira-product-discovery'|'jira-software'|'jira-servicedesk' $applicationKey
     *        The ID of the application, represents a specific version of Jira.
     */
    public function getApproximateApplicationLicenseCount(
        string $applicationKey,
    ): Schema\LicenseMetric {
        return $this->call(
            uri: '/rest/api/3/license/approximateLicenseCount/product/{applicationKey}',
            method: 'get',
            path: compact('applicationKey'),
            success: 200,
            schema: Schema\LicenseMetric::class,
        );
    }
}
