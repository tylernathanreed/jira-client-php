<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Myself
{
    /**
     * Returns the value of a preference of the current user
     * 
     * Note that these keys are deprecated:
     * 
     *  - *jira.user.locale* The locale of the user.
     * By default this is not set and the user takes the locale of the instance
     *  - *jira.user.timezone* The time zone of the user.
     * By default this is not set and the user takes the timezone of the instance
     * 
     * These system preferences keys will be deprecated by 15/07/2024.
     * You can still retrieve these keys, but it will not have any impact on Notification behaviour
     * 
     *  - *user.notifications.watcher* Whether the user gets notified when they are watcher
     *  - *user.notifications.assignee* Whether the user gets notified when they are assignee
     *  - *user.notifications.reporter* Whether the user gets notified when they are reporter
     *  - *user.notifications.mentions* Whether the user gets notified when they are mentions
     * 
     * Use " Update a user profile" from the user management REST API to manage timezone and locale instead
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch
     * 
     * @param string $key The key of the preference.
     */
    public function getPreference(
        string $key,
    ): true {
        return $this->call(
            uri: '/rest/api/3/mypreferences',
            method: 'get',
            query: compact('key'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Creates a preference for the user or updates a preference's value by sending a plain text string.
     * For example, `false`.
     * An arbitrary preference can be created with the value containing up to 255 characters.
     * In addition, the following keys define system preferences that can be set or created:
     * 
     *  - *user.notifications.mimetype* The mime type used in notifications sent to the user.
     * Defaults to `html`
     *  - *user.default.share.private* Whether new " filters" are set to private.
     * Defaults to `true`
     *  - *user.keyboard.shortcuts.disabled* Whether keyboard shortcuts are disabled.
     * Defaults to `false`
     *  - *user.autowatch.disabled* Whether the user automatically watches issues they create or add a comment to.
     * By default, not set: the user takes the instance autowatch setting
     *  - *user.notifiy.own.changes* Whether the user gets notified of their own changes
     * 
     * Note that these keys are deprecated:
     * 
     *  - *jira.user.locale* The locale of the user.
     * By default, not set.
     * The user takes the instance locale
     *  - *jira.user.timezone* The time zone of the user.
     * By default, not set.
     * The user takes the instance timezone
     * 
     * These system preferences keys will be deprecated by 15/07/2024.
     * You can still use these keys to create arbitrary preferences, but it will not have any impact on Notification behaviour
     * 
     *  - *user.notifications.watcher* Whether the user gets notified when they are watcher
     *  - *user.notifications.assignee* Whether the user gets notified when they are assignee
     *  - *user.notifications.reporter* Whether the user gets notified when they are reporter
     *  - *user.notifications.mentions* Whether the user gets notified when they are mentions
     * 
     * Use " Update a user profile" from the user management REST API to manage timezone and locale instead
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://confluence.atlassian.com/x/eQiiLQ
     * @link https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch
     * 
     * @param string $key The key of the preference.
     *                    The maximum length is 255 characters.
     */
    public function setPreference(
        string $key,
    ): true {
        return $this->call(
            uri: '/rest/api/3/mypreferences',
            method: 'put',
            query: compact('key'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a preference of the user, which restores the default value of system defined settings
     * 
     * Note that these keys are deprecated:
     * 
     *  - *jira.user.locale* The locale of the user.
     * By default, not set.
     * The user takes the instance locale
     *  - *jira.user.timezone* The time zone of the user.
     * By default, not set.
     * The user takes the instance timezone
     * 
     * Use " Update a user profile" from the user management REST API to manage timezone and locale instead
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch
     * 
     * @param string $key The key of the preference.
     */
    public function removePreference(
        string $key,
    ): true {
        return $this->call(
            uri: '/rest/api/3/mypreferences',
            method: 'delete',
            query: compact('key'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the locale for the user
     * 
     * If the user has no language preference set (which is the default setting) or this resource is accessed anonymous, the browser locale detected by Jira is returned.
     * Jira detects the browser locale using the *Accept-Language* header in the request.
     * However, if this doesn't match a locale available Jira, the site default locale is returned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     */
    public function getLocale(): Schema\Locale
    {
        return $this->call(
            uri: '/rest/api/3/mypreferences/locale',
            method: 'get',
            success: 200,
            schema: Schema\Locale::class,
        );
    }

    /**
     * Deprecated, use " Update a user profile" from the user management REST API instead
     * 
     * Sets the locale of the user.
     * The locale must be one supported by the instance of Jira
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch
     */
    public function setLocale(
        Schema\Locale $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/mypreferences/locale',
            method: 'put',
            body: $request,
            success: 204,
            schema: true,
        );
    }

    /**
     * Deprecated, use " Update a user profile" from the user management REST API instead
     * 
     * Deletes the locale of the user, which restores the default setting
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch
     */
    public function deleteLocale(): true
    {
        return $this->call(
            uri: '/rest/api/3/mypreferences/locale',
            method: 'delete',
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns details for the current user
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $expand Use "expand" to include additional information about user in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `groups` Returns all groups, including nested groups, the user belongs to
     *                        - `applicationRoles` Returns the application roles the user is assigned to.
     */
    public function getCurrentUser(
        ?string $expand = null,
    ): Schema\User {
        return $this->call(
            uri: '/rest/api/3/myself',
            method: 'get',
            query: compact('expand'),
            success: 200,
            schema: Schema\User::class,
        );
    }
}
