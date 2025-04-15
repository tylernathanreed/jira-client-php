<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowStatusCategoriesTest extends OperationsTestCase
{
    public function testGetStatusCategories(): void
    {
        $this->assertCall(
            method: 'getStatusCategories',
            call: [
                'uri' => '/rest/api/3/statuscategory',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\StatusCategory::class],
            ],
            arguments: [],
            response: '[{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"},{"colorName":"green","id":9,"key":"completed","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/9"}]',
        );
    }

    public function testGetStatusCategory(): void
    {
        $idOrKey = 'foo';

        $this->assertCall(
            method: 'getStatusCategory',
            call: [
                'uri' => '/rest/api/3/statuscategory/{idOrKey}',
                'method' => 'get',
                'path' => compact('idOrKey'),
                'success' => 200,
                'schema' => Schema\StatusCategory::class,
            ],
            arguments: [
                $idOrKey,
            ],
            response: '{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"}',
        );
    }
}
