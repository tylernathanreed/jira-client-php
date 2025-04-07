<?php

namespace Tests\Unit\Operations;

use Reedware\OpenApi\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldAssociationsTest extends OperationsTestCase
{
    public function testCreateAssociations(): void
    {
        $request = $this->deserialize(Schema\FieldAssociationsRequest::class, [
            'associationContexts' => [
                [
                    'identifier' => '10000',
                    'type' => 'PROJECT_ID',
                ],
                [
                    'identifier' => '10001',
                    'type' => 'PROJECT_ID',
                ],
            ],
            'fields' => [
                [
                    'identifier' => 'customfield_10000',
                    'type' => 'FIELD_ID',
                ],
                [
                    'identifier' => 'customfield_10001',
                    'type' => 'FIELD_ID',
                ],
            ],
        ]);

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
        $request = $this->deserialize(Schema\FieldAssociationsRequest::class, [
            'associationContexts' => [
                [
                    'identifier' => '10000',
                    'type' => 'PROJECT_ID',
                ],
                [
                    'identifier' => '10001',
                    'type' => 'PROJECT_ID',
                ],
            ],
            'fields' => [
                [
                    'identifier' => 'customfield_10000',
                    'type' => 'FIELD_ID',
                ],
                [
                    'identifier' => 'customfield_10001',
                    'type' => 'FIELD_ID',
                ],
            ],
        ]);

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
