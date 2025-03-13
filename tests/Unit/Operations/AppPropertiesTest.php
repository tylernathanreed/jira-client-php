<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AppPropertiesTest extends OperationsTestCase
{
    public function testGetAddonProperties(): void
    {
        $addonKey = 'foo';

        $this->assertCall(
            method: 'getAddonProperties',
            call: [
                'uri' => '/rest/atlassian-connect/1/addons/{addonKey}/properties',
                'method' => 'get',
                'path' => compact('addonKey'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $addonKey,
            ],
            response: '{"keys":[{"self":"https:\/\/your-domain.atlassian.net\/jira\/rest\/atlassian-connect\/1\/addon\/example.app.key\/properties\/propertyKey","key":"propertyKey"}]}',
        );
    }

    public function testGetAddonProperty(): void
    {
        $addonKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getAddonProperty',
            call: [
                'uri' => '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('addonKey', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $addonKey,
                $propertyKey,
            ],
            response: '{"self":"https:\/\/your-domain.atlassian.net\/jira\/rest\/atlassian-connect\/1\/addon\/example.app.key\/properties\/propertyKey","key":"propertyKey","value":"propertyValue"}',
        );
    }

    public function testPutAddonProperty(): void
    {
        $addonKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'putAddonProperty',
            call: [
                'uri' => '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('addonKey', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\OperationMessage::class,
            ],
            arguments: [
                $addonKey,
                $propertyKey,
            ],
            response: '{"message":"Property updated.","statusCode":200}',
        );
    }

    public function testDeleteAddonProperty(): void
    {
        $addonKey = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteAddonProperty',
            call: [
                'uri' => '/rest/atlassian-connect/1/addons/{addonKey}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('addonKey', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $addonKey,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testPutForgeAppProperty(): void
    {
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'putForgeAppProperty',
            call: [
                'uri' => '/rest/forge/1/app/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('propertyKey'),
                'success' => 200,
                'schema' => Schema\OperationMessage::class,
            ],
            arguments: [
                $propertyKey,
            ],
            response: '{"message":"Property updated.","statusCode":200}',
        );
    }

    public function testDeleteForgeAppProperty(): void
    {
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteForgeAppProperty',
            call: [
                'uri' => '/rest/forge/1/app/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $propertyKey,
            ],
            response: null,
        );
    }
}
