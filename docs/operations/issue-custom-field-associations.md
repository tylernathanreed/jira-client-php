# Issue Custom Field Associations

Source: [`Jira\Client\Operations\IssueCustomFieldAssociations`](/src/Operations/IssueCustomFieldAssociations.php)

## Operations

- [Create Associations](#createAssociations)
- [Remove Associations](#removeAssociations)

## Create Associations
<a name="createAssociations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-associations/#api-rest-api-3-field-association-put

Associates fields with projects

Fields will be associated with each issue type on the requested projects

Fields will be associated with all projects that share the same field configuration which the provided projects are using.
This means that while the field will be associated with the requested projects, it will also be associated with any other projects that share the same field configuration

If a success response is returned it means that the field association has been created in any applicable contexts where it wasn't already present

Up to 50 fields and up to 100 projects can be associated in a single request.
If more fields or projects are provided a 400 response will be returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->createAssociations(new Schema\FieldAssociationsRequest(
    associationContexts: [
                [
                    'identifier' => '10000',
                    'type' => 'PROJECT_ID',
                ],
                [
                    'identifier' => '10001',
                    'type' => 'PROJECT_ID',
                ],
            ],
    fields: [
                [
                    'identifier' => 'customfield_10000',
                    'type' => 'FIELD_ID',
                ],
                [
                    'identifier' => 'customfield_10001',
                    'type' => 'FIELD_ID',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldAssociationsRequest`](/docs/schema/field-associations-request.md)

Details of field associations with projects.

| Property | Type | Description |
| --- | --- | --- |
| `associationContexts` | [`list<AssociationContextObject>`](/docs/schema/association-context-object.md) | Contexts to associate/unassociate the fields with. |
| `fields` | [`list<FieldIdentifierObject>`](/docs/schema/field-identifier-object.md) | Fields to associate/unassociate with projects. |

#### Response

`true`
## Remove Associations
<a name="removeAssociations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-associations/#api-rest-api-3-field-association-delete

Unassociates a set of fields with a project and issue type context

Fields will be unassociated with all projects/issue types that share the same field configuration which the provided project and issue types are using.
This means that while the field will be unassociated with the provided project and issue types, it will also be unassociated with any other projects and issue types that share the same field configuration

If a success response is returned it means that the field association has been removed in any applicable contexts where it was present

Up to 50 fields and up to 100 projects and issue types can be unassociated in a single request.
If more fields or projects are provided a 400 response will be returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->removeAssociations(new Schema\FieldAssociationsRequest(
    associationContexts: [
                [
                    'identifier' => '10000',
                    'type' => 'PROJECT_ID',
                ],
                [
                    'identifier' => '10001',
                    'type' => 'PROJECT_ID',
                ],
            ],
    fields: [
                [
                    'identifier' => 'customfield_10000',
                    'type' => 'FIELD_ID',
                ],
                [
                    'identifier' => 'customfield_10001',
                    'type' => 'FIELD_ID',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\FieldAssociationsRequest`](/docs/schema/field-associations-request.md)

Details of field associations with projects.

| Property | Type | Description |
| --- | --- | --- |
| `associationContexts` | [`list<AssociationContextObject>`](/docs/schema/association-context-object.md) | Contexts to associate/unassociate the fields with. |
| `fields` | [`list<FieldIdentifierObject>`](/docs/schema/field-identifier-object.md) | Fields to associate/unassociate with projects. |

#### Response

`true`
