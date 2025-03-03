<?php

namespace Tests\Unit\Operations;

use Tests\OperationsTestCase;
use Jira\Client\Schema;

class OriginalAnnouncementBannerTest extends OperationsTestCase
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
            response: "{\"hashId\":\"9HN2FJK9DM8BHRWERVW3RRTGDJ4G4D5C\",\"isDismissible\":false,\"isEnabled\":true,\"message\":\"This is a public, enabled, non-dismissible banner, set using the API\",\"visibility\":\"public\"}"
        );
    }

    public function testSetBanner(): void
    {
        $request = new Schema\AnnouncementBannerConfigurationUpdate(
            isDismissible: false,
            isEnabled: true,
            message: "This is a public, enabled, non-dismissible banner, set using the API",
            visibility: "public"
        );

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
