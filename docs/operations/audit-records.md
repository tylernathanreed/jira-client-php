# Audit Records

Source: [`Jira\Client\Operations\AuditRecords`](/src/Operations/AuditRecords.php)

## Operations

- [Get Audit Records](#getAuditRecords)

## Get Audit Records
<a name="getAuditRecords"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-audit-records/#api-rest-api-3-auditing-record-get

Returns a list of audit records.
The list can be filtered to include items:

 - where each item in `filter` has at least one match in any of these fields:
    
     - `summary`
     - `category`
     - `eventSource`
     - `objectItem.name` If the object is a user, account ID is available to filter
     - `objectItem.parentName`
     - `objectItem.typeName`
     - `changedValues.changedFrom`
     - `changedValues.changedTo`
     - `remoteAddress`
    
    For example, if `filter` contains *man ed*, an audit record containing `summary": "User added to group"` and `"category": "group management"` is returned
 - created on or after a date and time
 - created or or before a date and time

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\AuditRecords $response */
$response = $client->getAuditRecords(
    offset: 0,
    limit: 1000,
    filter: null,
    from: null,
    to: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `offset` | `?int` | The number of records to skip before returning the first result. |
| `limit` | `?int` | The maximum number of results to return. |
| `filter` | `?string` | The strings to match with audit field content, space separated. |
| `from` | `?string` | The date and time on or after which returned audit records must have been created. If `to` is provided `from` must be before `to` or no audit records are returned. |
| `to` | `?string` | The date and time on or before which returned audit results must have been created. If `from` is provided `to` must be after `from` or no audit records are returned. |

#### Response

Source: [`Jira\Client\Schema\AuditRecords`](/docs/schema/audit-records.md)

Container for a list of audit records.

| Property | Type | Description |
| --- | --- | --- |
| `limit` | `int` | The requested or default limit on the number of audit items to be returned. |
| `offset` | `int` | The number of audit items skipped before the first item in this list. |
| `records` | [`?list<AuditRecordBean>`](/docs/schema/audit-record-bean.md) | The list of audit items. |
| `total` | `int` | The total number of audit items returned. |
