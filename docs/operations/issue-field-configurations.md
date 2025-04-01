# Issue Field Configurations

DummyDescription

Source: [`Jira\Client\Operations\IssueFieldConfigurations`](/src/Operations/IssueFieldConfigurations.php)

## Operations

- [Get All Field Configurations](#getAllFieldConfigurations)
- [Create Field Configuration](#createFieldConfiguration)
- [Update Field Configuration](#updateFieldConfiguration)
- [Delete Field Configuration](#deleteFieldConfiguration)
- [Get Field Configuration Items](#getFieldConfigurationItems)
- [Update Field Configuration Items](#updateFieldConfigurationItems)
- [Get All Field Configuration Schemes](#getAllFieldConfigurationSchemes)
- [Create Field Configuration Scheme](#createFieldConfigurationScheme)
- [Get Field Configuration Issue Type Items](#getFieldConfigurationSchemeMappings)
- [Get Field Configuration Schemes For Projects](#getFieldConfigurationSchemeProjectMapping)
- [Assign Field Configuration Scheme To Project](#assignFieldConfigurationSchemeToProject)
- [Update Field Configuration Scheme](#updateFieldConfigurationScheme)
- [Delete Field Configuration Scheme](#deleteFieldConfigurationScheme)
- [Assign Issue Types To Field Configurations](#setFieldConfigurationSchemeMapping)
- [Remove Issue Types From Field Configuration Scheme](#removeIssueTypesFromGlobalFieldConfigurationScheme)

## Get All Field Configurations
<a name="getAllFieldConfigurations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-get

Returns a "paginated" list of field configurations.
The list can be for all field configurations or a subset determined by any combination of these criteria:

 - a list of field configuration item IDs
 - whether the field configuration is a default
 - whether the field configuration name or description contains a query string

Only field configurations used in company-managed (classic) projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanFieldConfigurationDetails $response */
$response = $client->getAllFieldConfigurations(
    startAt: 0,
    maxResults: 50,
    id: null,
    isDefault: false,
    query: '',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of field configuration IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |
| `isDefault` | `?bool` | If *true* returns default field configurations only. |
| `query` | `?string` | The query string used to match against field configuration names and descriptions. |

#### Response

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationDetails`](/docs/schema/page-bean-field-configuration-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationDetails>`](/docs/schema/field-configuration-details.md) | The list of items. |


## Create Field Configuration
<a name="createFieldConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-post

Creates a field configuration.
The field configuration is created with the same field properties as the default configuration, with all the fields being optional

This operation can only create configurations for use in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\FieldConfiguration $response */
$response = $client->createFieldConfiguration(new Schema\FieldConfigurationDetails(
    description: 'My field configuration description',
    name: 'My Field Configuration',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldConfigurationDetails`](/docs/schema/field-configuration-details.md)

Details of a field configuration.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the field configuration. Must be unique. |
| `description` | `string` | The description of the field configuration. |

#### Response

Source: [`Jira\Client\Schema\FieldConfiguration`](/docs/schema/field-configuration.md)

Details of a field configuration.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the field configuration. |
| `id` | `int` | The ID of the field configuration. |
| `name` | `string` | The name of the field configuration. |
| `isDefault` | `bool` | Whether the field configuration is the default. |


## Update Field Configuration
<a name="updateFieldConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-id-put

Updates a field configuration.
The name and the description provided in the request override the existing values

This operation can only update configurations used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateFieldConfiguration(
    request: new Schema\FieldConfigurationDetails(
        description: 'A brand new description',
        name: 'My Modified Field Configuration',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldConfigurationDetails`](/docs/schema/field-configuration-details.md)

Details of a field configuration.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the field configuration. Must be unique. |
| `description` | `string` | The description of the field configuration. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration. |

#### Response

`true`
## Delete Field Configuration
<a name="deleteFieldConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-id-delete

Deletes a field configuration

This operation can only delete configurations used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteFieldConfiguration(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration. |

#### Response

`true`
## Get Field Configuration Items
<a name="getFieldConfigurationItems"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-id-fields-get

Returns a "paginated" list of all fields for a configuration

Only the fields from configurations used in company-managed (classic) projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanFieldConfigurationItem $response */
$response = $client->getFieldConfigurationItems(
    id: 1234,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationItem`](/docs/schema/page-bean-field-configuration-item.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationItem>`](/docs/schema/field-configuration-item.md) | The list of items. |


## Update Field Configuration Items
<a name="updateFieldConfigurationItems"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfiguration-id-fields-put

Updates fields in a field configuration.
The properties of the field configuration fields provided override the existing values

This operation can only update field configurations used in company-managed (classic) projects

The operation can set the renderer for text fields to the default text renderer (`text-renderer`) or wiki style renderer (`wiki-renderer`).
However, the renderer cannot be updated for fields using the autocomplete renderer (`autocomplete-renderer`)

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateFieldConfigurationItems(
    request: new Schema\FieldConfigurationItemsDetails(
        fieldConfigurationItems: [
                [
                    'description' => 'The new description of this item.',
                    'id' => 'customfield_10012',
                    'isHidden' => '',
                ],
                [
                    'id' => 'customfield_10011',
                    'isRequired' => '1',
                ],
                [
                    'description' => 'Another new description.',
                    'id' => 'customfield_10010',
                    'isHidden' => '',
                    'isRequired' => '',
                    'renderer' => 'wiki-renderer',
                ],
            ],
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldConfigurationItemsDetails`](/docs/schema/field-configuration-items-details.md)

Details of field configuration items.

| Property | Type | Description |
| --- | --- | --- |
| `fieldConfigurationItems` | [`list<FieldConfigurationItem>`](/docs/schema/field-configuration-item.md) | Details of fields in a field configuration. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration. |

#### Response

`true`
## Get All Field Configuration Schemes
<a name="getAllFieldConfigurationSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-get

Returns a "paginated" list of field configuration schemes

Only field configuration schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanFieldConfigurationScheme $response */
$response = $client->getAllFieldConfigurationSchemes(
    startAt: 0,
    maxResults: 50,
    id: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of field configuration scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationScheme`](/docs/schema/page-bean-field-configuration-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationScheme>`](/docs/schema/field-configuration-scheme.md) | The list of items. |


## Create Field Configuration Scheme
<a name="createFieldConfigurationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-post

Creates a field configuration scheme

This operation can only create field configuration schemes used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\FieldConfigurationScheme $response */
$response = $client->createFieldConfigurationScheme(new Schema\UpdateFieldConfigurationSchemeDetails(
    description: 'We can use this one for software projects.',
    name: 'Field Configuration Scheme for software related projects',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateFieldConfigurationSchemeDetails`](/docs/schema/update-field-configuration-scheme-details.md)

The details of the field configuration scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the field configuration scheme. The name must be unique. |
| `description` | `string` | The description of the field configuration scheme. |

#### Response

Source: [`Jira\Client\Schema\FieldConfigurationScheme`](/docs/schema/field-configuration-scheme.md)

Details of a field configuration scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the field configuration scheme. |
| `name` | `string` | The name of the field configuration scheme. |
| `description` | `string` | The description of the field configuration scheme. |


## Get Field Configuration Issue Type Items
<a name="getFieldConfigurationSchemeMappings"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-mapping-get

Returns a "paginated" list of field configuration issue type items

Only items used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanFieldConfigurationIssueTypeItem $response */
$response = $client->getFieldConfigurationSchemeMappings(
    startAt: 0,
    maxResults: 50,
    fieldConfigurationSchemeId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `fieldConfigurationSchemeId` | `?list<int>` | The list of field configuration scheme IDs. To include multiple field configuration schemes separate IDs with ampersand: `fieldConfigurationSchemeId=10000&fieldConfigurationSchemeId=10001`. |

#### Response

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationIssueTypeItem`](/docs/schema/page-bean-field-configuration-issue-type-item.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationIssueTypeItem>`](/docs/schema/field-configuration-issue-type-item.md) | The list of items. |


## Get Field Configuration Schemes For Projects
<a name="getFieldConfigurationSchemeProjectMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-project-get

Returns a "paginated" list of field configuration schemes and, for each scheme, a list of the projects that use it

The list is sorted by field configuration scheme ID.
The first item contains the list of project IDs assigned to the default field configuration scheme

Only field configuration schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanFieldConfigurationSchemeProjects $response */
$response = $client->getFieldConfigurationSchemeProjectMapping(
    projectId: [1234],
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `list<int>` | The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanFieldConfigurationSchemeProjects`](/docs/schema/page-bean-field-configuration-scheme-projects.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FieldConfigurationSchemeProjects>`](/docs/schema/field-configuration-scheme-projects.md) | The list of items. |


## Assign Field Configuration Scheme To Project
<a name="assignFieldConfigurationSchemeToProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-project-put

Assigns a field configuration scheme to a project.
If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme

Field configuration schemes can only be assigned to classic projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignFieldConfigurationSchemeToProject(new Schema\FieldConfigurationSchemeProjectAssociation(
    fieldConfigurationSchemeId: '10000',
    projectId: '10000',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldConfigurationSchemeProjectAssociation`](/docs/schema/field-configuration-scheme-project-association.md)

Associated field configuration scheme and project.

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `string` | The ID of the project. |
| `fieldConfigurationSchemeId` | `string` | The ID of the field configuration scheme. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme. |

#### Response

`true`
## Update Field Configuration Scheme
<a name="updateFieldConfigurationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-id-put

Updates a field configuration scheme

This operation can only update field configuration schemes used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateFieldConfigurationScheme(
    request: new Schema\UpdateFieldConfigurationSchemeDetails(
        description: 'We can use this one for software projects.',
        name: 'Field Configuration Scheme for software related projects',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateFieldConfigurationSchemeDetails`](/docs/schema/update-field-configuration-scheme-details.md)

The details of the field configuration scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the field configuration scheme. The name must be unique. |
| `description` | `string` | The description of the field configuration scheme. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration scheme. |

#### Response

`true`
## Delete Field Configuration Scheme
<a name="deleteFieldConfigurationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-id-delete

Deletes a field configuration scheme

This operation can only delete field configuration schemes used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteFieldConfigurationScheme(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration scheme. |

#### Response

`true`
## Assign Issue Types To Field Configurations
<a name="setFieldConfigurationSchemeMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-id-mapping-put

Assigns issue types to field configurations on field configuration scheme

This operation can only modify field configuration schemes used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setFieldConfigurationSchemeMapping(
    request: new Schema\AssociateFieldConfigurationsWithIssueTypesRequest(
        mappings: [
                [
                    'fieldConfigurationId' => '10000',
                    'issueTypeId' => 'default',
                ],
                [
                    'fieldConfigurationId' => '10002',
                    'issueTypeId' => '10001',
                ],
                [
                    'fieldConfigurationId' => '10001',
                    'issueTypeId' => '10002',
                ],
            ],
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AssociateFieldConfigurationsWithIssueTypesRequest`](/docs/schema/associate-field-configurations-with-issue-types-request.md)

Details of a field configuration to issue type mappings.

| Property | Type | Description |
| --- | --- | --- |
| `mappings` | [`list<FieldConfigurationToIssueTypeMapping>`](/docs/schema/field-configuration-to-issue-type-mapping.md) | Field configuration to issue type mappings. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration scheme. |

#### Response

`true`
## Remove Issue Types From Field Configuration Scheme
<a name="removeIssueTypesFromGlobalFieldConfigurationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-field-configurations/#api-rest-api-3-fieldconfigurationscheme-id-mapping-delete-post

Removes issue types from the field configuration scheme

This operation can only modify field configuration schemes used in company-managed (classic) projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->removeIssueTypesFromGlobalFieldConfigurationScheme(
    request: new Schema\IssueTypeIdsToRemove(
        issueTypeIds: [
                '10000',
                '10001',
                '10002',
            ],
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeIdsToRemove`](/docs/schema/issue-type-ids-to-remove.md)

The list of issue type IDs to be removed from the field configuration scheme.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue type IDs. Must contain unique values not longer than 255 characters and not be empty. Maximum of 100 IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the field configuration scheme. |

#### Response

`true`
