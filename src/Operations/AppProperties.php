<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait AppProperties
{
    /**
     * Gets all the properties of an app
     * 
     * **"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
     * Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).
     * 
     * @param string $addonKey The key of the app, as defined in its descriptor.
     */
    public function getAddonProperties(
        string $addonKey,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/atlassian-connect/1/addons/{addonKey}/properties',
            method: 'get',
            path: compact('addonKey'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the key and value of an app's property
     * 
     * **"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
     * Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).
     * 
     * @param string $addonKey The key of the app, as defined in its descriptor.
     * @param string $propertyKey The key of the property.
     */
    public function getAddonProperty(
        string $addonKey,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
            method: 'get',
            path: compact('addonKey', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of an app's property.
     * Use this resource to store custom data for your app
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * **"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
     * Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).
     * 
     * @link http://tools.ietf.org/html/rfc4627
     * 
     * @param string $addonKey The key of the app, as defined in its descriptor.
     * @param string $propertyKey The key of the property.
     */
    public function putAddonProperty(
        string $addonKey,
        string $propertyKey,
    ): Schema\OperationMessage {
        return $this->call(
            uri: '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
            method: 'put',
            path: compact('addonKey', 'propertyKey'),
            success: 200,
            schema: Schema\OperationMessage::class,
        );
    }

    /**
     * Deletes an app's property
     * 
     * **"Permissions" required:** Only a Connect app whose key matches `addonKey` can make this request
     * Additionally, Forge apps can access Connect app properties (stored against the same `app.connect.key`).
     * 
     * @param string $addonKey The key of the app, as defined in its descriptor.
     * @param string $propertyKey The key of the property.
     */
    public function deleteAddonProperty(
        string $addonKey,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
            method: 'delete',
            path: compact('addonKey', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Sets the value of a Forge app's property
     * These values can be retrieved in "Jira expressions"
     * through the `app` "context variable"
     * They are also available in "entity property display conditions"
     * 
     * For other use cases, use the "Storage API"
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * **"Permissions" required:** Only Forge apps can make this request
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @link /cloud/jira/platform/jira-expressions/
     * @link /cloud/jira/platform/jira-expressions/#context-variables
     * @link /platform/forge/manifest-reference/display-conditions/entity-property-conditions/
     * @link /platform/forge/runtime-reference/storage-api/
     * @link http://tools.ietf.org/html/rfc4627
     * 
     * @param string $propertyKey The key of the property.
     */
    public function putForgeAppProperty(
        string $propertyKey,
    ): Schema\OperationMessage {
        return $this->call(
            uri: '/rest/forge/1/app/properties/{propertyKey}',
            method: 'put',
            path: compact('propertyKey'),
            success: 200,
            schema: Schema\OperationMessage::class,
        );
    }

    /**
     * Deletes a Forge app's property
     * 
     * **"Permissions" required:** Only Forge apps can make this request
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @param string $propertyKey The key of the property.
     */
    public function deleteForgeAppProperty(
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/forge/1/app/properties/{propertyKey}',
            method: 'delete',
            path: compact('propertyKey'),
            success: 204,
            schema: true,
        );
    }
}
