<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowSchemeProjectAssociationsTest extends OperationsTestCase
{
    public function testGetWorkflowSchemeProjectAssociations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getWorkflowSchemeProjectAssociations',
            call: [
                'uri' => '/rest/api/3/workflowscheme/project',
                'method' => 'get',
                'query' => compact('projectId'),
                'success' => 200,
                'schema' => Schema\ContainerOfWorkflowSchemeAssociations::class,
            ],
            arguments: [
                $projectId,
            ],
            response: '{"values":[{"projectIds":["10010","10020"],"workflowScheme":{"defaultWorkflow":"jira","description":"The description of the example workflow scheme.","id":101010,"issueTypeMappings":{"10000":"scrum workflow","10001":"builds workflow"},"name":"Example workflow scheme","self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/101010"}}]}',
        );
    }

    public function testAssignSchemeToProject(): void
    {
        $request = $this->deserialize(Schema\WorkflowSchemeProjectAssociation::class, [
            'projectId' => '10001',
            'workflowSchemeId' => '10032',
        ]);

        $this->assertCall(
            method: 'assignSchemeToProject',
            call: [
                'uri' => '/rest/api/3/workflowscheme/project',
                'method' => 'put',
                'body' => $request,
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }
}
