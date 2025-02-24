<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait JQLFunctionsApps
{
    /**
     * Returns the list of a function's precomputations along with information about when they were created, updated, and last used.
     * Each precomputation has a `value` \- the JQL fragment to replace the custom function clause with
     * 
     * **"Permissions" required:** This API is only accessible to apps and apps can only inspect their own functions
     * 
     * The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param ?list<string> $functionKey The function key in format:
     *                                    - Forge: `ari:cloud:ecosystem::extension/[App ID]/[Environment ID]/static/[Function key from manifest]`
     *                                    - Connect: `[App key]__[Module key]`
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $orderBy "Order" the results by a field:
     *                         - `functionKey` Sorts by the functionKey
     *                         - `used` Sorts by the used timestamp
     *                         - `created` Sorts by the created timestamp
     *                         - `updated` Sorts by the updated timestamp.
     */
    public function getPrecomputations(
        ?array $functionKey = null,
        ?int $startAt = 0,
        ?int $maxResults = 100,
        ?string $orderBy = null,
    ): Schema\PageBean2JqlFunctionPrecomputationBean {
        return $this->call(
            uri: '/rest/api/3/jql/function/computation',
            method: 'get',
            query: compact('functionKey', 'startAt', 'maxResults', 'orderBy'),
            success: 200,
            schema: Schema\PageBean2JqlFunctionPrecomputationBean::class,
        );
    }

    /**
     * Update the precomputation value of a function created by a Forge/Connect app
     * 
     * **"Permissions" required:** An API for apps to update their own precomputations
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param bool $skipNotFoundPrecomputations 
     */
    public function updatePrecomputations(
        Schema\JqlFunctionPrecomputationUpdateRequestBean $request,
        ?bool $skipNotFoundPrecomputations = false,
    ): Schema\JqlFunctionPrecomputationUpdateResponse {
        return $this->call(
            uri: '/rest/api/3/jql/function/computation',
            method: 'post',
            body: $request,
            query: compact('skipNotFoundPrecomputations'),
            success: 200,
            schema: Schema\JqlFunctionPrecomputationUpdateResponse::class,
        );
    }

    /**
     * Returns function precomputations by IDs, along with information about when they were created, updated, and last used.
     * Each precomputation has a `value` \- the JQL fragment to replace the custom function clause with
     * 
     * **"Permissions" required:** This API is only accessible to apps and apps can only inspect their own functions
     * 
     * The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param string $orderBy "Order" the results by a field:
     *                         - `functionKey` Sorts by the functionKey
     *                         - `used` Sorts by the used timestamp
     *                         - `created` Sorts by the created timestamp
     *                         - `updated` Sorts by the updated timestamp.
     */
    public function getPrecomputationsByID(
        Schema\JqlFunctionPrecomputationGetByIdRequest $request,
        ?string $orderBy = null,
    ): Schema\JqlFunctionPrecomputationGetByIdResponse {
        return $this->call(
            uri: '/rest/api/3/jql/function/computation/search',
            method: 'post',
            body: $request,
            query: compact('orderBy'),
            success: 200,
            schema: Schema\JqlFunctionPrecomputationGetByIdResponse::class,
        );
    }
}
