<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldAssociationsTest extends OperationsTestCase
{
    public function testCreateAssociations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'createAssociations',
            call: [
                'uri' => '/rest/api/3/field/association',
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

    public function testRemoveAssociations(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'removeAssociations',
            call: [
                'uri' => '/rest/api/3/field/association',
                'method' => 'delete',
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
