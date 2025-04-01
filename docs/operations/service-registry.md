# Service Registry

Source: [`Jira\Client\Operations\ServiceRegistry`](/src/Operations/ServiceRegistry.php)

## Operations

- [Retrieve The Attributes Of Service Registries](#ServiceRegistryResource.services_get)

## Retrieve The Attributes Of Service Registries
<a name="ServiceRegistryResource.services_get"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-service-registry/#api-rest-atlassian-connect-1-service-registry-get

Retrieve the attributes of given service registries

**"Permissions" required:** Only Connect apps can make this request and the servicesIds belong to the tenant you are requesting


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `serviceIds` | `list<string>` | The ID of the services (the strings starting with "b:" need to be decoded in Base64). |

#### Response
