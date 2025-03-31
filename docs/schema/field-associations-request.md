# Field Associations Request

Details of field associations with projects.

Source: [`Jira\Client\Schema\FieldAssociationsRequest`](/src/Schema/FieldAssociationsRequest.php)

| Property | Type | Description |
| --- | --- | --- |
| `associationContexts` | `list<[AssociationContextObject](/src/Schema/AssociationContextObject.php)>` | Contexts to associate/unassociate the fields with. |
| `fields` | `list<[FieldIdentifierObject](/src/Schema/FieldIdentifierObject.php)>` | Fields to associate/unassociate with projects. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueCustomFieldAssociations](/docs/operations/issue-custom-field-associations.md) | [createAssociations](/docs/operations/issue-custom-field-associations.md#create-associations) |
| [IssueCustomFieldAssociations](/docs/operations/issue-custom-field-associations.md) | [removeAssociations](/docs/operations/issue-custom-field-associations.md#remove-associations) |

### Schema

*None*
