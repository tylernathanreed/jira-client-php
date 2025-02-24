<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ScreenSchemes
{
    /**
     * Returns a "paginated" list of screen schemes
     * 
     * Only screen schemes used in classic projects are returned
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param ?list<int> $id The list of screen scheme IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     * @param string $expand Use "expand" include additional information in the response.
     *                       This parameter accepts `issueTypeScreenSchemes` that, for each screen schemes, returns information about the issue type screen scheme the screen scheme is assigned to.
     * @param string $queryString String used to perform a case-insensitive partial match with screen scheme name.
     * @param 'name'|'-name'|'+name'|'id'|'-id'|'+id'|null $orderBy
     *        "Order" the results by a field:
     *         - `id` Sorts by screen scheme ID
     *         - `name` Sorts by screen scheme name.
     */
    public function getScreenSchemes(
        ?int $startAt = 0,
        ?int $maxResults = 25,
        ?array $id = null,
        ?string $expand = '',
        ?string $queryString = '',
        ?string $orderBy = null,
    ): Schema\PageBeanScreenScheme {
        return $this->call(
            uri: '/rest/api/3/screenscheme',
            method: 'get',
            query: compact('startAt', 'maxResults', 'id', 'expand', 'queryString', 'orderBy'),
            success: 200,
            schema: Schema\PageBeanScreenScheme::class,
        );
    }

    /**
     * Creates a screen scheme
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createScreenScheme(
        Schema\ScreenSchemeDetails $request,
    ): Schema\ScreenSchemeId {
        return $this->call(
            uri: '/rest/api/3/screenscheme',
            method: 'post',
            body: $request,
            success: 201,
            schema: Schema\ScreenSchemeId::class,
        );
    }

    /**
     * Updates a screen scheme.
     * Only screen schemes used in classic projects can be updated
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $screenSchemeId The ID of the screen scheme.
     */
    public function updateScreenScheme(
        Schema\UpdateScreenSchemeDetails $request,
        string $screenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screenscheme/{screenSchemeId}',
            method: 'put',
            body: $request,
            path: compact('screenSchemeId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Deletes a screen scheme.
     * A screen scheme cannot be deleted if it is used in an issue type screen scheme
     * 
     * Only screens schemes used in classic projects can be deleted
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $screenSchemeId The ID of the screen scheme.
     */
    public function deleteScreenScheme(
        string $screenSchemeId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/screenscheme/{screenSchemeId}',
            method: 'delete',
            path: compact('screenSchemeId'),
            success: 204,
            schema: true,
        );
    }
}
