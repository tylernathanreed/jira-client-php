<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait AnnouncementBanner
{
    /**
     * Returns the current announcement banner configuration
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getBanner(): Schema\AnnouncementBannerConfiguration
    {
        return $this->call(
            uri: '/rest/api/3/announcementBanner',
            method: 'get',
            success: 200,
            schema: Schema\AnnouncementBannerConfiguration::class,
        );
    }

    /**
     * Updates the announcement banner configuration
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function setBanner(
        Schema\AnnouncementBannerConfigurationUpdate $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/announcementBanner',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }
}
