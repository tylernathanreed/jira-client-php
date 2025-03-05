<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Screens
{
    /**
     * Returns a "paginated" list of the screens a field is used in
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the field to return screens for.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $expand Use "expand" to include additional information about screens in the response.
     *                       This parameter accepts `tab` which returns details about the screen tabs the field is used in.
     */
    public function getScreensForField(
        string $fieldId,
        ?int $startAt = 0,
        ?int $maxResults = 100,
        ?string $expand = null,
    ): Schema\PageBeanScreenWithTab {
        return $this->call(
            uri: '/rest/api/3/field/{fieldId}/screens',
            method: 'get',
            query: compact('startAt', 'maxResults', 'expand'),
            path: compact('fieldId'),
            success: 200,
            schema: Schema\PageBeanScreenWithTab::class,
        );
    }

    /**
     * Returns a "paginated" list of all screens or those specified by one or more screen IDs
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of screen IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     * @param string $queryString String used to perform a case-insensitive partial match with screen name.
     * @param ?list<'GLOBAL'|'TEMPLATE'|'PROJECT'> $scope The scope filter string.
     *                                                    To filter by multiple scope, provide an ampersand-separated list.
     *                                                    For example, `scope=GLOBAL&scope=PROJECT`.
     * @param 'name'|'-name'|'+name'|'id'|'-id'|'+id'|null $orderBy
     *        "Order" the results by a field:
     *         - `id` Sorts by screen ID
     *         - `name` Sorts by screen name.
     */
    public function getScreens(
        ?int $startAt = 0,
        ?int $maxResults = 100,
        ?array $id = null,
        ?string $queryString = '',
        ?array $scope = null,
        ?string $orderBy = null,
    ): Schema\PageBeanScreen {
        return $this->call(
            uri: '/rest/api/3/screens',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'queryString', 'scope', 'orderBy'),
            success: 200,
            schema: Schema\PageBeanScreen::class,
        );
    }

    /**
     * Creates a screen with a default field tab
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createScreen(
        Schema\ScreenDetails $request,
    ): Schema\Screen {
        return $this->call(
            uri: '/rest/api/3/screens',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\Screen::class,
        );
    }

    /**
     * Adds a field to the default tab of the default screen
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $fieldId The ID of the field.
     */
    public function addFieldToDefaultScreen(
        string $fieldId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/addToDefault/{fieldId}',
            method: 'post',
            path: compact('fieldId'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Updates a screen.
     * Only screens used in classic projects can be updated
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     */
    public function updateScreen(
        Schema\UpdateScreenDetails $request,
        int $screenId,
    ): Schema\Screen {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}',
            method: 'put',
            body: $request,
            path: compact('screenId'),
            success: 200,
            schema: Schema\Screen::class,
        );
    }

    /**
     * Deletes a screen.
     * A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft
     * 
     * Only screens used in classic projects can be deleted.
     * 
     * @param int $screenId The ID of the screen.
     */
    public function deleteScreen(
        int $screenId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}',
            method: 'delete',
            path: compact('screenId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the fields that can be added to a tab on a screen
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $screenId The ID of the screen.
     * 
     * @return list<Schema\ScreenableField>
     */
    public function getAvailableScreenFields(
        int $screenId,
    ): array {
        return $this->call(
            uri: '/rest/api/3/screens/{screenId}/availableFields',
            method: 'get',
            path: compact('screenId'),
            success: 200,
            schema: [Schema\ScreenableField::class],
        );
    }
}
