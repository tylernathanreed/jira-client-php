<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AuditRecordsTest extends OperationsTestCase
{
    public function testGetAuditRecords(): void
    {
        $offset = null;

        $limit = null;

        $filter = null;

        $from = null;

        $to = null;

        $this->assertCall(
            method: 'getAuditRecords',
            call: [
                'uri' => '/rest/api/3/auditing/record',
                'method' => 'get',
                'query' => compact('offset', 'limit', 'filter', 'from', 'to'),
                'success' => 200,
                'schema' => Schema\AuditRecords::class,
            ],
            arguments: [
                $offset,
            
                $limit,
            
                $filter,
            
                $from,
            
                $to,
            ],
            response: '{"limit":1000,"offset":0,"records":[{"associatedItems":[{"id":"jira-software-users","name":"jira-software-users","parentId":"1","parentName":"Jira Internal Directory","typeName":"GROUP"}],"authorAccountId":"5ab8f18d741e9c2c7e9d4538","authorKey":"administrator","category":"user management","changedValues":[{"changedFrom":"user@atlassian.com","changedTo":"newuser@atlassian.com","fieldName":"email"}],"created":"2014-03-19T18:45:42.967+0000","description":"Optional description","eventSource":"Jira Connect Plugin","id":1,"objectItem":{"id":"user","name":"user","parentId":"1","parentName":"Jira Internal Directory","typeName":"USER"},"remoteAddress":"192.168.1.1","summary":"User created"}],"total":1}',
        );
    }
}
