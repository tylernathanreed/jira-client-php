<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowSchemesTest extends OperationsTestCase
{
    public function testGetAllWorkflowSchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getAllWorkflowSchemes',
            call: [
                'uri' => '/rest/api/3/workflowscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanWorkflowScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":2,"values":[{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"},{"defaultWorkflow":"jira","description":"The description of the another example workflow scheme.","id":101011,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Another example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101011"}]}',
        );
    }

    public function testCreateWorkflowScheme(): void
    {
        $request = $this->deserialize(Schema\WorkflowScheme::class, [
            'defaultWorkflow' => 'jira',
            'description' => 'The description of the example workflow scheme.',
            'issueTypeMappings' => [
                10000 => 'scrum workflow',
                10001 => 'builds workflow',
            ],
            'name' => 'Example workflow scheme',
        ]);

        $this->assertCall(
            method: 'createWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testReadWorkflowSchemes(): void
    {
        $request = $this->deserialize(Schema\WorkflowSchemeReadRequest::class, [
            'projectIds' => [
                '10047',
                '10048',
            ],
            'workflowSchemeIds' => [
                '3e59db0f-ed6c-47ce-8d50-80c0c4572677',
            ],
        ]);

        $expand = null;

        $this->assertCall(
            method: 'readWorkflowSchemes',
            call: [
                'uri' => '/rest/api/3/workflowscheme/read',
                'method' => 'post',
                'body' => $request,
                'query' => compact('expand'),
                'success' => 200,
                'schema' => [Schema\WorkflowSchemeReadResponse::class],
            ],
            arguments: [
                $request,
                $expand,
            ],
            response: '[{"defaultWorkflow":{"description":"This is the default workflow for Software Development projects.","id":"3e59db0f-ed6c-47ce-8d50-80c0c4572677","name":"Default Software Development Workflow","usage":[{"issueTypeIds":[],"projectId":"10047"}],"version":{"id":"657812fc-bc72-400f-aae0-df8d88db3d9g","versionNumber":1}},"description":"This is the workflow scheme for the Software Development project type.","id":"3g78dg2a-ns2n-56ab-9812-42h5j1464567","name":"Software Developer Workflow Scheme","projectIdsUsingScheme":["10047"],"scope":{"project":{"id":"10047"},"type":"GLOBAL"},"taskId":"3f83dg2a-ns2n-56ab-9812-42h5j1461629","version":{"id":"527213fc-bc72-400f-aae0-df8d88db2c8a","versionNumber":1},"workflowsForIssueTypes":[{"issueTypeIds":["10013"],"workflow":{"description":"This is the workflow for the Software Development bug issue type.","id":"5e79ae0f-ed6c-47ce-8d50-80c0c4572745","name":"Software Development Bug Workflow","usage":[{"issueTypeIds":["10013"],"projectId":"10047"}],"version":{"id":"897812dc-bc72-400f-aae0-df8d88fe3d8f","versionNumber":1}}}]}]',
        );
    }

    public function testUpdateSchemes(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'updateSchemes',
            call: [
                'uri' => '/rest/api/3/workflowscheme/update',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }

    public function testUpdateWorkflowSchemeMappings(): void
    {
        $request = $this->deserialize(Schema\WorkflowSchemeUpdateRequiredMappingsRequest::class, [
            'defaultWorkflowId' => '10010',
            'id' => '10001',
            'workflowsForIssueTypes' => [
                [
                    'issueTypeIds' => [
                        '10010',
                        '10011',
                    ],
                    'workflowId' => '10001',
                ],
            ],
        ]);

        $this->assertCall(
            method: 'updateWorkflowSchemeMappings',
            call: [
                'uri' => '/rest/api/3/workflowscheme/update/mappings',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\WorkflowSchemeUpdateRequiredMappingsResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"statusMappingsByIssueTypes":[{"issueTypeId":"10000","statusIds":["10000","10001"]}],"statusMappingsByWorkflows":[{"sourceWorkflowId":"10000","statusIds":["10000","10001"],"targetWorkflowId":"10001"}],"statuses":[{"category":"TODO","id":"10000","name":"To Do"}],"statusesPerWorkflow":[{"initialStatusId":"10000","statuses":["10000","10001"],"workflowId":"10000"}]}',
        );
    }

    public function testGetWorkflowScheme(): void
    {
        $id = 1234;
        $returnDraftIfExists = false;

        $this->assertCall(
            method: 'getWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}',
                'method' => 'get',
                'query' => compact('returnDraftIfExists'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
                $returnDraftIfExists,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testUpdateWorkflowScheme(): void
    {
        $request = $this->deserialize(Schema\WorkflowScheme::class, [
            'defaultWorkflow' => 'jira',
            'description' => 'The description of the example workflow scheme.',
            'issueTypeMappings' => [
                10000 => 'scrum workflow',
            ],
            'name' => 'Example workflow scheme',
            'updateDraftIfNeeded' => false,
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'updateWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testDeleteWorkflowScheme(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testGetDefaultWorkflow(): void
    {
        $id = 1234;
        $returnDraftIfExists = false;

        $this->assertCall(
            method: 'getDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/default',
                'method' => 'get',
                'query' => compact('returnDraftIfExists'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\DefaultWorkflow::class,
            ],
            arguments: [
                $id,
                $returnDraftIfExists,
            ],
            response: '{"workflow":"jira"}',
        );
    }

    public function testUpdateDefaultWorkflow(): void
    {
        $request = $this->deserialize(Schema\DefaultWorkflow::class, [
            'updateDraftIfNeeded' => false,
            'workflow' => 'jira',
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'updateDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/default',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testDeleteDefaultWorkflow(): void
    {
        $id = 1234;
        $updateDraftIfNeeded = null;

        $this->assertCall(
            method: 'deleteDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/default',
                'method' => 'delete',
                'query' => compact('updateDraftIfNeeded'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
                $updateDraftIfNeeded,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testGetWorkflowSchemeIssueType(): void
    {
        $id = 1234;
        $issueType = 'foo';
        $returnDraftIfExists = false;

        $this->assertCall(
            method: 'getWorkflowSchemeIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
                'method' => 'get',
                'query' => compact('returnDraftIfExists'),
                'path' => compact('id', 'issueType'),
                'success' => 200,
                'schema' => Schema\IssueTypeWorkflowMapping::class,
            ],
            arguments: [
                $id,
                $issueType,
                $returnDraftIfExists,
            ],
            response: '{"issueType":"10000","workflow":"jira"}',
        );
    }

    public function testSetWorkflowSchemeIssueType(): void
    {
        $request = $this->deserialize(Schema\IssueTypeWorkflowMapping::class, [
            'issueType' => '10000',
            'updateDraftIfNeeded' => false,
            'workflow' => 'jira',
        ]);

        $id = 1234;
        $issueType = 'foo';

        $this->assertCall(
            method: 'setWorkflowSchemeIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id', 'issueType'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $request,
                $id,
                $issueType,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testDeleteWorkflowSchemeIssueType(): void
    {
        $id = 1234;
        $issueType = 'foo';
        $updateDraftIfNeeded = false;

        $this->assertCall(
            method: 'deleteWorkflowSchemeIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/issuetype/{issueType}',
                'method' => 'delete',
                'query' => compact('updateDraftIfNeeded'),
                'path' => compact('id', 'issueType'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
                $issueType,
                $updateDraftIfNeeded,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testGetWorkflow(): void
    {
        $id = 1234;
        $workflowName = null;
        $returnDraftIfExists = false;

        $this->assertCall(
            method: 'getWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/workflow',
                'method' => 'get',
                'query' => compact('workflowName', 'returnDraftIfExists'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\IssueTypesWorkflowMapping::class,
            ],
            arguments: [
                $id,
                $workflowName,
                $returnDraftIfExists,
            ],
            response: '{"defaultMapping":false,"issueTypes":["10000","10001"],"workflow":"jira"}',
        );
    }

    public function testUpdateWorkflowMapping(): void
    {
        $request = $this->deserialize(Schema\IssueTypesWorkflowMapping::class, [
            'issueTypes' => [
                '10000',
            ],
            'updateDraftIfNeeded' => true,
            'workflow' => 'jira',
        ]);

        $id = 1234;
        $workflowName = 'foo';

        $this->assertCall(
            method: 'updateWorkflowMapping',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/workflow',
                'method' => 'put',
                'body' => $request,
                'query' => compact('workflowName'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $request,
                $id,
                $workflowName,
            ],
            response: '{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","draft":false,"id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}',
        );
    }

    public function testDeleteWorkflowMapping(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteWorkflowMapping',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/workflow',
                'method' => 'delete',
                'query' => compact('workflowName', 'updateDraftIfNeeded'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
                $workflowName,
                $updateDraftIfNeeded,
            ],
            response: null,
        );
    }

    public function testGetProjectUsagesForWorkflowScheme(): void
    {
        $workflowSchemeId = 'foo';
        $nextPageToken = null;
        $maxResults = 50;

        $this->assertCall(
            method: 'getProjectUsagesForWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{workflowSchemeId}/projectUsages',
                'method' => 'get',
                'query' => compact('nextPageToken', 'maxResults'),
                'path' => compact('workflowSchemeId'),
                'success' => 200,
                'schema' => Schema\WorkflowSchemeProjectUsageDTO::class,
            ],
            arguments: [
                $workflowSchemeId,
                $nextPageToken,
                $maxResults,
            ],
            response: '{"projects":{"nextPageToken":"eyJvIjoyfQ==","values":[{"id":"1003"}]},"workflowSchemeId":"10005"}',
        );
    }
}
