<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class LabelsTest extends OperationsTestCase
{
    public function testGetAllLabels(): void
    {
        $startAt = 0;
        $maxResults = 1000;

        $this->assertCall(
            method: 'getAllLabels',
            call: [
                'uri' => '/rest/api/3/label',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanString::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":false,"maxResults":2,"startAt":0,"total":100,"values":["performance","security"]}',
        );
    }
}
