<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ApplicationRolesTest extends OperationsTestCase
{
    public function testGetAllApplicationRoles(): void
    {
        $this->assertCall(
            method: 'getAllApplicationRoles',
            call: [
                'uri' => '/rest/api/3/applicationrole',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ApplicationRole::class],
            ],
            arguments: [],
            response: '[{"defaultGroups":["jira-software-users"],"defaultGroupsDetails":[{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-software-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"}],"defined":false,"groupDetails":[{"groupId":"42c8955c-63d7-42c8-9520-63d7aca0625","name":"jira-testers","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=42c8955c-63d7-42c8-9520-63d7aca0625"},{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-software-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"}],"groups":["jira-software-users","jira-testers"],"hasUnlimitedSeats":false,"key":"jira-software","name":"Jira Software","numberOfSeats":10,"platform":false,"remainingSeats":5,"selectedByDefault":false,"userCount":5,"userCountDescription":"5 developers"},{"defaultGroups":["jira-core-users"],"defaultGroupsDetails":[{"groupId":"92d01dca0625-42c8-42c8-9520-276f955c","name":"jira-core-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=92d01dca0625-42c8-42c8-9520-276f955c"}],"defined":false,"groupDetails":[{"groupId":"92d01dca0625-42c8-42c8-9520-276f955c","name":"jira-core-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=92d01dca0625-42c8-42c8-9520-276f955c"}],"groups":["jira-core-users"],"hasUnlimitedSeats":false,"key":"jira-core","name":"Jira Core","numberOfSeats":1,"platform":true,"remainingSeats":1,"selectedByDefault":false,"userCount":0,"userCountDescription":"0 users"}]',
        );
    }

    public function testGetApplicationRole(): void
    {
        $key = 'jira-software';

        $this->assertCall(
            method: 'getApplicationRole',
            call: [
                'uri' => '/rest/api/3/applicationrole/{key}',
                'method' => 'get',
                'path' => compact('key'),
                'success' => 200,
                'schema' => Schema\ApplicationRole::class,
            ],
            arguments: [
                $key,
            ],
            response: '{"defaultGroups":["jira-software-users"],"defaultGroupsDetails":[{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-software-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"}],"defined":false,"groupDetails":[{"groupId":"42c8955c-63d7-42c8-9520-63d7aca0625","name":"jira-testers","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=42c8955c-63d7-42c8-9520-63d7aca0625"},{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-software-users","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"}],"groups":["jira-software-users","jira-testers"],"hasUnlimitedSeats":false,"key":"jira-software","name":"Jira Software","numberOfSeats":10,"platform":false,"remainingSeats":5,"selectedByDefault":false,"userCount":5,"userCountDescription":"5 developers"}',
        );
    }
}
