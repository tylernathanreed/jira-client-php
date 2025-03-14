<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueLinkTypesTest extends OperationsTestCase
{
    public function testGetIssueLinkTypes(): void
    {
        $this->assertCall(
            method: 'getIssueLinkTypes',
            call: [
                'uri' => '/rest/api/3/issueLinkType',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\IssueLinkTypes::class,
            ],
            arguments: [],
            response: '{"issueLinkTypes":[{"id":"1000","inward":"Duplicated by","name":"Duplicate","outward":"Duplicates","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1000"},{"id":"1010","inward":"Blocked by","name":"Blocks","outward":"Blocks","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1010"}]}',
        );
    }

    public function testCreateIssueLinkType(): void
    {
        $request = $this->deserialize(Schema\IssueLinkType::class, [
            'inward' => 'Duplicated by',
            'name' => 'Duplicate',
            'outward' => 'Duplicates',
        ]);

        $this->assertCall(
            method: 'createIssueLinkType',
            call: [
                'uri' => '/rest/api/3/issueLinkType',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\IssueLinkType::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"1000","inward":"Duplicated by","name":"Duplicate","outward":"Duplicates","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1000"}',
        );
    }

    public function testGetIssueLinkType(): void
    {
        $issueLinkTypeId = 'foo';

        $this->assertCall(
            method: 'getIssueLinkType',
            call: [
                'uri' => '/rest/api/3/issueLinkType/{issueLinkTypeId}',
                'method' => 'get',
                'path' => compact('issueLinkTypeId'),
                'success' => 200,
                'schema' => Schema\IssueLinkType::class,
            ],
            arguments: [
                $issueLinkTypeId,
            ],
            response: '{"id":"1000","inward":"Duplicated by","name":"Duplicate","outward":"Duplicates","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1000"}',
        );
    }

    public function testUpdateIssueLinkType(): void
    {
        $request = $this->deserialize(Schema\IssueLinkType::class, [
            'inward' => 'Duplicated by',
            'name' => 'Duplicate',
            'outward' => 'Duplicates',
        ]);

        $issueLinkTypeId = 'foo';

        $this->assertCall(
            method: 'updateIssueLinkType',
            call: [
                'uri' => '/rest/api/3/issueLinkType/{issueLinkTypeId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('issueLinkTypeId'),
                'success' => 200,
                'schema' => Schema\IssueLinkType::class,
            ],
            arguments: [
                $request,
                $issueLinkTypeId,
            ],
            response: '{"id":"1000","inward":"Duplicated by","name":"Duplicate","outward":"Duplicates","self":"https://your-domain.atlassian.net/rest/api/3/issueLinkType/1000"}',
        );
    }

    public function testDeleteIssueLinkType(): void
    {
        $issueLinkTypeId = 'foo';

        $this->assertCall(
            method: 'deleteIssueLinkType',
            call: [
                'uri' => '/rest/api/3/issueLinkType/{issueLinkTypeId}',
                'method' => 'delete',
                'path' => compact('issueLinkTypeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $issueLinkTypeId,
            ],
            response: null,
        );
    }
}
