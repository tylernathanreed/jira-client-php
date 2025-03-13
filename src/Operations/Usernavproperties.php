<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Usernavproperties
{
    /**
     * Returns the value of a user nav preference
     * 
     * Note: This operation fetches the property key value directly from RbacClient
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to get a property from any user
     *  - Access to Jira, to get a property from the calling user's record.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $propertyKey The key of the user's property.
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function getUserNavProperty(
        string $propertyKey,
        ?string $accountId = null,
    ): Schema\UserNavPropertyJsonBean {
        return $this->call(
            uri: '/rest/api/3/user/nav4-opt-property/{propertyKey}',
            method: 'get',
            query: compact('accountId'),
            path: compact('propertyKey'),
            success: 200,
            schema: Schema\UserNavPropertyJsonBean::class,
        );
    }

    /**
     * Sets the value of a Nav4 preference.
     * Use this resource to store Nav4 preference data against a user in the Identity service
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to set a property on any user
     *  - Access to Jira, to set a property on the calling user's record.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $propertyKey The key of the nav property.
     *                            The maximum length is 255 characters.
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function setUserNavProperty(
        string $propertyKey,
        ?string $accountId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/nav4-opt-property/{propertyKey}',
            method: 'put',
            query: compact('accountId'),
            path: compact('propertyKey'),
            success: 200,
            schema: true,
        );
    }
}
