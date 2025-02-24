<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait UserProperties
{
    /**
     * Returns the keys of all properties for a user
     * 
     * Note: This operation does not access the "user properties" created and maintained in Jira
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to access the property keys on any user
     *  - Access to Jira, to access the calling user's property keys.
     * 
     * @link https://confluence.atlassian.com/x/8YxjL
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $userKey This parameter is no longer available and will be removed from the documentation soon.
     *                        See the "deprecation notice" for details.
     *                        @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $username This parameter is no longer available and will be removed from the documentation soon.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function getUserPropertyKeys(
        ?string $accountId = null,
        ?string $userKey = null,
        ?string $username = null,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/user/properties',
            method: 'get',
            query: compact('accountId', 'userKey', 'username'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the value of a user's property.
     * If no property key is provided "Get user property keys" is called
     * 
     * Note: This operation does not access the "user properties" created and maintained in Jira
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to get a property from any user
     *  - Access to Jira, to get a property from the calling user's record.
     * 
     * @link https://confluence.atlassian.com/x/8YxjL
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $propertyKey The key of the user's property.
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $userKey This parameter is no longer available and will be removed from the documentation soon.
     *                        See the "deprecation notice" for details.
     *                        @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $username This parameter is no longer available and will be removed from the documentation soon.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function getUserProperty(
        string $propertyKey,
        ?string $accountId = null,
        ?string $userKey = null,
        ?string $username = null,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/user/properties/{propertyKey}',
            method: 'get',
            query: compact('accountId', 'userKey', 'username'),
            path: compact('propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of a user's property.
     * Use this resource to store custom data against a user
     * 
     * Note: This operation does not access the "user properties" created and maintained in Jira
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to set a property on any user
     *  - Access to Jira, to set a property on the calling user's record.
     * 
     * @link https://confluence.atlassian.com/x/8YxjL
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $propertyKey The key of the user's property.
     *                            The maximum length is 255 characters.
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $userKey This parameter is no longer available and will be removed from the documentation soon.
     *                        See the "deprecation notice" for details.
     *                        @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $username This parameter is no longer available and will be removed from the documentation soon.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function setUserProperty(
        string $propertyKey,
        ?string $accountId = null,
        ?string $userKey = null,
        ?string $username = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/properties/{propertyKey}',
            method: 'put',
            query: compact('accountId', 'userKey', 'username'),
            path: compact('propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes a property from a user
     * 
     * Note: This operation does not access the "user properties" created and maintained in Jira
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to delete a property from any user
     *  - Access to Jira, to delete a property from the calling user's record.
     * 
     * @link https://confluence.atlassian.com/x/8YxjL
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $propertyKey The key of the user's property.
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $userKey This parameter is no longer available and will be removed from the documentation soon.
     *                        See the "deprecation notice" for details.
     *                        @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $username This parameter is no longer available and will be removed from the documentation soon.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function deleteUserProperty(
        string $propertyKey,
        ?string $accountId = null,
        ?string $userKey = null,
        ?string $username = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/properties/{propertyKey}',
            method: 'delete',
            query: compact('accountId', 'userKey', 'username'),
            path: compact('propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
