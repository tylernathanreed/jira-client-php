# Issue Navigator Settings

Source: [`Jira\Client\Operations\IssueNavigatorSettings`](/src/Operations/IssueNavigatorSettings.php)

## Operations

- [Get Issue Navigator Default Columns](#getIssueNavigatorDefaultColumns)
- [Set Issue Navigator Default Columns](#setIssueNavigatorDefaultColumns)

## Get Issue Navigator Default Columns
<a name="getIssueNavigatorDefaultColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-navigator-settings/#api-rest-api-3-settings-columns-get

Returns the default issue navigator columns

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getIssueNavigatorDefaultColumns();
```

### Request

#### Response


## Set Issue Navigator Default Columns
<a name="setIssueNavigatorDefaultColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-navigator-settings/#api-rest-api-3-settings-columns-put

Sets the default issue navigator columns

The `columns` parameter accepts a navigable field value and is expressed as HTML form data.
To specify multiple columns, pass multiple `columns` parameters.
For example, in curl:

`curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/settings/columns`

If no column details are sent, then all default columns are removed

A navigable field is one that can be used as a column on the issue navigator.
Find details of navigable issue columns using "Get fields"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Response

`true`
