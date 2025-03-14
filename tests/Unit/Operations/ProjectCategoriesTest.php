<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectCategoriesTest extends OperationsTestCase
{
    public function testGetAllProjectCategories(): void
    {
        $this->assertCall(
            method: 'getAllProjectCategories',
            call: [
                'uri' => '/rest/api/3/projectCategory',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ProjectCategory::class],
            ],
            arguments: [],
            response: '[{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},{"description":"Second Project Category","id":"10001","name":"SECOND","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10001"}]',
        );
    }

    public function testCreateProjectCategory(): void
    {
        $request = $this->deserialize(Schema\ProjectCategory::class, [
            'description' => 'Created Project Category',
            'name' => 'CREATED',
        ]);

        $this->assertCall(
            method: 'createProjectCategory',
            call: [
                'uri' => '/rest/api/3/projectCategory',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\ProjectCategory::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"description":"Created Project Category","id":"10100","name":"CREATED","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10100"}',
        );
    }

    public function testGetProjectCategoryById(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'getProjectCategoryById',
            call: [
                'uri' => '/rest/api/3/projectCategory/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\ProjectCategory::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"}',
        );
    }

    public function testUpdateProjectCategory(): void
    {
        $request = $this->deserialize(Schema\ProjectCategory::class, [
            'description' => 'Updated Project Category',
            'name' => 'UPDATED',
        ]);

        $id = 1234;

        $this->assertCall(
            method: 'updateProjectCategory',
            call: [
                'uri' => '/rest/api/3/projectCategory/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\UpdatedProjectCategory::class,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: '{"description":"Updated Project Category","id":"10100","name":"UPDATED","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10100"}',
        );
    }

    public function testRemoveProjectCategory(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'removeProjectCategory',
            call: [
                'uri' => '/rest/api/3/projectCategory/{id}',
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
}
