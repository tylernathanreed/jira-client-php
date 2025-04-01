# Jira Expressions

Source: [`Jira\Client\Operations\JiraExpressions`](/src/Operations/JiraExpressions.php)

## Operations

- [Analyse Jira Expression](#analyseExpression)
- [Evaluate Jira Expression](#evaluateJiraExpression)
- [Evaluate Jira Expression Using Enhanced Search API](#evaluateJSISJiraExpression)

## Analyse Jira Expression
<a name="analyseExpression"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jira-expressions/#api-rest-api-3-expression-analyse-post

Analyses and validates Jira expressions

As an experimental feature, this operation can also attempt to type-check the expressions

Learn more about Jira expressions in the "documentation"

**"Permissions" required**: None.
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions/

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JiraExpressionsAnalysis $response */
$response = $client->analyseExpression(
    request: new Schema\JiraExpressionForAnalysis(
        contextVariables: [
                'listOfStrings' => 'List<String>',
                'record' => '{ a: Number, b: String }',
                'value' => 'User',
            ],
        expressions: [
                'issues.map(issue => issue.properties[\\\'property_key\\\']]',
            ],
    )
    check: 'syntax',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JiraExpressionForAnalysis`](/docs/schema/jira-expression-for-analysis.md)

Details of Jira expressions for analysis.

| Property | Type | Description |
| --- | --- | --- |
| `expressions` | `list<string>` | The list of Jira expressions to analyse. |
| `contextVariables` | `array<string,string>` | Context variables and their types. The type checker assumes that [common context variables](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#context-variables), such as `issue` or `project`, are available in context and sets their type. Use this property to override the default types or provide details of new variables. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `check` | `'syntax'\|'type'\|'complexity'\|null` | The check to perform:<br/><br/> *  `syntax` Each expression's syntax is checked to ensure the expression can be parsed. Also, syntactic limits are validated. For example, the expression's length.<br/> *  `type` EXPERIMENTAL. Each expression is type checked and the final type of the expression inferred. Any type errors that would result in the expression failure at runtime are reported. For example, accessing properties that don't exist or passing the wrong number of arguments to functions. Also performs the syntax check.<br/> *  `complexity` EXPERIMENTAL. Determines the formulae for how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) each expression may execute. |

#### Response

Source: [`Jira\Client\Schema\JiraExpressionsAnalysis`](/docs/schema/jira-expressions-analysis.md)

Details about the analysed Jira expression.

| Property | Type | Description |
| --- | --- | --- |
| `results` | [`list<JiraExpressionAnalysis>`](/docs/schema/jira-expression-analysis.md) | The results of Jira expressions analysis. |


## Evaluate Jira Expression
<a name="evaluateJiraExpression"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jira-expressions/#api-rest-api-3-expression-eval-post

Evaluates a Jira expression and returns its value

This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way.
Consult the "Jira expressions documentation" for more details

#### Context variables ####

The following context variables are available to Jira expressions evaluated by this resource.
Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions

 - `user` ("User"): The current user.
Always available and equal to `null` if the request is anonymous
 - `app` ("App"): The "Connect app" that made the request.
Available only for authenticated requests made by Connect Apps (read more here: "Authentication for Connect apps")
 - `issue` ("Issue"): The current issue.
Available only when the issue is provided in the request context object
 - `issues` ("List" of "Issues"): A collection of issues matching a JQL query.
Available only when JQL is provided in the request context object
 - `project` ("Project"): The current project.
Available only when the project is provided in the request context object
 - `sprint` ("Sprint"): The current sprint.
Available only when the sprint is provided in the request context object
 - `board` ("Board"): The current board.
Available only when the board is provided in the request context object
 - `serviceDesk` ("ServiceDesk"): The current service desk.
Available only when the service desk is provided in the request context object
 - `customerRequest` ("CustomerRequest"): The current customer request.
Available only when the customer request is provided in the request context object

Also, custom context variables can be passed in the request with their types.
Those variables can be accessed by key in the Jira expression.
These variable types are available for use in a custom context:

 - `user`: A "user" specified as an Atlassian account ID
 - `issue`: An "issue" specified by ID or key.
All the fields of the issue object are available in the Jira expression
 - `json`: A JSON object containing custom content
 - `list`: A JSON list of `user`, `issue`, or `json` variable types

This operation can be accessed anonymously

**"Permissions" required**: None.
However, an expression may return different results for different users depending on their permissions.
For example, different users may see different comments on the same issue.
 
Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app
See: https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JiraExpressionResult $response */
$response = $client->evaluateJiraExpression(
    request: new Schema\JiraExpressionEvalRequestBean(
        context: [
                'board' => '10100',
                'custom' => [
                    'config' => [
                        'type' => 'json',
                        'value' => [
                            'userId' => '10002',
                        ],
                    ],
                    'issuesList' => [
                        'type' => 'json',
                        'value' => [
                            0 => [
                                'key' => 'ACJIRA-1471',
                                'type' => 'issue',
                            ],
                            1 => [
                                'id' => '100001',
                                'type' => 'issue',
                            ],
                        ],
                    ],
                    'myUser' => [
                        'accountId' => '100001',
                        'type' => 'user',
                    ],
                    'nullField' => [
                        'type' => 'json',
                    ],
                ],
                'customerRequest' => '1450',
                'issue' => [
                    'key' => 'ACJIRA-1470',
                ],
                'issues' => [
                    'jql' => [
                        'maxResults' => '100',
                        'query' => 'project = HSP',
                        'startAt' => '0',
                        'validation' => 'strict',
                    ],
                ],
                'project' => [
                    'key' => 'ACJIRA',
                ],
                'serviceDesk' => '10023',
                'sprint' => '10001',
            ],
        expression: '{ key: issue.key, type: issue.issueType.name, links: issue.links.map(link => link.linkedIssue.id), listCustomVariable: issuesList.includes(issue), customVariables: myUser.accountId == config.userId}',
    )
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JiraExpressionEvalRequestBean`](/docs/schema/jira-expression-eval-request-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | The Jira expression to evaluate. |
| `context` | [`JiraExpressionEvalContextBean`](/docs/schema/jira-expression-eval-context-bean.md) | The context in which the Jira expression is evaluated. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts `meta.complexity` that returns information about the expression complexity. For example, the number of expensive operations used by the expression and how close the expression is to reaching the [complexity limit](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions). Useful when designing and debugging your expressions. |

#### Response

Source: [`Jira\Client\Schema\JiraExpressionResult`](/docs/schema/jira-expression-result.md)

The result of evaluating a Jira expression.

| Property | Type | Description |
| --- | --- | --- |
| `value` | `mixed` | The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.) |
| `meta` | [`JiraExpressionEvaluationMetaDataBean`](/docs/schema/jira-expression-evaluation-meta-data-bean.md) | Contains various characteristics of the performed expression evaluation. |


## Evaluate Jira Expression Using Enhanced Search API
<a name="evaluateJSISJiraExpression"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jira-expressions/#api-rest-api-3-expression-evaluate-post

Evaluates a Jira expression and returns its value.
The difference between this and `eval` is that this endpoint uses the enhanced search API when evaluating JQL queries.
This API is eventually consistent, unlike the strongly consistent `eval` API.
This allows for better performance and scalability.
In addition, this API's response for JQL evaluation is based on a scrolling view (backed by a `nextPageToken`) instead of a paginated view (backed by `startAt` and `totalCount`)

This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way.
Consult the "Jira expressions documentation" for more details

#### Context variables ####

The following context variables are available to Jira expressions evaluated by this resource.
Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions

 - `user` ("User"): The current user.
Always available and equal to `null` if the request is anonymous
 - `app` ("App"): The "Connect app" that made the request.
Available only for authenticated requests made by Connect apps (read more here: "Authentication for Connect apps")
 - `issue` ("Issue"): The current issue.
Available only when the issue is provided in the request context object
 - `issues` ("List" of "Issues"): A collection of issues matching a JQL query.
Available only when JQL is provided in the request context object
 - `project` ("Project"): The current project.
Available only when the project is provided in the request context object
 - `sprint` ("Sprint"): The current sprint.
Available only when the sprint is provided in the request context object
 - `board` ("Board"): The current board.
Available only when the board is provided in the request context object
 - `serviceDesk` ("ServiceDesk"): The current service desk.
Available only when the service desk is provided in the request context object
 - `customerRequest` ("CustomerRequest"): The current customer request.
Available only when the customer request is provided in the request context object

In addition, you can pass custom context variables along with their types.
You can then access them from the Jira expression by key.
You can use the following variables in a custom context:

 - `user`: A "user" specified as an Atlassian account ID
 - `issue`: An "issue" specified by ID or key.
All the fields of the issue object are available in the Jira expression
 - `json`: A JSON object containing custom content
 - `list`: A JSON list of `user`, `issue`, or `json` variable types

This operation can be accessed anonymously

**"Permissions" required**: None.
However, an expression may return different results for different users depending on their permissions.
For example, different users may see different comments on the same issue.
 
Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app
See: https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
See: https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JExpEvaluateJiraExpressionResultBean $response */
$response = $client->evaluateJSISJiraExpression(
    request: new Schema\JiraExpressionEvaluateRequestBean(
        context: [
                'board' => '10100',
                'custom' => [
                    'config' => [
                        'type' => 'json',
                        'value' => [
                            'userId' => '10002',
                        ],
                    ],
                    'issuesList' => [
                        'type' => 'json',
                        'value' => [
                            0 => [
                                'key' => 'ACJIRA-1471',
                                'type' => 'issue',
                            ],
                            1 => [
                                'id' => '100001',
                                'type' => 'issue',
                            ],
                        ],
                    ],
                    'myUser' => [
                        'accountId' => '100001',
                        'type' => 'user',
                    ],
                    'nullField' => [
                        'type' => 'json',
                    ],
                ],
                'customerRequest' => '1450',
                'issue' => [
                    'key' => 'ACJIRA-1470',
                ],
                'issues' => [
                    'jql' => [
                        'maxResults' => '100',
                        'nextPageToken' => 'EgQIlMIC',
                        'query' => 'project = HSP',
                    ],
                ],
                'project' => [
                    'key' => 'ACJIRA',
                ],
                'serviceDesk' => '10023',
                'sprint' => '10001',
            ],
        expression: '{ key: issue.key, type: issue.issueType.name, links: issue.links.map(link => link.linkedIssue.id), listCustomVariable: issuesList.includes(issue), customVariables: myUser.accountId == config.userId}',
    )
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JiraExpressionEvaluateRequestBean`](/docs/schema/jira-expression-evaluate-request-bean.md)

The request to evaluate a Jira expression.
This bean will be replacing `JiraExpressionEvaluateRequest` as part of new `evaluate` endpoint

| Property | Type | Description |
| --- | --- | --- |
| `expression` | `string` | The Jira expression to evaluate. |
| `context` | [`JiraExpressionEvaluateContextBean`](/docs/schema/jira-expression-evaluate-context-bean.md) | The context in which the Jira expression is evaluated. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts `meta.complexity` that returns information about the expression complexity. For example, the number of expensive operations used by the expression and how close the expression is to reaching the [complexity limit](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions). Useful when designing and debugging your expressions. |

#### Response

Source: [`Jira\Client\Schema\JExpEvaluateJiraExpressionResultBean`](/docs/schema/j-exp-evaluate-jira-expression-result-bean.md)

The result of evaluating a Jira expression.This bean will be replacing `JiraExpressionResultBean` bean as part of new evaluate endpoint

| Property | Type | Description |
| --- | --- | --- |
| `value` | `mixed` | The value of the evaluated expression. It may be a primitive JSON value or a Jira REST API object. (Some expressions do not produce any meaningful results—for example, an expression that returns a lambda function—if that's the case a simple string representation is returned. These string representations should not be relied upon and may change without notice.) |
| `meta` | [`JExpEvaluateMetaDataBean`](/docs/schema/j-exp-evaluate-meta-data-bean.md) | Contains various characteristics of the performed expression evaluation. |
