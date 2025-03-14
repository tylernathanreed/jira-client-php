<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueFieldsTest extends OperationsTestCase
{
    public function testGetFields(): void
    {
        $this->assertCall(
            method: 'getFields',
            call: [
                'uri' => '/rest/api/3/field',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\FieldDetails::class],
            ],
            arguments: [],
            response: '[{"clauseNames":["description"],"custom":false,"id":"description","name":"Description","navigable":true,"orderable":true,"schema":{"system":"description","type":"string"},"searchable":true},{"clauseNames":["summary"],"custom":false,"id":"summary","key":"summary","name":"Summary","navigable":true,"orderable":true,"schema":{"system":"summary","type":"string"},"searchable":true}]',
        );
    }

    public function testCreateCustomField(): void
    {
        $request = $this->deserialize(Schema\CustomFieldDefinitionJsonBean::class, [
            'description' => 'Custom field for picking groups',
            'name' => 'New custom field',
            'searcherKey' => 'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher',
            'type' => 'com.atlassian.jira.plugin.system.customfieldtypes:grouppicker',
        ]);

        $this->assertCall(
            method: 'createCustomField',
            call: [
                'uri' => '/rest/api/3/field',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\FieldDetails::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"}',
        );
    }

    public function testGetFieldsPaginated(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $type = null;
        $id = null;
        $query = null;
        $orderBy = null;
        $expand = null;

        $this->assertCall(
            method: 'getFieldsPaginated',
            call: [
                'uri' => '/rest/api/3/field/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'type', 'id', 'query', 'orderBy', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanField::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $type,
                $id,
                $query,
                $orderBy,
                $expand,
            ],
            response: '{"isLast":false,"maxResults":50,"startAt":0,"total":2,"values":[{"id":"customfield_10000","name":"Approvers","schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiuserpicker","customId":10000,"items":"user","type":"array"},"description":"Contains users needed for approval. This custom field was created by Jira Service Desk.","key":"customfield_10000","stableId":"sfid:approvers","isLocked":true,"searcherKey":"com.atlassian.jira.plugin.system.customfieldtypes:userpickergroupsearcher","screensCount":2,"contextsCount":2,"lastUsed":{"type":"TRACKED","value":"2021-01-28T07:37:40.000+0000"}},{"id":"customfield_10001","name":"Change reason","schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:select","customId":10001,"type":"option"},"description":"Choose the reason for the change request","key":"customfield_10001","stableId":"sfid:change-reason","isLocked":false,"searcherKey":"com.atlassian.jira.plugin.system.customfieldtypes:multiselectsearcher","screensCount":2,"contextsCount":2,"projectsCount":2,"lastUsed":{"type":"NOT_TRACKED"}}]}',
        );
    }

    public function testGetTrashedFieldsPaginated(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $query = null;
        $expand = null;
        $orderBy = null;

        $this->assertCall(
            method: 'getTrashedFieldsPaginated',
            call: [
                'uri' => '/rest/api/3/field/search/trashed',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'query', 'expand', 'orderBy'),
                'success' => 200,
                'schema' => Schema\PageBeanField::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $query,
                $expand,
                $orderBy,
            ],
            response: '{"isLast":false,"maxResults":50,"startAt":0,"total":1,"values":[{"id":"customfield_10000","name":"Approvers","schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:multiuserpicker","customId":10003,"type":"array"},"description":"Contains users needed for approval. This custom field was created by Jira Service Desk.","key":"customfield_10003","trashedDate":"2022-10-06T07:32:47.000+0000","trashedBy":{"accountId":"5b10a2844c20165700ede21g","active":true,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"},"plannedDeletionDate":"2022-10-24T07:32:47.000+0000"}]}',
        );
    }

    public function testUpdateCustomField(): void
    {
        $request = $this->deserialize(Schema\UpdateCustomFieldDetails::class, [
            'description' => 'Select the manager and the corresponding employee.',
            'name' => 'Managers and employees list',
            'searcherKey' => 'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher',
        ]);

        $fieldId = 'foo';

        $this->assertCall(
            method: 'updateCustomField',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}',
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

    public function testGetContextsForFieldDeprecated(): void
    {
        $fieldId = 'foo';
        $startAt = 0;
        $maxResults = 20;

        $this->assertCall(
            method: 'getContextsForFieldDeprecated',
            call: [
                'uri' => '/rest/api/3/field/{fieldId}/contexts',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults'),
                'path' => compact('fieldId'),
                'success' => 200,
                'schema' => Schema\PageBeanContext::class,
            ],
            arguments: [
                $fieldId,
                $startAt,
                $maxResults,
            ],
            response: '{"isLast":false,"maxResults":1,"startAt":0,"total":5,"values":[{"id":10001,"name":"Default Context"}]}',
        );
    }

    public function testDeleteCustomField(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteCustomField',
            call: [
                'uri' => '/rest/api/3/field/{id}',
                'method' => 'delete',
                'path' => compact('id'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testRestoreCustomField(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'restoreCustomField',
            call: [
                'uri' => '/rest/api/3/field/{id}/restore',
                'method' => 'post',
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }

    public function testTrashCustomField(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'trashCustomField',
            call: [
                'uri' => '/rest/api/3/field/{id}/trash',
                'method' => 'post',
                'path' => compact('id'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $id,
            ],
            response: null,
        );
    }
}
