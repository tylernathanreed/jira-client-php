<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class GroupAndUserPickerTest extends OperationsTestCase
{
    public function testFindUsersAndGroups(): void
    {
        $query = 'foo';
        $maxResults = 50;
        $showAvatar = false;
        $fieldId = null;
        $projectId = null;
        $issueTypeId = null;
        $avatarSize = 'xsmall';
        $caseInsensitive = false;
        $excludeConnectAddons = false;

        $this->assertCall(
            method: 'findUsersAndGroups',
            call: [
                'uri' => '/rest/api/3/groupuserpicker',
                'method' => 'get',
                'query' => compact('query', 'maxResults', 'showAvatar', 'fieldId', 'projectId', 'issueTypeId', 'avatarSize', 'caseInsensitive', 'excludeConnectAddons'),
                'success' => 200,
                'schema' => Schema\FoundUsersAndGroups::class,
            ],
            arguments: [
                $query,
                $maxResults,
                $showAvatar,
                $fieldId,
                $projectId,
                $issueTypeId,
                $avatarSize,
                $caseInsensitive,
                $excludeConnectAddons,
            ],
            response: '{"groups":{"groups":[{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","html":"<b>j</b>dog-developers","name":"jdog-developers"},{"groupId":"6e87dc72-4f1f-421f-9382-2fee8b652487","html":"<b>j</b>uvenal-bot","name":"juvenal-bot"}],"header":"Showing 20 of 25 matching groups","total":25},"users":{"header":"Showing 20 of 25 matching groups","total":25,"users":[{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","avatarUrl":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","displayName":"Mia Krystof","html":"<strong>Mi</strong>a Krystof - <strong>mi</strong>a@example.com (<strong>mi</strong>a)","key":"mia","name":"mia"}]}}',
        );
    }
}
