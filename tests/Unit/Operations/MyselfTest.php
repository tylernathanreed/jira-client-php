<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class MyselfTest extends OperationsTestCase
{
    public function testGetPreference(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'getPreference',
            call: [
                'uri' => '/rest/api/3/mypreferences',
                'method' => 'get',
                'query' => compact('key'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $key,
            ],
            response: null,
        );
    }

    public function testSetPreference(): void
    {
        $key = 'foo';

        $this->assertCall(
            method: 'setPreference',
            call: [
                'uri' => '/rest/api/3/mypreferences',
                'method' => 'put',
                'query' => compact('key'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $key,
            ],
            response: null,
        );
    }

    public function testRemovePreference(): void
    {
        $key = 'foo';

        $this->assertCall(
            method: 'removePreference',
            call: [
                'uri' => '/rest/api/3/mypreferences',
                'method' => 'delete',
                'query' => compact('key'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $key,
            ],
            response: null,
        );
    }

    public function testGetLocale(): void
    {
        $this->assertCall(
            method: 'getLocale',
            call: [
                'uri' => '/rest/api/3/mypreferences/locale',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\Locale::class,
            ],
            arguments: [],
            response: '{"locale":"en_US"}',
        );
    }

    public function testSetLocale(): void
    {
        $request = new Schema\Locale(
            locale: 'en_US',
        );

        $this->assertCall(
            method: 'setLocale',
            call: [
                'uri' => '/rest/api/3/mypreferences/locale',
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

    public function testDeleteLocale(): void
    {
        $this->assertCall(
            method: 'deleteLocale',
            call: [
                'uri' => '/rest/api/3/mypreferences/locale',
                'method' => 'delete',
                'success' => 204,
                'schema' => true,
            ],
            arguments: [],
            response: null,
        );
    }

    public function testGetCurrentUser(): void
    {
        $expand = null;

        $this->assertCall(
            method: 'getCurrentUser',
            call: [
                'uri' => '/rest/api/3/myself',
                'method' => 'get',
                'query' => compact('expand'),
                'success' => 200,
                'schema' => Schema\User::class,
            ],
            arguments: [
                $expand,
            ],
            response: '{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":true,"applicationRoles":{"items":[],"size":1},"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","emailAddress":"mia@example.com","groups":{"items":[],"size":3},"key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","timeZone":"Australia/Sydney"}',
        );
    }
}
