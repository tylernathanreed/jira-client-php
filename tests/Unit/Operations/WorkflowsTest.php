<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowsTest extends OperationsTestCase
{
    public function testGetAllWorkflows(): void
    {
        $workflowName = null;

        $this->assertCall(
            method: 'getAllWorkflows',
            call: [
                'uri' => '/rest/api/3/workflow',
                'method' => 'get',
                'query' => compact('workflowName'),
                'success' => 200,
                'schema' => [Schema\DeprecatedWorkflow::class],
            ],
            arguments: [
                $workflowName,
            ],
            response: '[{"default":true,"description":"A classic Jira workflow","lastModifiedDate":"01-01-2011","lastModifiedUser":"admin","lastModifiedUserAccountId":"5b10a2844c20165700ede21g","name":"classic workflow","steps":5}]',
        );
    }

    public function testCreateWorkflow(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createWorkflow',
            call: [
                'uri' => '/rest/api/3/workflow',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\WorkflowIDs::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"entityId":"d7178e8d-bf6c-4c0c-9e90-758a0b965b67","name":"Workflow 1"}',
        );
    }

    public function testGetWorkflowsPaginated(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getWorkflowsPaginated',
            call: [
                'uri' => '/rest/api/3/workflow/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'workflowName', 'expand', 'queryString', 'orderBy', 'isActive'),
                'success' => 200,
                'schema' => Schema\PageBeanWorkflow::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $workflowName,
                $expand,
                $queryString,
                $orderBy,
                $isActive,
            ],
            response: '{"isLast":false,"maxResults":1,"startAt":0,"total":5,"values":[{"id":{"name":"SCRUM Workflow","entityId":"5ed312c5-f7a6-4a78-a1f6-8ff7f307d063"},"description":"A workflow used for Software projects in the SCRUM methodology","transitions":[{"id":"5","name":"In Progress","description":"Start working on the issue.","from":["10","13"],"to":"14","type":"directed","screen":{"id":"10000","name":"Issue screen"},"rules":{"conditionsTree":{"nodeType":"compound","operator":"AND","conditions":[{"nodeType":"simple","type":"PermissionCondition","configuration":{"permissionKey":"WORK_ON_ISSUES"}},{"nodeType":"simple","type":"PermissionCondition","configuration":{"permissionKey":"RESOLVE_ISSUES"}}]},"validators":[{"type":"FieldRequiredValidator","configuration":{"errorMessage":"A custom error message","fields":["description","assignee"],"ignoreContext":true}}],"postFunctions":[{"type":"UpdateIssueStatusFunction"},{"type":"GenerateChangeHistoryFunction"},{"type":"FireIssueEventFunction"}]},"properties":{"jira.fieldscreen.id":1}}],"statuses":[{"id":"3","name":"In Progress","properties":{"issueEditable":false,"jira.issue.editable":"false"}}],"isDefault":false,"schemes":[{"id":"10001","name":"Test Workflow Scheme"}],"projects":[{"avatarUrls":{"16x16":"secure/projectavatar?size=xsmall&pid=10000","24x24":"secure/projectavatar?size=small&pid=10000","32x32":"secure/projectavatar?size=medium&pid=10000","48x48":"secure/projectavatar?size=large&pid=10000"},"id":"10000","key":"EX","name":"Example","projectCategory":{"description":"Project category description","id":"10000","name":"A project category"},"projectTypeKey":"ProjectTypeKey{key=\'software\'}","self":"project/EX","simplified":false}],"hasDraftWorkflow":true,"operations":{"canEdit":true,"canDelete":false},"created":"2018-12-10T16:30:15.000+0000","updated":"2018-12-11T11:45:13.000+0000"}]}',
        );
    }

    public function testDeleteInactiveWorkflow(): void
    {
        $entityId = 'foo';

        $this->assertCall(
            method: 'deleteInactiveWorkflow',
            call: [
                'uri' => '/rest/api/3/workflow/{entityId}',
                'method' => 'delete',
                'path' => compact('entityId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $entityId,
            ],
            response: null,
        );
    }

    public function testGetWorkflowProjectIssueTypeUsages(): void
    {
        $workflowId = 'foo';
        $projectId = 1234;
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getWorkflowProjectIssueTypeUsages',
            call: [
                'uri' => '/rest/api/3/workflow/{workflowId}/project/{projectId}/issueTypeUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('workflowId', 'projectId'),
                'success' => 200,
                'schema' => Schema\WorkflowProjectIssueTypeUsageDTO::class,
            ],
            arguments: [
                $workflowId,
                $projectId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"issueTypes":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1000"}]},"projectId":"6e2bde9f-f213-4920-95cd-28e015af59a1","workflowId":"2000"}',
        );
    }

    public function testGetProjectUsagesForWorkflow(): void
    {
        $workflowId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getProjectUsagesForWorkflow',
            call: [
                'uri' => '/rest/api/3/workflow/{workflowId}/projectUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('workflowId'),
                'success' => 200,
                'schema' => Schema\WorkflowProjectUsageDTO::class,
            ],
            arguments: [
                $workflowId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"projects":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1003"}]},"workflowId":"fb759d53-a3a4-45ff-9de4-547c4b638dde"}',
        );
    }

    public function testGetWorkflowSchemeUsagesForWorkflow(): void
    {
        $workflowId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getWorkflowSchemeUsagesForWorkflow',
            call: [
                'uri' => '/rest/api/3/workflow/{workflowId}/workflowSchemes',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('workflowId'),
                'success' => 200,
                'schema' => Schema\WorkflowSchemeUsageDTO::class,
            ],
            arguments: [
                $workflowId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"workflowId":"fb759d53-a3a4-45ff-9de4-547c4b638dde","workflowSchemes":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1000"}]}}',
        );
    }

    public function testReadWorkflows(): void
    {
        $request = $this->deserialize(Schema\WorkflowReadRequest::class, [
            'projectAndIssueTypes' => [
            ],
            'workflowIds' => [
            ],
            'workflowNames' => [
                'Workflow 1',
                'Workflow 2',
            ],
        ]);

        $expand = null;
        $useTransitionLinksFormat = false;
        $useApprovalConfiguration = false;

        $this->assertCall(
            method: 'readWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand', 'useTransitionLinksFormat', 'useApprovalConfiguration'),
                'success' => 200,
                'schema' => Schema\WorkflowReadResponse::class,
            ],
            arguments: [
                $request,
                $expand,
                $useTransitionLinksFormat,
                $useApprovalConfiguration,
            ],
            response: '{"statuses":[{"description":"","id":"10001","name":"To Do","scope":{"type":"GLOBAL"},"statusCategory":"TODO","statusReference":"10001","usages":[]},{"description":"","id":"10002","name":"In Progress","scope":{"type":"GLOBAL"},"statusCategory":"IN_PROGRESS","statusReference":"10002","usages":[]},{"description":"","id":"10003","name":"Done","scope":{"type":"GLOBAL"},"statusCategory":"DONE","statusReference":"10003","usages":[]}],"workflows":[{"description":"","id":"b9ff2384-d3b6-4d4e-9509-3ee19f607168","isEditable":true,"name":"Workflow 1","scope":{"type":"GLOBAL"},"startPointLayout":{"x":-100.00030899047852,"y":-153.00020599365234},"statuses":[{"deprecated":false,"layout":{"x":317.0000915527344,"y":-16.0},"properties":{},"statusReference":"10002"},{"deprecated":false,"layout":{"x":508.000244140625,"y":-16.0},"properties":{},"statusReference":"10003"},{"deprecated":false,"layout":{"x":114.99993896484375,"y":-16.0},"properties":{},"statusReference":"10001"}],"transitions":[{"actions":[],"description":"","id":"11","links":[],"name":"To Do","properties":{},"toStatusReference":"10001","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"21","links":[],"name":"In Progress","properties":{},"toStatusReference":"10002","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"41","links":[{"fromPort":0,"fromStatusReference":"10001","toPort":1}],"name":"Start work","properties":{},"toStatusReference":"10002","triggers":[],"type":"DIRECTED","validators":[]},{"actions":[],"description":"","id":"1","links":[],"name":"Create","properties":{},"toStatusReference":"10001","triggers":[],"type":"INITIAL","validators":[]},{"actions":[],"description":"","id":"31","links":[],"name":"Done","properties":{},"toStatusReference":"10003","triggers":[],"type":"GLOBAL","validators":[]}],"usages":[],"version":{"id":"f010ac1b-3dd3-43a3-aa66-0ee8a447f76e","versionNumber":0}}]}',
        );
    }

    public function testWorkflowCapabilities(): void
    {
        $workflowId = null;
        $projectId = null;
        $issueTypeId = null;

        $this->assertCall(
            method: 'workflowCapabilities',
            call: [
                'uri' => '/rest/api/3/workflows/capabilities',
                'method' => 'get',
                'query' => compact('workflowId', 'projectId', 'issueTypeId'),
                'success' => 200,
                'schema' => Schema\WorkflowCapabilities::class,
            ],
            arguments: [
                $workflowId,
                $projectId,
                $issueTypeId,
            ],
            response: '{"connectRules":[{"addonKey":"com.atlassian.jira.refapp","createUrl":"/validators/jira-expression/create?id={validator.id}","description":"Validates if the given Jira expression is true.","editUrl":"/validators/jira-expression/edit?id={validator.id}","moduleKey":"jiraExpressionValidator","name":"Jira expression validator (by APPNAME)","ruleKey":"connect:expression-validator","ruleType":"Validator","viewUrl":"/validators/jira-expression/view?id={validator.id}"}],"editorScope":"GLOBAL","forgeRules":[{"description":"A Jira workflow validator example.","id":"ari:cloud:ecosystem::extension/9df6d15f-1bbe-443e-be08-150309e8dbb0/f6a3bed3-737f-4e7a-8942-130df302b749/static/workflow-validator-example-workflow-validator","name":"workflow-validator","ruleKey":"forge:expression-validator","ruleType":"Validator"}],"projectTypes":["software","business"],"systemRules":[{"description":"Automatically assign a request to someone after moving the request using a particular transition.","incompatibleRuleKeys":[],"isAvailableForInitialTransition":true,"isVisible":true,"name":"Assign a request","ruleKey":"system:change-assignee","ruleType":"Function"}],"triggerRules":[{"availableTypes":[{"description":"Automatically transitions the issue when a related branch is created in a connected repository","name":"Branch created","type":"com.atlassian.jira.plugins.jira-development-integration-plugin:branch-created-trigger"}],"ruleKey":"system:development-triggers"}]}',
        );
    }

    public function testCreateWorkflows(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows/create',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowCreateResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"statuses":[{"description":"","id":"10001","name":"To Do","scope":{"type":"GLOBAL"},"statusCategory":"TODO","statusReference":"10001","usages":[]},{"description":"","id":"10002","name":"In Progress","scope":{"type":"GLOBAL"},"statusCategory":"IN_PROGRESS","statusReference":"10002","usages":[]},{"description":"","id":"10003","name":"Done","scope":{"type":"GLOBAL"},"statusCategory":"DONE","statusReference":"10003","usages":[]}],"workflows":[{"description":"","id":"b9ff2384-d3b6-4d4e-9509-3ee19f607168","isEditable":true,"name":"Software workflow 1","scope":{"type":"GLOBAL"},"startPointLayout":{"x":-100.00030899047852,"y":-153.00020599365234},"statuses":[{"deprecated":false,"layout":{"x":317.0000915527344,"y":-16.0},"properties":{},"statusReference":"10002"},{"deprecated":false,"layout":{"x":508.000244140625,"y":-16.0},"properties":{},"statusReference":"10003"},{"deprecated":false,"layout":{"x":114.99993896484375,"y":-16.0},"properties":{},"statusReference":"10001"}],"transitions":[{"actions":[],"description":"","id":"11","links":[],"name":"To Do","properties":{},"toStatusReference":"10001","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"21","links":[],"name":"In Progress","properties":{},"toStatusReference":"10002","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"1","links":[],"name":"Create","properties":{},"toStatusReference":"10001","triggers":[],"type":"INITIAL","validators":[]},{"actions":[],"description":"Move a work item from in progress to done","id":"31","links":[{"fromPort":0,"fromStatusReference":"10002","toPort":1}],"name":"Done","properties":{},"toStatusReference":"10003","triggers":[],"type":"DIRECTED","validators":[]}],"usages":[],"version":{"id":"f010ac1b-3dd3-43a3-aa66-0ee8a447f76e","versionNumber":0}}]}',
        );
    }

    public function testValidateCreateWorkflows(): void
    {
        $request = $this->deserialize(Schema\WorkflowCreateValidateRequest::class, [
            'payload' => [
                'scope' => [
                    'type' => 'GLOBAL',
                ],
                'statuses' => [
                    0 => [
                        'description' => '',
                        'name' => 'To Do',
                        'statusCategory' => 'TODO',
                        'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                    ],
                    1 => [
                        'description' => '',
                        'name' => 'In Progress',
                        'statusCategory' => 'IN_PROGRESS',
                        'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                    ],
                    2 => [
                        'description' => '',
                        'name' => 'Done',
                        'statusCategory' => 'DONE',
                        'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                    ],
                ],
                'workflows' => [
                    0 => [
                        'description' => '',
                        'name' => 'Software workflow 1',
                        'startPointLayout' => [
                            'x' => '-100.00030899048',
                            'y' => '-153.00020599365',
                        ],
                        'statuses' => [
                            0 => [
                                'layout' => [
                                    'x' => '114.99993896484',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            ],
                            1 => [
                                'layout' => [
                                    'x' => '317.00009155273',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            ],
                            2 => [
                                'layout' => [
                                    'x' => '508.00024414062',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            ],
                        ],
                        'transitions' => [
                            0 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '1',
                                'links' => [
                                ],
                                'name' => 'Create',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'INITIAL',
                                'validators' => [
                                ],
                            ],
                            1 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '11',
                                'links' => [
                                ],
                                'name' => 'To Do',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            2 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '21',
                                'links' => [
                                ],
                                'name' => 'In Progress',
                                'properties' => [
                                ],
                                'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            3 => [
                                'actions' => [
                                ],
                                'description' => 'Move a work item from in progress to done',
                                'id' => '31',
                                'links' => [
                                    0 => [
                                        'fromPort' => '0',
                                        'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                        'toPort' => '1',
                                    ],
                                ],
                                'name' => 'Done',
                                'properties' => [
                                ],
                                'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                                'triggers' => [
                                ],
                                'type' => 'DIRECTED',
                                'validators' => [
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'validationOptions' => [
                'levels' => [
                    0 => 'ERROR',
                    1 => 'WARNING',
                ],
            ],
        ]);

        $this->assertCall(
            method: 'validateCreateWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows/create/validation',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowValidationErrorList::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"errors":[{"code":"NON_UNIQUE_STATUS_NAME","elementReference":{"statusReference":"1f0443ff-47e4-4306-9c26-0af696059a43"},"level":"ERROR","message":"You must use a unique status name.","type":"STATUS"}]}',
        );
    }

    public function testSearchWorkflows(): void
    {
        $startAt = null;
        $maxResults = null;
        $expand = null;
        $queryString = null;
        $orderBy = null;
        $scope = null;
        $isActive = null;

        $this->assertCall(
            method: 'searchWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'expand', 'queryString', 'orderBy', 'scope', 'isActive'),
                'success' => 200,
                'schema' => Schema\WorkflowSearchResponse::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $expand,
                $queryString,
                $orderBy,
                $scope,
                $isActive,
            ],
            response: '{"isLast":false,"maxResults":50,"nextPage":"https://your-domain.atlassian.net/rest/api/3/workflows/search?startAt=50","self":"https://your-domain.atlassian.net/rest/api/3/workflows/search","startAt":0,"statuses":[{"description":"","id":"10001","name":"To Do","scope":{"type":"GLOBAL"},"statusCategory":"TODO","statusReference":"10001","usages":[]},{"description":"","id":"10002","name":"In Progress","scope":{"type":"GLOBAL"},"statusCategory":"IN_PROGRESS","statusReference":"10002","usages":[]},{"description":"","id":"10003","name":"Done","scope":{"type":"GLOBAL"},"statusCategory":"DONE","statusReference":"10003","usages":[]}],"total":100,"values":[{"description":"","id":"b9ff2384-d3b6-4d4e-9509-3ee19f607168","isEditable":true,"name":"Workflow 1","scope":{"type":"GLOBAL"},"startPointLayout":{"x":-100.00030899047852,"y":-153.00020599365234},"statuses":[{"deprecated":false,"layout":{"x":317.0000915527344,"y":-16.0},"properties":{},"statusReference":"10002"},{"deprecated":false,"layout":{"x":508.000244140625,"y":-16.0},"properties":{},"statusReference":"10003"},{"deprecated":false,"layout":{"x":114.99993896484375,"y":-16.0},"properties":{},"statusReference":"10001"}],"transitions":[{"actions":[],"description":"","id":"11","links":[],"name":"To Do","properties":{},"toStatusReference":"10001","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"21","links":[],"name":"In Progress","properties":{},"toStatusReference":"10002","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"41","links":[{"fromPort":0,"fromStatusReference":"10001","toPort":1}],"name":"Start work","properties":{},"toStatusReference":"10002","triggers":[],"type":"DIRECTED","validators":[]},{"actions":[],"description":"","id":"1","links":[],"name":"Create","properties":{},"toStatusReference":"10001","triggers":[],"type":"INITIAL","validators":[]},{"actions":[],"description":"","id":"31","links":[],"name":"Done","properties":{},"toStatusReference":"10003","triggers":[],"type":"GLOBAL","validators":[]}],"usages":[],"version":{"id":"f010ac1b-3dd3-43a3-aa66-0ee8a447f76e","versionNumber":0}}]}',
        );
    }

    public function testUpdateWorkflows(): void
    {
        $request = $this->deserialize(Schema\WorkflowUpdateRequest::class, [
            'statuses' => [
                [
                    'description' => '',
                    'name' => 'To Do',
                    'statusCategory' => 'TODO',
                    'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                ],
                [
                    'description' => '',
                    'name' => 'In Progress',
                    'statusCategory' => 'IN_PROGRESS',
                    'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                ],
                [
                    'description' => '',
                    'name' => 'Done',
                    'statusCategory' => 'DONE',
                    'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                ],
            ],
            'workflows' => [
                [
                    'defaultStatusMappings' => [
                        [
                            'newStatusReference' => '10011',
                            'oldStatusReference' => '10010',
                        ],
                    ],
                    'description' => '',
                    'id' => '10001',
                    'startPointLayout' => [
                        'x' => '-100.00030899048',
                        'y' => '-153.00020599365',
                    ],
                    'statusMappings' => [
                        [
                            'issueTypeId' => '10002',
                            'projectId' => '10003',
                            'statusMigrations' => [
                                [
                                    'newStatusReference' => '10011',
                                    'oldStatusReference' => '10010',
                                ],
                            ],
                        ],
                    ],
                    'statuses' => [
                        [
                            'layout' => [
                                'x' => '114.99993896484',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                        ],
                        [
                            'layout' => [
                                'x' => '317.00009155273',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                        ],
                        [
                            'layout' => [
                                'x' => '508.00024414062',
                                'y' => '-16',
                            ],
                            'properties' => [
                            ],
                            'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                        ],
                    ],
                    'transitions' => [
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '1',
                            'links' => [
                            ],
                            'name' => 'Create',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'INITIAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '11',
                            'links' => [
                            ],
                            'name' => 'To Do',
                            'properties' => [
                            ],
                            'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => '',
                            'id' => '21',
                            'links' => [
                            ],
                            'name' => 'In Progress',
                            'properties' => [
                            ],
                            'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            'triggers' => [
                            ],
                            'type' => 'GLOBAL',
                            'validators' => [
                            ],
                        ],
                        [
                            'actions' => [
                            ],
                            'description' => 'Move a work item from in progress to done',
                            'id' => '31',
                            'links' => [
                                [
                                    'fromPort' => '0',
                                    'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                    'toPort' => '1',
                                ],
                            ],
                            'name' => 'Done',
                            'properties' => [
                            ],
                            'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            'triggers' => [
                            ],
                            'type' => 'DIRECTED',
                            'validators' => [
                            ],
                        ],
                    ],
                    'version' => [
                        'id' => '6f6c988b-2590-4358-90c2-5f7960265592',
                        'versionNumber' => '1',
                    ],
                ],
            ],
        ]);

        $expand = null;

        $this->assertCall(
            method: 'updateWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows/update',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\WorkflowUpdateResponse::class,
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '{"statuses":[{"description":"","id":"10001","name":"To Do","scope":{"type":"GLOBAL"},"statusCategory":"TODO","statusReference":"10001","usages":[]},{"description":"","id":"10002","name":"In Progress","scope":{"type":"GLOBAL"},"statusCategory":"IN_PROGRESS","statusReference":"10002","usages":[]},{"description":"","id":"10003","name":"Done","scope":{"type":"GLOBAL"},"statusCategory":"DONE","statusReference":"10003","usages":[]}],"taskId":"10001","workflows":[{"description":"","id":"b9ff2384-d3b6-4d4e-9509-3ee19f607168","isEditable":true,"name":"Software workflow 1","scope":{"type":"GLOBAL"},"startPointLayout":{"x":-100.00030899047852,"y":-153.00020599365234},"statuses":[{"deprecated":false,"layout":{"x":317.0000915527344,"y":-16.0},"properties":{},"statusReference":"10002"},{"deprecated":false,"layout":{"x":508.000244140625,"y":-16.0},"properties":{},"statusReference":"10003"},{"deprecated":false,"layout":{"x":114.99993896484375,"y":-16.0},"properties":{},"statusReference":"10001"}],"transitions":[{"actions":[],"description":"","id":"21","links":[],"name":"In Progress","properties":{},"toStatusReference":"10002","triggers":[],"type":"GLOBAL","validators":[]},{"actions":[],"description":"","id":"31","links":[{"fromPort":0,"fromStatusReference":"10002","toPort":1}],"name":"Done","properties":{},"toStatusReference":"10003","triggers":[],"type":"DIRECTED","validators":[]},{"actions":[],"description":"","id":"1","links":[],"name":"Create","properties":{},"toStatusReference":"10001","triggers":[],"type":"INITIAL","validators":[]},{"actions":[],"description":"","id":"11","links":[],"name":"To Do","properties":{},"toStatusReference":"10002","triggers":[],"type":"GLOBAL","validators":[]}],"usages":[],"version":{"id":"f010ac1b-3dd3-43a3-aa66-0ee8a447f76e","versionNumber":0}}]}',
        );
    }

    public function testValidateUpdateWorkflows(): void
    {
        $request = $this->deserialize(Schema\WorkflowUpdateValidateRequestBean::class, [
            'payload' => [
                'statuses' => [
                    0 => [
                        'description' => '',
                        'name' => 'To Do',
                        'statusCategory' => 'TODO',
                        'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                    ],
                    1 => [
                        'description' => '',
                        'name' => 'In Progress',
                        'statusCategory' => 'IN_PROGRESS',
                        'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                    ],
                    2 => [
                        'description' => '',
                        'name' => 'Done',
                        'statusCategory' => 'DONE',
                        'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                    ],
                ],
                'workflows' => [
                    0 => [
                        'defaultStatusMappings' => [
                            0 => [
                                'newStatusReference' => '10011',
                                'oldStatusReference' => '10010',
                            ],
                        ],
                        'description' => '',
                        'id' => '10001',
                        'startPointLayout' => [
                            'x' => '-100.00030899048',
                            'y' => '-153.00020599365',
                        ],
                        'statusMappings' => [
                            0 => [
                                'issueTypeId' => '10002',
                                'projectId' => '10003',
                                'statusMigrations' => [
                                    0 => [
                                        'newStatusReference' => '10011',
                                        'oldStatusReference' => '10010',
                                    ],
                                ],
                            ],
                        ],
                        'statuses' => [
                            0 => [
                                'layout' => [
                                    'x' => '114.99993896484',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                            ],
                            1 => [
                                'layout' => [
                                    'x' => '317.00009155273',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                            ],
                            2 => [
                                'layout' => [
                                    'x' => '508.00024414062',
                                    'y' => '-16',
                                ],
                                'properties' => [
                                ],
                                'statusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                            ],
                        ],
                        'transitions' => [
                            0 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '1',
                                'links' => [
                                ],
                                'name' => 'Create',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'INITIAL',
                                'validators' => [
                                ],
                            ],
                            1 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '11',
                                'links' => [
                                ],
                                'name' => 'To Do',
                                'properties' => [
                                ],
                                'toStatusReference' => 'f0b24de5-25e7-4fab-ab94-63d81db6c0c0',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            2 => [
                                'actions' => [
                                ],
                                'description' => '',
                                'id' => '21',
                                'links' => [
                                ],
                                'name' => 'In Progress',
                                'properties' => [
                                ],
                                'toStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                'triggers' => [
                                ],
                                'type' => 'GLOBAL',
                                'validators' => [
                                ],
                            ],
                            3 => [
                                'actions' => [
                                ],
                                'description' => 'Move a work item from in progress to done',
                                'id' => '31',
                                'links' => [
                                    0 => [
                                        'fromPort' => '0',
                                        'fromStatusReference' => 'c7a35bf0-c127-4aa6-869f-4033730c61d8',
                                        'toPort' => '1',
                                    ],
                                ],
                                'name' => 'Done',
                                'properties' => [
                                ],
                                'toStatusReference' => '6b3fc04d-3316-46c5-a257-65751aeb8849',
                                'triggers' => [
                                ],
                                'type' => 'DIRECTED',
                                'validators' => [
                                ],
                            ],
                        ],
                        'version' => [
                            'id' => '6f6c988b-2590-4358-90c2-5f7960265592',
                            'versionNumber' => '1',
                        ],
                    ],
                ],
            ],
            'validationOptions' => [
                'levels' => [
                    0 => 'ERROR',
                    1 => 'WARNING',
                ],
            ],
        ]);

        $this->assertCall(
            method: 'validateUpdateWorkflows',
            call: [
                'uri' => '/rest/api/3/workflows/update/validation',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowValidationErrorList::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"errors":[{"code":"NON_UNIQUE_STATUS_NAME","elementReference":{"statusReference":"1f0443ff-47e4-4306-9c26-0af696059a43"},"level":"ERROR","message":"You must use a unique status name.","type":"STATUS"}]}',
        );
    }
}
