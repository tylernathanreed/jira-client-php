<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueNotificationSchemes
{
    /**
     * Returns a "paginated" list of "notification schemes" ordered by the display name
     * 
     * *Note that you should allow for events without recipients to appear in responses.*
     * 
     * **"Permissions" required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with a notification scheme for it to be returned.
     * 
     * @link https://confluence.atlassian.com/x/8YdKLg
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $id The list of notification schemes IDs to be filtered by
     * @param ?list<string> $projectId The list of projects IDs to be filtered by
     * @param bool $onlyDefault When set to true, returns only the default notification scheme.
     *                          If you provide project IDs not associated with the default, returns an empty page.
     *                          The default value is false.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about any custom fields assigned to receive an event
     *                        - `group` Returns information about any groups assigned to receive an event
     *                        - `notificationSchemeEvents` Returns a list of event associations.
     *                       This list is returned for all expandable information
     *                        - `projectRole` Returns information about any project roles assigned to receive an event
     *                        - `user` Returns information about any users assigned to receive an event
     */
    public function getNotificationSchemes(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $id = null,
        ?array $projectId = null,
        ?bool $onlyDefault = false,
        ?string $expand = null,
    ): Schema\PageBeanNotificationScheme {
        return $this->call(
            uri: '/rest/api/3/notificationscheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'projectId', 'onlyDefault', 'expand'),
            success: 200,
            schema: Schema\PageBeanNotificationScheme::class,
        );
    }

    /**
     * Creates a notification scheme with notifications.
     * You can create up to 1000 notifications per request
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createNotificationScheme(
        Schema\CreateNotificationSchemeDetails $request,
    ): Schema\NotificationSchemeId {
        return $this->call(
            uri: '/rest/api/3/notificationscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\NotificationSchemeId::class,
        );
    }

    /**
     * Returns a "paginated" mapping of project that have notification scheme assigned.
     * You can provide either one or multiple notification scheme IDs or project IDs to filter by.
     * If you don't provide any, this will return a list of all mappings.
     * Note that only company-managed (classic) projects are supported.
     * This is because team-managed projects don't have a concept of a default notification scheme.
     * The mappings are ordered by projectId
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $startAt The index of the first item to return in a page of results (page offset).
     * @param string $maxResults The maximum number of items to return per page.
     * @param ?list<string> $notificationSchemeId The list of notifications scheme IDs to be filtered out
     * @param ?list<string> $projectId The list of project IDs to be filtered out
     */
    public function getNotificationSchemeToProjectMappings(
        ?string $startAt = '0',
        ?string $maxResults = '50',
        ?array $notificationSchemeId = null,
        ?array $projectId = null,
    ): Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/project',
            method: 'get',
            query: compact('startAt', 'maxResults', 'notificationSchemeId', 'projectId'),
            success: 200,
            schema: Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean::class,
        );
    }

    /**
     * Returns a "notification scheme", including the list of events and the recipients who will receive notifications for those events
     * 
     * **"Permissions" required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with the notification scheme.
     * 
     * @link https://confluence.atlassian.com/x/8YdKLg
     * 
     * @param int $id The ID of the notification scheme.
     *                Use "Get notification schemes paginated" to get a list of notification scheme IDs.
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `all` Returns all expandable information
     *                        - `field` Returns information about any custom fields assigned to receive an event
     *                        - `group` Returns information about any groups assigned to receive an event
     *                        - `notificationSchemeEvents` Returns a list of event associations.
     *                       This list is returned for all expandable information
     *                        - `projectRole` Returns information about any project roles assigned to receive an event
     *                        - `user` Returns information about any users assigned to receive an event
     */
    public function getNotificationScheme(
        int $id,
        ?string $expand = null,
    ): Schema\NotificationScheme {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/{id}',
            method: 'get',
            query: compact('expand'),
            path: compact('id'),
            success: 200,
            schema: Schema\NotificationScheme::class,
        );
    }

    /**
     * Updates a notification scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the notification scheme.
     */
    public function updateNotificationScheme(
        Schema\UpdateNotificationSchemeDetails $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/{id}',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Adds notifications to a notification scheme.
     * You can add up to 1000 notifications per request
     * 
     * *Deprecated: The notification type `EmailAddress` is no longer supported in Cloud.
     * Refer to the "changelog" for more details.*
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-1031
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the notification scheme.
     */
    public function addNotifications(
        Schema\AddNotificationsDetails $request,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/{id}/notification',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a notification scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $notificationSchemeId The ID of the notification scheme.
     */
    public function deleteNotificationScheme(
        string $notificationSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/{notificationSchemeId}',
            method: 'delete',
            path: compact('notificationSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes a notification from a notification scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $notificationSchemeId The ID of the notification scheme.
     * @param string $notificationId The ID of the notification.
     */
    public function removeNotificationFromNotificationScheme(
        string $notificationSchemeId,
        string $notificationId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/notificationscheme/{notificationSchemeId}/notification/{notificationId}',
            method: 'delete',
            path: compact('notificationSchemeId', 'notificationId'),
            success: 204,
            schema: true,
        );
    }
}
