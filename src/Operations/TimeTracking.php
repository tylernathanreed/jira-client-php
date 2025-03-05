<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait TimeTracking
{
    /**
     * Returns the time tracking provider that is currently selected.
     * Note that if time tracking is disabled, then a successful but empty response is returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getSelectedTimeTrackingImplementation(): Schema\TimeTrackingProvider
    {
        return $this->call(
            uri: '/rest/api/3/configuration/timetracking',
            method: 'get',
            success: 200,
            schema: Schema\TimeTrackingProvider::class,
        );
    }

    /**
     * Selects a time tracking provider
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function selectTimeTrackingImplementation(
        Schema\TimeTrackingProvider $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/configuration/timetracking',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns all time tracking providers.
     * By default, Jira only has one time tracking provider: *JIRA provided time tracking*.
     * However, you can install other time tracking providers via apps from the Atlassian Marketplace.
     * For more information on time tracking providers, see the documentation for the " Time Tracking Provider" module
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/time-tracking-provider/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @return list<Schema\TimeTrackingProvider>
     */
    public function getAvailableTimeTrackingImplementations(): array
    {
        return $this->call(
            uri: '/rest/api/3/configuration/timetracking/list',
            method: 'get',
            success: 200,
            schema: [Schema\TimeTrackingProvider::class],
        );
    }

    /**
     * Returns the time tracking settings.
     * This includes settings such as the time format, default time unit, and others.
     * For more information, see "Configuring time tracking"
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/qoXKM
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getSharedTimeTrackingConfiguration(): Schema\TimeTrackingConfiguration
    {
        return $this->call(
            uri: '/rest/api/3/configuration/timetracking/options',
            method: 'get',
            success: 200,
            schema: Schema\TimeTrackingConfiguration::class,
        );
    }

    /**
     * Sets the time tracking settings
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setSharedTimeTrackingConfiguration(
        Schema\TimeTrackingConfiguration $request,
    ): Schema\TimeTrackingConfiguration {
        return $this->call(
            uri: '/rest/api/3/configuration/timetracking/options',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\TimeTrackingConfiguration::class,
        );
    }
}
