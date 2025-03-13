<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueFieldConfigurationsTest extends OperationsTestCase
{
    public function testGetAllFieldConfigurations(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $isDefault = false;
        $query = '';

        $this->assertCall(
            method: 'getAllFieldConfigurations',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'isDefault', 'query'),
                'success' => 200,
                'schema' => Schema\PageBeanFieldConfigurationDetails::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $isDefault,
                $query,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":2,"values":[{"id":10000,"name":"Default Field Configuration","description":"The default field configuration description","isDefault":true},{"id":10001,"name":"My Field Configuration","description":"My field configuration description"}]}',
        );
    }

    public function testCreateFieldConfiguration(): void
    {
        $request = new Schema\FieldConfigurationDetails(
            description: 'My field configuration description',
            name: 'My Field Configuration',
        );

        $this->assertCall(
            method: 'createFieldConfiguration',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\FieldConfiguration::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"description":"My field configuration description","id":10001,"name":"My Field Configuration"}',
        );
    }

    public function testUpdateFieldConfiguration(): void
    {
        $request = new Schema\FieldConfigurationDetails(
            description: 'A brand new description',
            name: 'My Modified Field Configuration',
        );

        $id = 1234;

        $this->assertCall(
            method: 'updateFieldConfiguration',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteFieldConfiguration(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteFieldConfiguration',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration/{id}',
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

    public function testGetFieldConfigurationItems(): void
    {
        $id = 1234;
        $startAt = 0;
        $maxResults = 50;

        $this->assertCall(
            method: 'getFieldConfigurationItems',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration/{id}/fields',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\PageBeanFieldConfigurationItem::class,
            ],
            arguments: [
                $id,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":2,"values":[{"description":"For example operating system, software platform and/or hardware specifications (include as appropriate for the issue).","id":"environment","isHidden":false,"isRequired":false},{"id":"description","isHidden":false,"isRequired":false}]}',
        );
    }

    public function testUpdateFieldConfigurationItems(): void
    {
        $request = new Schema\FieldConfigurationItemsDetails(
            fieldConfigurationItems: [
                [
                    'description' => 'The new description of this item.',
                    'id' => 'customfield_10012',
                    'isHidden' => false,
                ],
                [
                    'id' => 'customfield_10011',
                    'isRequired' => true,
                ],
                [
                    'description' => 'Another new description.',
                    'id' => 'customfield_10010',
                    'isHidden' => false,
                    'isRequired' => false,
                    'renderer' => 'wiki-renderer',
                ],
            ],
        );

        $id = 1234;

        $this->assertCall(
            method: 'updateFieldConfigurationItems',
            call: [
                'uri' => '/rest/api/3/fieldconfiguration/{id}/fields',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testGetAllFieldConfigurationSchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;

        $this->assertCall(
            method: 'getAllFieldConfigurationSchemes',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id'),
                'success' => 200,
                'schema' => Schema\PageBeanFieldConfigurationScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
            ],
            response: '{"isLast":true,"maxResults":10,"startAt":0,"total":3,"values":[{"id":"10000","name":"Field Configuration Scheme for Bugs","description":"This field configuration scheme is for bugs only."},{"id":"10001","name":"Field Configuration Scheme for software related projects","description":"We can use this one for software projects."},{"id":"10002","name":"Field Configuration Scheme for Epics","description":"Use this one for Epic issue type."}]}',
        );
    }

    public function testCreateFieldConfigurationScheme(): void
    {
        $request = new Schema\UpdateFieldConfigurationSchemeDetails(
            description: 'We can use this one for software projects.',
            name: 'Field Configuration Scheme for software related projects',
        );

        $this->assertCall(
            method: 'createFieldConfigurationScheme',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\FieldConfigurationScheme::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"description":"We can use this one for software projects.","id":"10002","name":"Field Configuration Scheme for software related projects"}',
        );
    }

    public function testGetFieldConfigurationSchemeMappings(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getFieldConfigurationSchemeMappings',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/mapping',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'fieldConfigurationSchemeId'),
                'success' => 200,
                'schema' => Schema\PageBeanFieldConfigurationIssueTypeItem::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $fieldConfigurationSchemeId,
            ],
            response: '{"isLast":true,"maxResults":100,"startAt":0,"total":5,"values":[{"fieldConfigurationSchemeId":"10020","issueTypeId":"10000","fieldConfigurationId":"10010"},{"fieldConfigurationSchemeId":"10020","issueTypeId":"10001","fieldConfigurationId":"10010"},{"fieldConfigurationSchemeId":"10021","issueTypeId":"10002","fieldConfigurationId":"10000"},{"fieldConfigurationSchemeId":"10022","issueTypeId":"default","fieldConfigurationId":"10011"},{"fieldConfigurationSchemeId":"10023","issueTypeId":"default","fieldConfigurationId":"10000"}]}',
        );
    }

    public function testGetFieldConfigurationSchemeProjectMapping(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getFieldConfigurationSchemeProjectMapping',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/project',
                'method' => 'get',
                'query' => compact('projectId', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageBeanFieldConfigurationSchemeProjects::class,
            ],
            arguments: [
                $projectId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":5,"values":[{"projectIds":["10","11"]},{"fieldConfigurationScheme":{"id":"10002","name":"Field Configuration Scheme for software related projects","description":"We can use this one for software projects."},"projectIds":["12","13","14"]}]}',
        );
    }

    public function testAssignFieldConfigurationSchemeToProject(): void
    {
        $request = new Schema\FieldConfigurationSchemeProjectAssociation(
            fieldConfigurationSchemeId: '10000',
            projectId: '10000',
        );

        $this->assertCall(
            method: 'assignFieldConfigurationSchemeToProject',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/project',
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

    public function testUpdateFieldConfigurationScheme(): void
    {
        $request = new Schema\UpdateFieldConfigurationSchemeDetails(
            description: 'We can use this one for software projects.',
            name: 'Field Configuration Scheme for software related projects',
        );

        $id = 1234;

        $this->assertCall(
            method: 'updateFieldConfigurationScheme',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteFieldConfigurationScheme(): void
    {
        $id = 1234;

        $this->assertCall(
            method: 'deleteFieldConfigurationScheme',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/{id}',
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

    public function testSetFieldConfigurationSchemeMapping(): void
    {
        $request = new Schema\AssociateFieldConfigurationsWithIssueTypesRequest(
            mappings: [
                [
                    'fieldConfigurationId' => '10000',
                    'issueTypeId' => 'default',
                ],
                [
                    'fieldConfigurationId' => '10002',
                    'issueTypeId' => '10001',
                ],
                [
                    'fieldConfigurationId' => '10001',
                    'issueTypeId' => '10002',
                ],
            ],
        );

        $id = 1234;

        $this->assertCall(
            method: 'setFieldConfigurationSchemeMapping',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/{id}/mapping',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testRemoveIssueTypesFromGlobalFieldConfigurationScheme(): void
    {
        $request = new Schema\IssueTypeIdsToRemove(
            issueTypeIds: [
                '10000',
                '10001',
                '10002',
            ],
        );

        $id = 1234;

        $this->assertCall(
            method: 'removeIssueTypesFromGlobalFieldConfigurationScheme',
            call: [
                'uri' => '/rest/api/3/fieldconfigurationscheme/{id}/mapping/delete',
                'method' => 'post',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }
}
