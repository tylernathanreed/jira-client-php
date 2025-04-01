# Usernavproperties

DummyDescription

Source: [`Jira\Client\Operations\Usernavproperties`](/src/Operations/Usernavproperties.php)

## Operations

- [Get User Nav Property](#getUserNavProperty)
- [Set User Nav Property](#setUserNavProperty)

## Get User Nav Property
<a name="getUserNavProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-usernavproperties/#api-rest-api-3-user-nav4-opt-property-property-key-get

Returns the value of a user nav preference

Note: This operation fetches the property key value directly from RbacClient

**"Permissions" required:**

 - *Administer Jira* "global permission", to get a property from any user
 - Access to Jira, to get a property from the calling user's record.
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the user's property. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |

#### Response

Source: [`Jira\Client\Schema\UserNavPropertyJsonBean`](/docs/schema/user-nav-property-json-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` |  |
| `value` | `string` |  |


## Set User Nav Property
<a name="setUserNavProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-usernavproperties/#api-rest-api-3-user-nav4-opt-property-property-key-put

Sets the value of a Nav4 preference.
Use this resource to store Nav4 preference data against a user in the Identity service

**"Permissions" required:**

 - *Administer Jira* "global permission", to set a property on any user
 - Access to Jira, to set a property on the calling user's record.
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `propertyKey` | `string` | The key of the nav property. The maximum length is 255 characters. |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |

#### Response

`true`
