<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueCustomFieldContextsTest extends OperationsTestCase
{
    public function testGetContextsForField(): void
    {
        $fieldId = 'foo';
        $isAnyIssueType = null;
        $isGlobalContext = null;
        $contextId = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getContextsForField',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context',
                'method' => 'get',
                'query' => compact('isAnyIssueType', 'isGlobalContext', 'contextId', 'startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanCustomFieldContext::class,
            ],
            arguments: [
                $fieldId,
                $isAnyIssueType,
                $isGlobalContext,
                $contextId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":2,"values":[{"id":"10025","name":"Bug fields context","description":"A context used to define the custom field options for bugs.","isGlobalContext":true,"isAnyIssueType":false},{"id":"10026","name":"Task fields context","description":"A context used to define the custom field options for tasks.","isGlobalContext":false,"isAnyIssueType":false}]}',
        );
    }

    public function testCreateCustomFieldContext(): void
    {
        $request = new Schema\CreateCustomFieldContext(
            description: 'A context used to define the custom field options for bugs.',
            issueTypeIds: [
                '10010',
            ],
            name: 'Bug fields context',
            projectIds: [
            ],
        );

        $fieldId = 'foo';

        $this->assertCall(
            method: 'createCustomFieldContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context',
                'method' => 'post',
                'body' => $request,
                'path' => compact('fieldId'),
                'success' => 201,
                'schema' => Schema\CreateCustomFieldContext::class,
            ],
            arguments: [
                $request,
                $fieldId,
            ],
            response: '{"id":"10025","name":"Bug fields context","description":"A context used to define the custom field options for bugs.","projectIds":[],"issueTypeIds":["10010"]}',
        );
    }

    public function testGetDefaultValues(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getDefaultValues',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/defaultValue',
                'method' => 'get',
                'query' => compact('contextId', 'startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanCustomFieldContextDefaultValue::class,
            ],
            arguments: [
                $fieldId,
                $contextId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"contextId":"10100","optionId":"10001"},{"contextId":"10101","optionId":"10003"},{"contextId":"10103"}]}',
        );
    }

    public function testSetDefaultValues(): void
    {
        $request = new Schema\CustomFieldContextDefaultValueUpdate(
            defaultValues: [
                [
                    'contextId' => '10100',
                    'optionId' => '10001',
                    'type' => 'option.single',
                ],
                [
                    'contextId' => '10101',
                    'optionId' => '10003',
                    'type' => 'option.single',
                ],
                [
                    'contextId' => '10103',
                    'optionId' => '10005',
                    'type' => 'option.single',
                ],
            ],
        );

        $fieldId = 'foo';

        $this->assertCall(
            method: 'setDefaultValues',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/defaultValue',
                'method' => 'put',
                'body' => $request,
                'path' => compact('fieldId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $fieldId,
            ],
            response: null,
        );
    }

    public function testGetIssueTypeMappingsForContexts(): void
    {
        $fieldId = 'foo';
        $contextId = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getIssueTypeMappingsForContexts',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/issuetypemapping',
                'method' => 'get',
                'query' => compact('contextId', 'startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanIssueTypeToContextMapping::class,
            ],
            arguments: [
                $fieldId,
                $contextId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":3,"values":[{"contextId":"10001","issueTypeId":"10010"},{"contextId":"10001","issueTypeId":"10011"},{"contextId":"10002","isAnyIssueType":true}]}',
        );
    }

    public function testGetCustomFieldContextsForProjectsAndIssueTypes(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getCustomFieldContextsForProjectsAndIssueTypes',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/mapping',
                'method' => 'post',
                'body' => $request,
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanContextForProjectAndIssueType::class,
            ],
            arguments: [
                $request,
                $fieldId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":3,"values":[{"projectId":"10000","issueTypeId":"10000","contextId":"10000"},{"projectId":"10000","issueTypeId":"10001","contextId":null},{"projectId":"10001","issueTypeId":"10002","contextId":"10003"}]}',
        );
    }

    public function testGetProjectContextMapping(): void
    {
        $fieldId = 'foo';
        $contextId = null;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getProjectContextMapping',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/projectmapping',
                'method' => 'get',
                'query' => compact('contextId', 'startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanCustomFieldContextProjectMapping::class,
            ],
            arguments: [
                $fieldId,
                $contextId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":2,"values":[{"contextId":"10025","projectId":"10001"},{"contextId":"10026","isGlobalContext":true}]}',
        );
    }

    public function testUpdateCustomFieldContext(): void
    {
        $request = new Schema\CustomFieldContextUpdateDetails(
            description: 'A context used to define the custom field options for bugs.',
            name: 'Bug fields context',
        );

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'updateCustomFieldContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}',
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

    public function testDeleteCustomFieldContext(): void
    {
        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'deleteCustomFieldContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}',
                'method' => 'delete',
                'path' => compact('fieldId', 'contextId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $fieldId,
                $contextId,
            ],
            response: null,
        );
    }

    public function testAddIssueTypesToContext(): void
    {
        $request = new Schema\IssueTypeIds(
            issueTypeIds: [
                '10001',
                '10005',
                '10006',
            ],
        );

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'addIssueTypesToContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype',
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

    public function testRemoveIssueTypesFromContext(): void
    {
        $request = new Schema\IssueTypeIds(
            issueTypeIds: [
                '10001',
                '10005',
                '10006',
            ],
        );

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'removeIssueTypesFromContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/issuetype/remove',
                'method' => 'post',
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

    public function testAssignProjectsToCustomFieldContext(): void
    {
        $request = new Schema\ProjectIds(
            projectIds: [
                '10001',
                '10005',
                '10006',
            ],
        );

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'assignProjectsToCustomFieldContext',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/project',
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

    public function testRemoveCustomFieldContextFromProjects(): void
    {
        $request = new Schema\ProjectIds(
            projectIds: [
                '10001',
                '10005',
                '10006',
            ],
        );

        $fieldId = 'foo';
        $contextId = 1234;

        $this->assertCall(
            method: 'removeCustomFieldContextFromProjects',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/context/{contextId}/project/remove',
                'method' => 'post',
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
}
