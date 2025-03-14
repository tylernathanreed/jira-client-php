<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class AnnouncementBannerTest extends OperationsTestCase
{
    public function testGetBanner(): void
    {
        $this->assertCall(
            method: 'getBanner',
            call: [
                'uri' => '/rest/api/3/announcementBanner',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\AnnouncementBannerConfiguration::class,
            ],
            arguments: [],
            response: '{"hashId":"9HN2FJK9DM8BHRWERVW3RRTGDJ4G4D5C","isDismissible":false,"isEnabled":true,"message":"This is a public, enabled, non-dismissible banner, set using the API","visibility":"public"}',
        );
    }

    public function testSetBanner(): void
    {
        $request = $this->deserialize(Schema\AnnouncementBannerConfigurationUpdate::class, [
            'isDismissible' => false,
            'isEnabled' => true,
            'message' => 'This is a public, enabled, non-dismissible banner, set using the API',
            'visibility' => 'public',
        ]);

        $this->assertCall(
            method: 'setBanner',
            call: [
                'uri' => '/rest/api/3/announcementBanner',
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
}
