<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowSchemeDraftsTest extends OperationsTestCase
{
    public function testCreateWorkflowSchemeDraftFromParent(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'createWorkflowSchemeDraftFromParent',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/createdraft',
                'method' => 'post',
                'path' => compact('id'),
                'success' => 201,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testGetWorkflowSchemeDraft(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getWorkflowSchemeDraft',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testUpdateWorkflowSchemeDraft(): void
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
            method: 'updateWorkflowSchemeDraft',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft',
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
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testDeleteWorkflowSchemeDraft(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteWorkflowSchemeDraft',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft',
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

    public function testGetDraftDefaultWorkflow(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getDraftDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/default',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\DefaultWorkflow::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"workflow":"jira"}',
        );
    }

    public function testUpdateDraftDefaultWorkflow(): void
    {
        $request = $this->deserialize(Schema\DefaultWorkflow::class, [
            'updateDraftIfNeeded' => false,
            'workflow' => 'jira',
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'updateDraftDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/default',
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
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testDeleteDraftDefaultWorkflow(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteDraftDefaultWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/default',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testGetWorkflowSchemeDraftIssueType(): void
    {
        $id = 1234;
        $issueType = 'foo';

        $this->assertCall(
            method: 'getWorkflowSchemeDraftIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
                'method' => 'get',
                'path' => compact('id', 'issueType'),
                'success' => 200,
                'schema' => Schema\IssueTypeWorkflowMapping::class,
            ],
            arguments: [
                $id,
                $issueType,
            ],
            response: '{"issueType":"10000","workflow":"jira"}',
        );
    }

    public function testSetWorkflowSchemeDraftIssueType(): void
    {
        $request = $this->deserialize(Schema\IssueTypeWorkflowMapping::class, [
            'issueType' => '10000',
            'updateDraftIfNeeded' => false,
            'workflow' => 'jira',
        ]);

        $id = 1234;
        $issueType = 'foo';

        $this->assertCall(
            method: 'setWorkflowSchemeDraftIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
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
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testDeleteWorkflowSchemeDraftIssueType(): void
    {
        $id = 1234;
        $issueType = 'foo';

        $this->assertCall(
            method: 'deleteWorkflowSchemeDraftIssueType',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/issuetype/{issueType}',
                'method' => 'delete',
                'path' => compact('id', 'issueType'),
                'success' => 200,
                'schema' => Schema\WorkflowScheme::class,
            ],
            arguments: [
                $id,
                $issueType,
            ],
            response: '{"defaultWorkflow":"scrum workflow","description":"The description of the example workflow scheme.","draft":true,"id":17218781,"issueTypeMappings":{"10000":"jira","10001":"jira"},"lastModified":"Today 6:38 PM","lastModifiedUser":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"name":"Example workflow scheme","originalDefaultWorkflow":"jira","originalIssueTypeMappings":{"10001":"builds workflow"},"self":"https://your-domain.atlassian.net/rest/api/3/workflowscheme/17218781/draft"}',
        );
    }

    public function testPublishDraftWorkflowScheme(): void
    {
        $request = $this->deserialize(Schema\PublishDraftWorkflowScheme::class, [
            'statusMappings' => [
                [
                    'issueTypeId' => '10001',
                    'newStatusId' => '1',
                    'statusId' => '3',
                ],
                [
                    'issueTypeId' => '10001',
                    'newStatusId' => '2',
                    'statusId' => '2',
                ],
                [
                    'issueTypeId' => '10002',
                    'newStatusId' => '10003',
                    'statusId' => '10005',
                ],
                [
                    'issueTypeId' => '10003',
                    'newStatusId' => '1',
                    'statusId' => '4',
                ],
            ],
        ]);

        $id = 1234;
        $validateOnly = false;

        $this->assertCall(
            method: 'publishDraftWorkflowScheme',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/publish',
                'method' => 'post',
                'body' => $request,
                'query' => compact('validateOnly'),
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
                $validateOnly,
            ],
            response: null,
        );
    }

    public function testGetDraftWorkflow(): void
    {
        $id = 1234;
        $workflowName = null;

        $this->assertCall(
            method: 'getDraftWorkflow',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/workflow',
                'method' => 'get',
                'query' => compact('workflowName'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\IssueTypesWorkflowMapping::class,
            ],
            arguments: [
                $id,
                $workflowName,
            ],
            response: '{"defaultMapping":false,"issueTypes":["10000","10001"],"workflow":"jira"}',
        );
    }

    public function testUpdateDraftWorkflowMapping(): void
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
            method: 'updateDraftWorkflowMapping',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/workflow',
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

    public function testDeleteDraftWorkflowMapping(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteDraftWorkflowMapping',
            call: [
                'uri' => '/rest/api/3/workflowscheme/{id}/draft/workflow',
                'method' => 'delete',
                'query' => compact('workflowName'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
                $workflowName,
            ],
            response: null,
        );
    }
}
