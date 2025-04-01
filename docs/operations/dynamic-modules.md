# Dynamic Modules

Source: [`Jira\Client\Operations\DynamicModules`](/src/Operations/DynamicModules.php)

## Operations

- [Get Modules](#DynamicModulesResource.getModules_get)
- [Register Modules](#DynamicModulesResource.registerModules_post)
- [Remove Modules](#DynamicModulesResource.removeModules_delete)

## Get Modules
<a name="DynamicModulesResource.getModules_get"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dynamic-modules/#api-rest-atlassian-connect-1-app-module-dynamic-get

Returns all modules registered dynamically by the calling app

**"Permissions" required:** Only Connect apps can make this request.


### Request

#### Response

Source: [`Jira\Client\Schema\ConnectModules`](/docs/schema/connect-modules.md)

| Property | Type | Description |
| --- | --- | --- |
| `modules` | [`list<ConnectModule>`](/docs/schema/connect-module.md) | A list of app modules in the same format as the `modules` property in the<br/>[app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/). |


## Register Modules
<a name="DynamicModulesResource.registerModules_post"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dynamic-modules/#api-rest-atlassian-connect-1-app-module-dynamic-post

Registers a list of modules

**"Permissions" required:** Only Connect apps can make this request.


### Request

#### Request Body

Source: [`Jira\Client\Schema\ConnectModules`](/docs/schema/connect-modules.md)

| Property | Type | Description |
| --- | --- | --- |
| `modules` | [`list<ConnectModule>`](/docs/schema/connect-module.md) | A list of app modules in the same format as the `modules` property in the<br/>[app descriptor](https://developer.atlassian.com/cloud/jira/platform/app-descriptor/). |

#### Response

`true`
## Remove Modules
<a name="DynamicModulesResource.removeModules_delete"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dynamic-modules/#api-rest-atlassian-connect-1-app-module-dynamic-delete

Remove all or a list of modules registered by the calling app

**"Permissions" required:** Only Connect apps can make this request.

### Example

```php
/** @var true $response */
$response = $client->DynamicModulesResource.removeModules_delete(
    moduleKey: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `moduleKey` | `?list<string>` | The key of the module to remove. To include multiple module keys, provide multiple copies of this parameter.<br/>For example, `moduleKey=dynamic-attachment-entity-property&moduleKey=dynamic-select-field`.<br/>Nonexistent keys are ignored. |

#### Response

`true`
