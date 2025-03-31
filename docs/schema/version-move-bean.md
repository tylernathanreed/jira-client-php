# Version Move Bean


Source: [`Jira\Client\Schema\VersionMoveBean`](src/Schema/VersionMoveBean.php)

| Property | Type | Description |
| --- | --- | --- |
| `after` | `string` | The URL (self link) of the version after which to place the moved version. Cannot be used with `position`. |
| `position` | `string` | An absolute position in which to place the moved version. Cannot be used with `after`. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [ProjectVersions](/docs/operations/project-versions.md) | [moveVersion](/docs/operations/project-versions.md#move-version) |

### Schema

*None*
