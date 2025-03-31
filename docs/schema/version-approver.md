# Version Approver

Contains details about a version approver.

Source: [`Jira\Client\Schema\VersionApprover`](/src/Schema/VersionApprover.php)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `` | The Atlassian account ID of the approver. |
| `declineReason` | `` | A description of why the user is declining the approval. |
| `description` | `` | A description of what the user is approving within the specified version. |
| `status` | `` | The status of the approval, which can be *PENDING*, *APPROVED*, or *DECLINED* |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [Version](/docs/schema/version.md) |
