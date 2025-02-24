<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait JiraExpressions
{
    /**
     * Analyses and validates Jira expressions
     * 
     * As an experimental feature, this operation can also attempt to type-check the expressions
     * 
     * Learn more about Jira expressions in the "documentation"
     * 
     * **"Permissions" required**: None.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
     * 
     * @param 'syntax'|'type'|'complexity'|null $check
     *        The check to perform:
     *         - `syntax` Each expression's syntax is checked to ensure the expression can be parsed.
     *        Also, syntactic limits are validated.
     *        For example, the expression's length
     *         - `type` EXPERIMENTAL.
     *        Each expression is type checked and the final type of the expression inferred.
     *        Any type errors that would result in the expression failure at runtime are reported.
     *        For example, accessing properties that don't exist or passing the wrong number of arguments to functions.
     *        Also performs the syntax check
     *         - `complexity` EXPERIMENTAL.
     *        Determines the formulae for how many "expensive operations" each expression may execute.
     *        @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations
     */
    public function analyseExpression(
        Schema\JiraExpressionForAnalysis $request,
        ?string $check = 'syntax',
    ): Schema\JiraExpressionsAnalysis {
        return $this->call(
            uri: '/rest/api/3/expression/analyse',
            method: 'post',
            body: $request,
            query: compact('check'),
            success: 200,
            schema: Schema\JiraExpressionsAnalysis::class,
        );
    }

    /**
     * Evaluates a Jira expression and returns its value
     * 
     * This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way.
     * Consult the "Jira expressions documentation" for more details
     * 
     * #### Context variables ####
     * 
     * The following context variables are available to Jira expressions evaluated by this resource.
     * Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions
     * 
     *  - `user` ("User"): The current user.
     * Always available and equal to `null` if the request is anonymous
     *  - `app` ("App"): The "Connect app" that made the request.
     * Available only for authenticated requests made by Connect Apps (read more here: "Authentication for Connect apps")
     *  - `issue` ("Issue"): The current issue.
     * Available only when the issue is provided in the request context object
     *  - `issues` ("List" of "Issues"): A collection of issues matching a JQL query.
     * Available only when JQL is provided in the request context object
     *  - `project` ("Project"): The current project.
     * Available only when the project is provided in the request context object
     *  - `sprint` ("Sprint"): The current sprint.
     * Available only when the sprint is provided in the request context object
     *  - `board` ("Board"): The current board.
     * Available only when the board is provided in the request context object
     *  - `serviceDesk` ("ServiceDesk"): The current service desk.
     * Available only when the service desk is provided in the request context object
     *  - `customerRequest` ("CustomerRequest"): The current customer request.
     * Available only when the customer request is provided in the request context object
     * 
     * Also, custom context variables can be passed in the request with their types.
     * Those variables can be accessed by key in the Jira expression.
     * These variable types are available for use in a custom context:
     * 
     *  - `user`: A "user" specified as an Atlassian account ID
     *  - `issue`: An "issue" specified by ID or key.
     * All the fields of the issue object are available in the Jira expression
     *  - `json`: A JSON object containing custom content
     *  - `list`: A JSON list of `user`, `issue`, or `json` variable types
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required**: None.
     * However, an expression may return different results for different users depending on their permissions.
     * For example, different users may see different comments on the same issue.
     *  
     * Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * 
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts `meta.complexity` that returns information about the expression complexity.
     *                       For example, the number of expensive operations used by the expression and how close the expression is to reaching the "complexity limit".
     *                       Useful when designing and debugging your expressions.
     *                       @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions
     */
    public function evaluateJiraExpression(
        Schema\JiraExpressionEvalRequestBean $request,
        ?string $expand = null,
    ): Schema\JiraExpressionResult {
        return $this->call(
            uri: '/rest/api/3/expression/eval',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 200,
            schema: Schema\JiraExpressionResult::class,
        );
    }

    /**
     * Evaluates a Jira expression and returns its value.
     * The difference between this and `eval` is that this endpoint uses the enhanced search API when evaluating JQL queries.
     * This API is eventually consistent, unlike the strongly consistent `eval` API.
     * This allows for better performance and scalability.
     * In addition, this API's response for JQL evaluation is based on a scrolling view (backed by a `nextPageToken`) instead of a paginated view (backed by `startAt` and `totalCount`)
     * 
     * This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way.
     * Consult the "Jira expressions documentation" for more details
     * 
     * #### Context variables ####
     * 
     * The following context variables are available to Jira expressions evaluated by this resource.
     * Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions
     * 
     *  - `user` ("User"): The current user.
     * Always available and equal to `null` if the request is anonymous
     *  - `app` ("App"): The "Connect app" that made the request.
     * Available only for authenticated requests made by Connect apps (read more here: "Authentication for Connect apps")
     *  - `issue` ("Issue"): The current issue.
     * Available only when the issue is provided in the request context object
     *  - `issues` ("List" of "Issues"): A collection of issues matching a JQL query.
     * Available only when JQL is provided in the request context object
     *  - `project` ("Project"): The current project.
     * Available only when the project is provided in the request context object
     *  - `sprint` ("Sprint"): The current sprint.
     * Available only when the sprint is provided in the request context object
     *  - `board` ("Board"): The current board.
     * Available only when the board is provided in the request context object
     *  - `serviceDesk` ("ServiceDesk"): The current service desk.
     * Available only when the service desk is provided in the request context object
     *  - `customerRequest` ("CustomerRequest"): The current customer request.
     * Available only when the customer request is provided in the request context object
     * 
     * In addition, you can pass custom context variables along with their types.
     * You can then access them from the Jira expression by key.
     * You can use the following variables in a custom context:
     * 
     *  - `user`: A "user" specified as an Atlassian account ID
     *  - `issue`: An "issue" specified by ID or key.
     * All the fields of the issue object are available in the Jira expression
     *  - `json`: A JSON object containing custom content
     *  - `list`: A JSON list of `user`, `issue`, or `json` variable types
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required**: None.
     * However, an expression may return different results for different users depending on their permissions.
     * For example, different users may see different comments on the same issue.
     *  
     * Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app
     * @link https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps
     * @link https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
     * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
     * 
     * @param string $expand Use "expand" to include additional information in the response.
     *                       This parameter accepts `meta.complexity` that returns information about the expression complexity.
     *                       For example, the number of expensive operations used by the expression and how close the expression is to reaching the "complexity limit".
     *                       Useful when designing and debugging your expressions.
     *                       @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions
     */
    public function evaluateJSISJiraExpression(
        Schema\JiraExpressionEvaluateRequestBean $request,
        ?string $expand = null,
    ): Schema\JExpEvaluateJiraExpressionResultBean {
        return $this->call(
            uri: '/rest/api/3/expression/evaluate',
            method: 'post',
            body: $request,
            query: compact('expand'),
            success: 200,
            schema: Schema\JExpEvaluateJiraExpressionResultBean::class,
        );
    }
}
