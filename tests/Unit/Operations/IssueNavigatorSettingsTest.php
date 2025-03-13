<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueNavigatorSettingsTest extends OperationsTestCase
{
    public function testGetIssueNavigatorDefaultColumns(): void
    {
        $this->assertCall(
            method: 'getIssueNavigatorDefaultColumns',
            call: [
                'uri' => '/rest/api/3/settings/columns',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ColumnItem::class],
            ],
            arguments: [],
            response: '[{"label":"Key","value":"issuekey"},{"label":"Summary","value":"summary"}]',
        );
    }

    public function testSetIssueNavigatorDefaultColumns(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setIssueNavigatorDefaultColumns',
            call: [
                'uri' => '/rest/api/3/settings/columns',
                'method' => 'put',
                'success' => 200,
                'schema' => true,
            ],
            arguments: [],
            response: null,
        );
    }
}
