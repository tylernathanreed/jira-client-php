<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Webhooks
{
    /**
     * Returns a "paginated" list of the webhooks registered by the calling app
     * 
     * **"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps
     * 
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getDynamicWebhooksForApp(
        ?int $startAt = 0,
        ?int $maxResults = 100,
    ): Schema\PageBeanWebhook {
        return $this->call(
            uri: '/rest/api/3/webhook',
            method: 'get',
            query: compact('startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageBeanWebhook::class,
        );
    }

    /**
     * Registers webhooks
     * 
     * **NOTE:** for non-public OAuth apps, webhooks are delivered only if there is a match between the app owner and the user who registered a dynamic webhook
     * 
     * **"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps
     */
    public function registerDynamicWebhooks(
        Schema\WebhookRegistrationDetails $request,
    ): Schema\ContainerForRegisteredWebhooks {
        return $this->call(
            uri: '/rest/api/3/webhook',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\ContainerForRegisteredWebhooks::class,
        );
    }

    /**
     * Removes webhooks by ID.
     * Only webhooks registered by the calling app are removed.
     * If webhooks created by other apps are specified, they are ignored
     * 
     * **"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps
     */
    public function deleteWebhookById(
        Schema\ContainerForWebhookIDs $request,
    ): true {
        return $this->call(
            uri: '/rest/api/3/webhook',
            method: 'delete',
            body: $request,
            success: 202,
            schema: true,
        );
    }

    /**
     * Returns webhooks that have recently failed to be delivered to the requesting app after the maximum number of retries
     * 
     * After 72 hours the failure may no longer be returned by this operation
     * 
     * The oldest failure is returned first
     * 
     * This method uses a cursor-based pagination.
     * To request the next page use the failure time of the last webhook on the list as the `failedAfter` value or use the URL provided in `next`
     * 
     * **"Permissions" required:** Only "Connect apps" can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
     * 
     * @param int $maxResults The maximum number of webhooks to return per page.
     *                        If obeying the maxResults directive would result in records with the same failure time being split across pages, the directive is ignored and all records with the same failure time included on the page.
     * @param int $after The time after which any webhook failure must have occurred for the record to be returned, expressed as milliseconds since the UNIX epoch.
     */
    public function getFailedWebhooks(
        ?int $maxResults = null,
        ?int $after = null,
    ): Schema\FailedWebhooks {
        return $this->call(
            uri: '/rest/api/3/webhook/failed',
            method: 'get',
            query: compact('maxResults', 'after'),
            success: 200,
            schema: Schema\FailedWebhooks::class,
        );
    }

    /**
     * Extends the life of webhook.
     * Webhooks registered through the REST API expire after 30 days.
     * Call this operation to keep them alive
     * 
     * Unrecognized webhook IDs (those that are not found or belong to other apps) are ignored
     * 
     * **"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps
     */
    public function refreshWebhooks(
        Schema\ContainerForWebhookIDs $request,
    ): Schema\WebhooksExpirationDate {
        return $this->call(
            uri: '/rest/api/3/webhook/refresh',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\WebhooksExpirationDate::class,
        );
    }
}
