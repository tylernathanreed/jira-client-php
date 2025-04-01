# Issue Custom Field Values Apps

DummyDescription

Source: [`Jira\Client\Operations\IssueCustomFieldValuesApps`](/src/Operations/IssueCustomFieldValuesApps.php)

## Operations

- [Update Custom Fields](#updateMultipleCustomFieldValues)
- [Update Custom Field Value](#updateCustomFieldValue)

## Update Custom Fields
<a name="updateMultipleCustomFieldValues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-values-apps/#api-rest-api-3-app-field-value-post

Updates the value of one or more custom fields on one or more issues.
Combinations of custom field and issue should be unique within the request

Apps can only perform this operation on "custom fields" and "custom field types" declared in their own manifests

**"Permissions" required:** Only the app that owns the custom field or custom field type can update its values with this operation

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateMultipleCustomFieldValues(
    request: new Schema\MultipleCustomFieldValuesUpdateDetails(
        updates: [
                [
                    'customField' => 'customfield_10010',
                    'issueIds' => [
                        '10010',
                        '10011',
                    ],
                    'value' => 'new value',
                ],
                [
                    'customField' => 'customfield_10011',
                    'issueIds' => [
                        '10010',
                    ],
                    'value' => '1000',
                ],
            ],
    )
    generateChangelog: true,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\MultipleCustomFieldValuesUpdateDetails`](/docs/schema/multiple-custom-field-values-update-details.md)

List of updates for a custom fields.

| Property | Type | Description |
| --- | --- | --- |
| `updates` | [`?list<MultipleCustomFieldValuesUpdate>`](/docs/schema/multiple-custom-field-values-update.md) |  |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `generateChangelog` | `?bool` | Whether to generate a changelog for this update. |

#### Response

`true`
## Update Custom Field Value
<a name="updateCustomFieldValue"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-values-apps/#api-rest-api-3-app-field-field-id-or-key-value-put

Updates the value of a custom field on one or more issues

Apps can only perform this operation on "custom fields" and "custom field types" declared in their own manifests

**"Permissions" required:** Only the app that owns the custom field or custom field type can update its values with this operation

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateCustomFieldValue(
    request: new Schema\CustomFieldValueUpdateDetails(
        updates: [
                [
                    'issueIds' => [
                        '10010',
                    ],
                    'value' => 'new value',
                ],
            ],
    )
    fieldIdOrKey: 'foo',
    generateChangelog: true,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CustomFieldValueUpdateDetails`](/docs/schema/custom-field-value-update-details.md)

Details of updates for a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `updates` | [`?list<CustomFieldValueUpdate>`](/docs/schema/custom-field-value-update.md) | The list of custom field update details. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldIdOrKey` | `string` | The ID or key of the custom field. For example, `customfield_10010`. |
| `generateChangelog` | `?bool` | Whether to generate a changelog for this update. |

#### Response

`true`
