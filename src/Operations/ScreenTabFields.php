<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ScreenTabFields
{
    /**
     * Returns all fields for a screen tab
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission"
     *  - *Administer projects* "project permission" when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $projectKey The key of the project.
     */
    public function getAllScreenTabFields(
        int $screenId,
        int $tabId,
        ?string $projectKey = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields',
            method: 'get',
            query: compact('projectKey'),
            path: compact('screenId', 'tabId'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Adds a field to a screen tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     */
    public function addScreenTabField(
        Schema\AddFieldBean $request,
        int $screenId,
        int $tabId,
    ): Schema\ScreenableField {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields',
            method: 'post',
            body: $request,
            path: compact('screenId', 'tabId'),
            success: 200,
            schema: Schema\ScreenableField::class,
        );
    }

    /**
     * Removes a field from a screen tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $id The ID of the field.
     */
    public function removeScreenTabField(
        int $screenId,
        int $tabId,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}',
            method: 'delete',
            path: compact('screenId', 'tabId', 'id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Moves a screen tab field
     * 
     * If `after` and `position` are provided in the request, `position` is ignored
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $id The ID of the field.
     */
    public function moveScreenTabField(
        Schema\MoveFieldBean $request,
        int $screenId,
        int $tabId,
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}/fields/{id}/move',
            method: 'post',
            body: $request,
            path: compact('screenId', 'tabId', 'id'),
            success: 204,
            schema: true,
        );
    }
}
