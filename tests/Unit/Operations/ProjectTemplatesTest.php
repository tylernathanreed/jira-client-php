<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectTemplatesTest extends OperationsTestCase
{
    public function testCreateProjectWithCustomTemplate(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'createProjectWithCustomTemplate',
            call: [
                'uri' => '/rest/api/3/project-template',
                'method' => 'post',
                'body' => $request,
                'success' => 303,
                'schema' => true,
            ],
            arguments: [
                $request,
            ],
            response: null,
        );
    }
}
