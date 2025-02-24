<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait UIModificationsApps
{
    /**
     * Gets UI modifications.
     * UI modifications can only be retrieved by Forge apps
     * 
     * **"Permissions" required:** None
     * 
     * The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $expand Use expand to include additional information in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `data` Returns UI modification data
     *                        - `contexts` Returns UI modification contexts.
     */
    public function getUiModifications(
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $expand = null,
    ): Schema\PageBeanUiModificationDetails {
        return $this->call(
            uri: '/rest/api/3/uiModifications',
            method: 'get',
            query: compact('startAt', 'maxResults', 'expand'),
            success: 200,
            schema: Schema\PageBeanUiModificationDetails::class,
        );
    }

    /**
     * Creates a UI modification.
     * UI modification can only be created by Forge apps
     * 
     * Each app can define up to 3000 UI modifications.
     * Each UI modification can define up to 1000 contexts.
     * The same context can be assigned to maximum 100 UI modifications
     * 
     * **"Permissions" required:**
     * 
     *  - *None* if the UI modification is created without contexts
     *  - *Browse projects* "project permission" for one or more projects, if the UI modification is created with contexts
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     */
    public function createUiModification(
        Schema\CreateUiModificationDetails $request,
    ): Schema\UiModificationIdentifiers {
        return $this->call(
            uri: '/rest/api/3/uiModifications',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\UiModificationIdentifiers::class,
        );
    }

    /**
     * Updates a UI modification.
     * UI modification can only be updated by Forge apps
     * 
     * Each UI modification can define up to 1000 contexts.
     * The same context can be assigned to maximum 100 UI modifications
     * 
     * **"Permissions" required:**
     * 
     *  - *None* if the UI modification is created without contexts
     *  - *Browse projects* "project permission" for one or more projects, if the UI modification is created with contexts
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $uiModificationId The ID of the UI modification.
     */
    public function updateUiModification(
        Schema\UpdateUiModificationDetails $request,
        string $uiModificationId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/uiModifications/{uiModificationId}',
            method: 'put',
            body: $request,
            path: compact('uiModificationId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a UI modification.
     * All the contexts that belong to the UI modification are deleted too.
     * UI modification can only be deleted by Forge apps
     * 
     * **"Permissions" required:** None
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param string $uiModificationId The ID of the UI modification.
     */
    public function deleteUiModification(
        string $uiModificationId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/uiModifications/{uiModificationId}',
            method: 'delete',
            path: compact('uiModificationId'),
            success: 204,
            schema: true,
        );
    }
}
