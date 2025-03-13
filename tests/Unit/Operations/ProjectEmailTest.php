<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectEmailTest extends OperationsTestCase
{
    public function testGetProjectEmail(): void
    {
        $projectId = 1234;

        $this->assertCall(
            method: 'getProjectEmail',
            call: [
                'uri' => '/rest/api/3/project/{projectId}/email',
                'method' => 'get',
                'path' => compact('projectId'),
                'success' => 200,
                'schema' => Schema\ProjectEmailAddress::class,
            ],
            arguments: [
                $projectId,
            ],
            response: '{"emailAddress":"jira@example.customdomain.com","emailAddressStatus":["Email address or domain not verified."]}',
        );
    }

    public function testUpdateProjectEmail(): void
    {
        $request = new Schema\ProjectEmailAddress(
            emailAddress: 'jira@example.atlassian.net',
        );

        $projectId = 1234;

        $this->assertCall(
            method: 'updateProjectEmail',
            call: [
                'uri' => '/rest/api/3/project/{projectId}/email',
                'method' => 'put',
                'body' => $request,
                'path' => compact('projectId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $projectId,
            ],
            response: null,
        );
    }
}
