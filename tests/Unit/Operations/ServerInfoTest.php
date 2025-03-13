<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ServerInfoTest extends OperationsTestCase
{
    public function testGetServerInfo(): void
    {
        $this->assertCall(
            method: 'getServerInfo',
            call: [
                'uri' => '/rest/api/3/serverInfo',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\ServerInformation::class,
            ],
            arguments: [],
            response: '{"baseUrl":"https://your-domain.atlassian.net","buildDate":"2020-03-26T22:20:59.000+0000","buildNumber":582,"defaultLocale":{"locale":"en_AU"},"displayUrl":"https://instance.jira.your-domain.com","displayUrlConfluence":"https://instance.confluence.your-domain.com","displayUrlServicedeskHelpCenter":"https://instance.help.your-domain.com","scmInfo":"1f51473f5c7b75c1a69a0090f4832cdc5053702a","serverTime":"2020-03-31T16:43:50.000+0000","serverTimeZone":"Australia/Sydney","serverTitle":"My Jira instance","version":"1001.0.0-SNAPSHOT","versionNumbers":[5,0,0]}',
        );
    }
}
