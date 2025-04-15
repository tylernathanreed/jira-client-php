<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class WorkflowStatusesTest extends OperationsTestCase
{
    public function testGetStatuses(): void
    {
        $this->assertCall(
            method: 'getStatuses',
            call: [
                'uri' => '/rest/api/3/status',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\StatusDetails::class],
            ],
            arguments: [],
            response: '[{"description":"The issue is currently being worked on.","iconUrl":"https://your-domain.atlassian.net/images/icons/progress.gif","id":"10000","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/status/10000","statusCategory":{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"}},{"description":"The issue is closed.","iconUrl":"https://your-domain.atlassian.net/images/icons/closed.gif","id":"5","name":"Closed","self":"https://your-domain.atlassian.net/rest/api/3/status/5","statusCategory":{"colorName":"green","id":9,"key":"completed","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/9"}}]',
        );
    }

    public function testGetStatus(): void
    {
        $idOrName = 'foo';

        $this->assertCall(
            method: 'getStatus',
            call: [
                'uri' => '/rest/api/3/status/{idOrName}',
                'method' => 'get',
                'path' => compact('idOrName'),
                'success' => 200,
                'schema' => Schema\StatusDetails::class,
            ],
            arguments: [
                $idOrName,
            ],
            response: '{"description":"The issue is currently being worked on.","iconUrl":"https://your-domain.atlassian.net/images/icons/progress.gif","id":"10000","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/status/10000","statusCategory":{"colorName":"yellow","id":1,"key":"in-flight","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/statuscategory/1"}}',
        );
    }
}
