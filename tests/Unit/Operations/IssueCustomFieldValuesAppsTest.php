<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldValuesAppsTest extends OperationsTestCase
{
    public function testUpdateMultipleCustomFieldValues(): void
    {
        $request = $this->deserialize(Schema\MultipleCustomFieldValuesUpdateDetails::class, [
            'updates' => [
                [
                    'customField' => 'customfield_10010',
                    'issueIds' => [
                        '10010',
                        '10011',
                    ],
                    'value' => 'new value',
                ],
                [
                    'customField' => 'customfield_10011',
                    'issueIds' => [
                        '10010',
                    ],
                    'value' => '1000',
                ],
            ],
        ]);

        $generateChangelog = true;

        $this->assertCall(
            method: 'updateMultipleCustomFieldValues',
            call: [
                'uri' => '/rest/api/3/app/field/value',
                'method' => 'post',
                'body' => $request,
                'query' => compact('generateChangelog'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $generateChangelog,
            ],
            response: null,
        );
    }

    public function testUpdateCustomFieldValue(): void
    {
        $request = $this->deserialize(Schema\CustomFieldValueUpdateDetails::class, [
            'updates' => [
                [
                    'issueIds' => [
                        '10010',
                    ],
                    'value' => 'new value',
                ],
            ],
        ]);

        $fieldIdOrKey = 'foo';
        $generateChangelog = true;

        $this->assertCall(
            method: 'updateCustomFieldValue',
            call: [
                'uri' => '/rest/api/3/app/field/{fieldIdOrKey}/value',
                'method' => 'put',
                'body' => $request,
                'query' => compact('generateChangelog'),
                'path' => compact('fieldIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $fieldIdOrKey,
                $generateChangelog,
            ],
            response: null,
        );
    }
}
