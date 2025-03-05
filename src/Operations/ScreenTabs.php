<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ScreenTabs
{
    /**
     * Returns the list of tabs for a bulk of screens
     * 
     * **"Permissions" required:**
     * 
     *  - *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param ?list<int> $screenId The list of screen IDs.
     *                             To include multiple screen IDs, provide an ampersand-separated list.
     *                             For example, `screenId=10000&screenId=10001`.
     * @param ?list<int> $tabId The list of tab IDs.
     *                          To include multiple tab IDs, provide an ampersand-separated list.
     *                          For example, `tabId=10000&tabId=10001`.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResult The maximum number of items to return per page.
     *                       The maximum number is 100,
     */
    public function getBulkScreenTabs(
        ?array $screenId = null,
        ?array $tabId = null,
        ?int $startAt = 0,
        ?int $maxResult = 100,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/tabs',
            method: 'get',
            query: compact('screenId', 'tabId', 'startAt', 'maxResult'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns the list of tabs for a screen
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
     * @param string $projectKey The key of the project.
     * 
     * @return list<Schema\ScreenableTab>
     */
    public function getAllScreenTabs(
        int $screenId,
        ?string $projectKey = null,
    ): array {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs',
            method: 'get',
            query: compact('projectKey'),
            path: compact('screenId'),
            success: 200,
            schema: [Schema\ScreenableTab::class],
        );
    }

    /**
     * Creates a tab for a screen
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     */
    public function addScreenTab(
        Schema\ScreenableTab $request,
        int $screenId,
    ): Schema\ScreenableTab {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs',
            method: 'post',
            body: $request,
            path: compact('screenId'),
            success: 200,
            schema: Schema\ScreenableTab::class,
        );
    }

    /**
     * Updates the name of a screen tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     */
    public function renameScreenTab(
        Schema\ScreenableTab $request,
        int $screenId,
        int $tabId,
    ): Schema\ScreenableTab {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}',
            method: 'put',
            body: $request,
            path: compact('screenId', 'tabId'),
            success: 200,
            schema: Schema\ScreenableTab::class,
        );
    }

    /**
     * Deletes a screen tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     */
    public function deleteScreenTab(
        int $screenId,
        int $tabId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}',
            method: 'delete',
            path: compact('screenId', 'tabId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Moves a screen tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param int $pos The position of tab.
     *                 The base index is 0.
     */
    public function moveScreenTab(
        int $screenId,
        int $tabId,
        int $pos,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/tabs/{tabId}/move/{pos}',
            method: 'post',
            path: compact('screenId', 'tabId', 'pos'),
            success: 204,
            schema: true,
        );
    }
}
