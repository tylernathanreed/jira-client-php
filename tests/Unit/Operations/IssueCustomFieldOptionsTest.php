<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldOptionsTest extends OperationsTestCase
{
    public function testGetCustomFieldOption(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getCustomFieldOption',
            call: [
                'uri' => '/rest/api/3/customFieldOption/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\CustomFieldOption::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"self":"https://your-domain.atlassian.net/rest/api/3/customFieldOption/10000","value":"To Do"}',
        );
    }

    public function testGetOptionsForContext(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getOptionsForContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option',
                'method' => 'get',
                'query' => compact('optionId', 'onlyOptions', 'startAt', 'maxResults'),
                'path' => compact('fieldId', 'contextId'),
                'success' => 200,
                'schema' => Schema\PageBeanCustomFieldContextOption::class,
            ],
            arguments: [
                $fieldId,
                $contextId,
                $optionId,
                $onlyOptions,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":4,"values":[{"id":"10001","value":"New York"},{"id":"10002","value":"Boston","disabled":true},{"id":"10004","value":"Denver"},{"id":"10003","value":"Brooklyn","optionId":"10001"}]}',
        );
    }

    public function testUpdateCustomFieldOption(): void
    {
        $request = $this->deserialize(Schema\BulkCustomFieldOptionUpdateRequest::class, [
            'options' => [
                [
                    'disabled' => '',
                    'id' => '10001',
                    'value' => 'Scranton',
                ],
                [
                    'disabled' => '1',
                    'id' => '10002',
                    'value' => 'Manhattan',
                ],
                [
                    'disabled' => '',
                    'id' => '10003',
                    'value' => 'The Electric City',
                ],
            ],
        ]);

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'updateCustomFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option',
                'method' => 'put',
                'body' => $request,
                'path' => compact('fieldId', 'contextId'),
                'success' => 200,
                'schema' => Schema\CustomFieldUpdatedContextOptionsList::class,
            ],
            arguments: [
                $request,
                $fieldId,
                $contextId,
            ],
            response: '{"options":[{"disabled":false,"id":"10001","value":"Scranton"},{"disabled":true,"id":"10002","value":"Manhattan"},{"disabled":false,"id":"10003","value":"The Electric City"}]}',
        );
    }

    public function testCreateCustomFieldOption(): void
    {
        $request = $this->deserialize(Schema\BulkCustomFieldOptionCreateRequest::class, [
            'options' => [
                [
                    'disabled' => '',
                    'value' => 'Scranton',
                ],
                [
                    'disabled' => '1',
                    'optionId' => '10000',
                    'value' => 'Manhattan',
                ],
                [
                    'disabled' => '',
                    'value' => 'The Electric City',
                ],
            ],
        ]);

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'createCustomFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option',
                'method' => 'post',
                'body' => $request,
                'path' => compact('fieldId', 'contextId'),
                'success' => 200,
                'schema' => Schema\CustomFieldCreatedContextOptionsList::class,
            ],
            arguments: [
                $request,
                $fieldId,
                $contextId,
            ],
            response: '{"options":[{"disabled":false,"id":"10001","value":"Scranton"},{"disabled":true,"id":"10002","optionId":"10000","value":"Manhattan"},{"disabled":false,"id":"10003","value":"The Electric City"}]}',
        );
    }

    public function testReorderCustomFieldOptions(): void
    {
        $request = $this->deserialize(Schema\OrderOfCustomFieldOptions::class, [
            'customFieldOptionIds' => [
                '10001',
                '10002',
            ],
            'position' => 'First',
        ]);

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'reorderCustomFieldOptions',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option/move',
                'method' => 'put',
                'body' => $request,
                'path' => compact('fieldId', 'contextId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $fieldId,
                $contextId,
            ],
            response: null,
        );
    }

    public function testDeleteCustomFieldOption(): void
    {
        $fieldId = 'foo';
        $contextId = 1234;
        $optionId = 1234;

        $this->assertCall(
            method: 'deleteCustomFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}',
                'method' => 'delete',
                'path' => compact('fieldId', 'contextId', 'optionId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $fieldId,
                $contextId,
                $optionId,
            ],
            response: null,
        );
    }

    public function testReplaceCustomFieldOption(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'replaceCustomFieldOption',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}/issue',
                'method' => 'delete',
                'query' => compact('replaceWith', 'jql'),
                'path' => compact('fieldId', 'optionId', 'contextId'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanRemoveOptionFromIssuesResult::class,
            ],
            arguments: [
                $fieldId,
                $optionId,
                $contextId,
                $replaceWith,
                $jql,
            ],
            response: '{"self":"https://your-domain.atlassian.net/rest/api/3/task/1","id":"1","description":"Remove option 1 from issues matched by \'*\', and replace with option 3","status":"COMPLETE","result":{"errors":{"errorMessages":["Option 2 cannot be set on issue MKY-5 as it is not in the correct scope"],"errors":{},"httpStatusCode":{"empty":false,"present":true}},"modifiedIssues":[10001,10010],"unmodifiedIssues":[10005]},"elapsedRuntime":42}',
        );
    }
}
