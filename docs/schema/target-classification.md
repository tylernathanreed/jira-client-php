# Target Classification

Classification mapping for classifications in source issues to respective target classification.

Source: [`Jira\Client\Schema\TargetClassification`](/src/Schema/TargetClassification.php)

| Property | Type | Description |
| --- | --- | --- |
| `classifications` | `object` | An object with the key as the ID of the target classification and value with the list of the IDs of the current source classifications. |
| `issueType` | `string` | ID of the source issueType to which issues present in `issueIdOrKeys` belongs. |
| `projectKeyOrId` | `string` | ID or key of the source project to which issues present in `issueIdOrKeys` belongs. |

## References

### Operations

*None*

### Schema

*None*
