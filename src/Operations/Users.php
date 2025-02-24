<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Users
{
    /**
     * Returns a user
     * 
     * Privacy controls are applied to the response based on the user's preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     *                          Required.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $key This parameter is no longer available.
     *                    See the "deprecation notice" for details.
     *                    @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $expand Use "expand" to include additional information about users in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `groups` includes all groups and nested groups to which the user belongs
     *                        - `applicationRoles` includes details of all the applications to which the user has access.
     */
    public function getUser(
        ?string $accountId = null,
        ?string $username = null,
        ?string $key = null,
        ?string $expand = null,
    ): Schema\User {
        return $this->call(
            uri: '/rest/api/3/user',
            method: 'get',
            query: compact('accountId', 'username', 'key', 'expand'),
            success: 200,
            schema: Schema\User::class,
        );
    }

    /**
     * Creates a user.
     * This resource is retained for legacy compatibility.
     * As soon as a more suitable alternative is available this resource will be deprecated
     * 
     * If the user exists and has access to Jira, the operation returns a 201 status.
     * If the user exists but does not have access to Jira, the operation returns a 400 status
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createUser(
        Schema\NewUserDetails $request,
    ): Schema\User {
        return $this->call(
            uri: '/rest/api/3/user',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\User::class,
        );
    }

    /**
     * Deletes a user.
     * If the operation completes successfully then the user is removed from Jira's user base.
     * This operation does not delete the user's Atlassian account
     * 
     * **"Permissions" required:** Site administration (that is, membership of the *site-admin* "group").
     * 
     * @link https://confluence.atlassian.com/x/24xjL
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $key This parameter is no longer available.
     *                    See the "deprecation notice" for details.
     *                    @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function removeUser(
        string $accountId,
        ?string $username = null,
        ?string $key = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user',
            method: 'delete',
            query: compact('accountId', 'username', 'key'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of the users specified by one or more account IDs
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param list<string> $accountId The account ID of a user.
     *                                To specify multiple users, pass multiple `accountId` parameters.
     *                                For example, `accountId=5b10a2844c20165700ede21g&accountId=5b10ac8d82e05b22cc7d4ef5`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $username This parameter is no longer available and will be removed from the documentation soon.
     *                                See the "deprecation notice" for details.
     *                                @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param ?list<string> $key This parameter is no longer available and will be removed from the documentation soon.
     *                           See the "deprecation notice" for details.
     *                           @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function bulkGetUsers(
        array $accountId,
        ?int $startAt = 0,
        ?int $maxResults = 10,
        ?array $username = null,
        ?array $key = null,
    ): Schema\PageBeanUser {
        return $this->call(
            uri: '/rest/api/3/user/bulk',
            method: 'get',
            query: compact('accountId', 'startAt', 'maxResults', 'username', 'key'),
            success: 200,
            schema: Schema\PageBeanUser::class,
        );
    }

    /**
     * Returns the account IDs for the users specified in the `key` or `username` parameters.
     * Note that multiple `key` or `username` parameters can be specified
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<string> $username Username of a user.
     *                                To specify multiple users, pass multiple copies of this parameter.
     *                                For example, `username=fred&username=barney`.
     *                                Required if `key` isn't provided.
     *                                Cannot be provided if `key` is present.
     * @param ?list<string> $key Key of a user.
     *                           To specify multiple users, pass multiple copies of this parameter.
     *                           For example, `key=fred&key=barney`.
     *                           Required if `username` isn't provided.
     *                           Cannot be provided if `username` is present.
     */
    public function bulkGetUsersMigration(
        ?int $startAt = 0,
        ?int $maxResults = 10,
        ?array $username = null,
        ?array $key = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/bulk/migration',
            method: 'get',
            query: compact('startAt', 'maxResults', 'username', 'key'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns the default "issue table columns" for the user.
     * If `accountId` is not passed in the request, the calling user's details are returned
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to get the column details for any user
     *  - Permission to access Jira, to get the calling user's column details.
     * 
     * @link https://confluence.atlassian.com/x/XYdKLg
     * @link https://confluence.atlassian.com/x/x4dKLgl
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $username This parameter is no longer available See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function getUserDefaultColumns(
        ?string $accountId = null,
        ?string $username = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/columns',
            method: 'get',
            query: compact('accountId', 'username'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Sets the default " issue table columns" for the user.
     * If an account ID is not passed, the calling user's default columns are set.
     * If no column details are sent, then all default columns are removed
     * 
     * The parameters for this resource are expressed as HTML form data.
     * For example, in curl:
     * 
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/user/columns?accountId=5b10ac8d82e05b22cc7d4ef5'`
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to set the columns on any user
     *  - Permission to access Jira, to set the calling user's columns.
     * 
     * @link https://confluence.atlassian.com/x/XYdKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function setUserColumns(
        ?string $accountId = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/columns',
            method: 'put',
            query: compact('accountId'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Resets the default " issue table columns" for the user to the system default.
     * If `accountId` is not passed, the calling user's default columns are reset
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission", to set the columns on any user
     *  - Permission to access Jira, to set the calling user's columns.
     * 
     * @link https://confluence.atlassian.com/x/XYdKLg
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function resetUserColumns(
        ?string $accountId = null,
        ?string $username = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/columns',
            method: 'delete',
            query: compact('accountId', 'username'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a user's email address regardless of the user's profile visibility settings.
     * For Connect apps, this API is only available to apps approved by Atlassian, according to these "guidelines".
     * For Forge apps, this API only supports access via asApp() requests.
     * 
     * @link https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, `5b10ac8d82e05b22cc7d4ef5`.
     */
    public function getUserEmail(
        string $accountId,
    ): Schema\UnrestrictedUserEmail {
        return $this->call(
            uri: '/rest/api/3/user/email',
            method: 'get',
            query: compact('accountId'),
            success: 200,
            schema: Schema\UnrestrictedUserEmail::class,
        );
    }

    /**
     * Returns a user's email address regardless of the user's profile visibility settings.
     * For Connect apps, this API is only available to apps approved by Atlassian, according to these "guidelines".
     * For Forge apps, this API only supports access via asApp() requests.
     * 
     * @link https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603
     * 
     * @param list<string> $accountId The account IDs of the users for which emails are required.
     *                                An `accountId` is an identifier that uniquely identifies the user across all Atlassian products.
     *                                For example, `5b10ac8d82e05b22cc7d4ef5`.
     *                                Note, this should be treated as an opaque identifier (that is, do not assume any structure in the value).
     */
    public function getUserEmailBulk(
        array $accountId,
    ): Schema\UnrestrictedUserEmail {
        return $this->call(
            uri: '/rest/api/3/user/email/bulk',
            method: 'get',
            query: compact('accountId'),
            success: 200,
            schema: Schema\UnrestrictedUserEmail::class,
        );
    }

    /**
     * Returns the groups to which a user belongs
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products.
     *                          For example, *5b10ac8d82e05b22cc7d4ef5*.
     * @param string $username This parameter is no longer available.
     *                         See the "deprecation notice" for details.
     *                         @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $key This parameter is no longer available.
     *                    See the "deprecation notice" for details.
     *                    @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     */
    public function getUserGroups(
        string $accountId,
        ?string $username = null,
        ?string $key = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/user/groups',
            method: 'get',
            query: compact('accountId', 'username', 'key'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return.
     * @param int $maxResults The maximum number of items to return.
     */
    public function getAllUsersDefault(
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): true {
        return $this->call(
            uri: '/rest/api/3/users',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account
     * 
     * Privacy controls are applied to the response based on the users' preferences.
     * This could mean, for example, that the user's email address is hidden.
     * See the "Profile visibility overview" for more details
     * 
     * **"Permissions" required:** *Browse users and groups* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return.
     * @param int $maxResults The maximum number of items to return.
     */
    public function getAllUsers(
        ?int $startAt = 0,
        ?int $maxResults = 50,
    ): true {
        return $this->call(
            uri: '/rest/api/3/users/search',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            success: 200,
            schema: true,
        );
    }
}
