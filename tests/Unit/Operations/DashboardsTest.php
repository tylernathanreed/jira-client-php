<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class DashboardsTest extends OperationsTestCase
{
    public function testGetAllDashboards(): void
    {
        $filter = null;
        $startAt = 0;
        $maxResults = 20;

        $this->assertCall(
            method: 'getAllDashboards',
            call: [
                'uri' => '/rest/api/3/dashboard',
                'method' => 'get',
                'query' => compact('filter', 'startAt', 'maxResults'),
                'success' => 200,
                'schema' => Schema\PageOfDashboards::class,
            ],
            arguments: [
                $filter,
                $startAt,
                $maxResults,
            ],
            response: '{"dashboards":[{"id":"10000","isFavourite":false,"name":"System Dashboard","popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/10000","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=10000"},{"id":"20000","isFavourite":true,"name":"Build Engineering","owner":{"key":"Mia","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g","name":"mia","displayName":"Mia Krystof","avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"}},"popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/20000","sharePermissions":[{"group":{"name":"administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupname=administrators"},"id":10105,"type":"group"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=20000"}],"maxResults":10,"next":"https://your-domain.atlassian.net/rest/api/3/dashboard?startAt=10","prev":"https://your-domain.atlassian.net/rest/api/3/dashboard?startAt=0","startAt":10,"total":143}',
        );
    }

    public function testCreateDashboard(): void
    {
        $request = new Schema\DashboardDetails(
            description: 'A dashboard to help auditors identify sample of issues to check.',
            editPermissions: [
            ],
            name: 'Auditors dashboard',
            sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
        );

        $extendAdminPermissions = false;

        $this->assertCall(
            method: 'createDashboard',
            call: [
                'uri' => '/rest/api/3/dashboard',
                'method' => 'post',
                'body' => $request,
                'query' => compact('extendAdminPermissions'),
                'success' => 200,
                'schema' => Schema\Dashboard::class,
            ],
            arguments: [
                $request,
                $extendAdminPermissions,
            ],
            response: '{"id":"10000","isFavourite":false,"name":"System Dashboard","popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/10000","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=10000"}',
        );
    }

    public function testBulkEditDashboards(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'bulkEditDashboards',
            call: [
                'uri' => '/rest/api/3/dashboard/bulk/edit',
                'method' => 'put',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\BulkEditShareableEntityResponse::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"action":"changePermission","entityErrors":{"10002":{"errorMessages":["Only owner or editors of the dashboard can change permissions."],"errors":{}}}}',
        );
    }

    public function testGetAllAvailableDashboardGadgets(): void
    {
        $this->assertCall(
            method: 'getAllAvailableDashboardGadgets',
            call: [
                'uri' => '/rest/api/3/dashboard/gadgets',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\AvailableDashboardGadgetsResponse::class,
            ],
            arguments: [],
            response: '{"gadgets":[{"moduleKey":"com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-item","title":"Issue statistics"},{"uri":"rest/gadgets/1.0/g/com.atlassian.streams.streams-jira-plugin:activitystream-gadget/gadgets/activitystream-gadget.xml","title":"Activity Stream"}]}',
        );
    }

    public function testGetDashboardsPaginated(): void
    {
        $dashboardName = null;
        $accountId = null;
        $owner = null;
        $groupname = null;
        $groupId = null;
        $projectId = null;
        $orderBy = 'name';
        $startAt = 0;
        $maxResults = 50;
        $status = 'active';
        $expand = null;

        $this->assertCall(
            method: 'getDashboardsPaginated',
            call: [
                'uri' => '/rest/api/3/dashboard/search',
                'method' => 'get',
                'query' => compact('dashboardName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'orderBy', 'startAt', 'maxResults', 'status', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanDashboard::class,
            ],
            arguments: [
                $dashboardName,
                $accountId,
                $owner,
                $groupname,
                $groupId,
                $projectId,
                $orderBy,
                $startAt,
                $maxResults,
                $status,
                $expand,
            ],
            response: '{"isLast":true,"maxResults":100,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/search?expand=owner&maxResults=50&startAt=0","startAt":0,"total":2,"values":[{"description":"Testing program","id":"1","isFavourite":true,"name":"Testing","owner":{"self":"https://your-domain.atlassian.net/user?accountId=5b10a2844c20165700ede21g","displayName":"Mia","active":true,"accountId":"5b10a2844c20165700ede21g","avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"}},"popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/1","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/Dashboard.jspa?selectPageId=1"},{"description":"Quantum initiative","id":"2","isFavourite":false,"name":"Quantum ","owner":{"self":"https://your-domain.atlassian.net/user?accountId=5b10a2844c20165700ede21g","displayName":"Mia","active":true,"accountId":"5b10a2844c20165700ede21g","avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"}},"popularity":0,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/2","sharePermissions":[{"type":"loggedin"}],"view":"https://your-domain.atlassian.net/Dashboard.jspa?selectPageId=2"}]}',
        );
    }

    public function testGetAllGadgets(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getAllGadgets',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/gadget',
                'method' => 'get',
                'query' => compact('moduleKey', 'uri', 'gadgetId'),
                'path' => compact('dashboardId'),
                'success' => 200,
                'schema' => Schema\DashboardGadgetResponse::class,
            ],
            arguments: [
                $dashboardId,
                $moduleKey,
                $uri,
                $gadgetId,
            ],
            response: '{"gadgets":[{"id":10001,"moduleKey":"com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-item","color":"blue","position":{"row":0,"column":0},"title":"Issue statistics"},{"id":10002,"moduleKey":"com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-graph","color":"red","position":{"row":1,"column":0},"title":"Activity stream"},{"id":10003,"moduleKey":"com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-item","color":"yellow","position":{"row":0,"column":1},"title":"Bubble chart"}]}',
        );
    }

    public function testAddGadget(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'addGadget',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/gadget',
                'method' => 'post',
                'body' => $request,
                'path' => compact('dashboardId'),
                'success' => 200,
                'schema' => Schema\DashboardGadget::class,
            ],
            arguments: [
                $request,
                $dashboardId,
            ],
            response: '{"color":"blue","id":10001,"moduleKey":"com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-item","position":{"column":1,"row":0},"title":"Issue statistics"}',
        );
    }

    public function testUpdateGadget(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateGadget',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('dashboardId', 'gadgetId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $dashboardId,
                $gadgetId,
            ],
            response: null,
        );
    }

    public function testRemoveGadget(): void
    {
        $dashboardId = 1234;
        $gadgetId = 1234;

        $this->assertCall(
            method: 'removeGadget',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}',
                'method' => 'delete',
                'path' => compact('dashboardId', 'gadgetId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $dashboardId,
                $gadgetId,
            ],
            response: null,
        );
    }

    public function testGetDashboardItemPropertyKeys(): void
    {
        $dashboardId = 'foo';
        $itemId = 'foo';

        $this->assertCall(
            method: 'getDashboardItemPropertyKeys',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties',
                'method' => 'get',
                'path' => compact('dashboardId', 'itemId'),
                'success' => 200,
                'schema' => Schema\PropertyKeys::class,
            ],
            arguments: [
                $dashboardId,
                $itemId,
            ],
            response: '{"keys":[{"key":"issue.support","self":"https://your-domain.atlassian.net/rest/api/3/issue/EX-2/properties/issue.support"}]}',
        );
    }

    public function testGetDashboardItemProperty(): void
    {
        $dashboardId = 'foo';
        $itemId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'getDashboardItemProperty',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
                'method' => 'get',
                'path' => compact('dashboardId', 'itemId', 'propertyKey'),
                'success' => 200,
                'schema' => Schema\EntityProperty::class,
            ],
            arguments: [
                $dashboardId,
                $itemId,
                $propertyKey,
            ],
            response: '{"key":"issue.support","value":{"system.conversation.id":"b1bf38be-5e94-4b40-a3b8-9278735ee1e6","system.support.time":"1m"}}',
        );
    }

    public function testSetDashboardItemProperty(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'setDashboardItemProperty',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
                'method' => 'put',
                'path' => compact('dashboardId', 'itemId', 'propertyKey'),
                'success' => 200,
                'schema' => true,
            ],
            arguments: [
                $dashboardId,
                $itemId,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testDeleteDashboardItemProperty(): void
    {
        $dashboardId = 'foo';
        $itemId = 'foo';
        $propertyKey = 'foo';

        $this->assertCall(
            method: 'deleteDashboardItemProperty',
            call: [
                'uri' => '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
                'method' => 'delete',
                'path' => compact('dashboardId', 'itemId', 'propertyKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $dashboardId,
                $itemId,
                $propertyKey,
            ],
            response: null,
        );
    }

    public function testGetDashboard(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'getDashboard',
            call: [
                'uri' => '/rest/api/3/dashboard/{id}',
                'method' => 'get',
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Dashboard::class,
            ],
            arguments: [
                $id,
            ],
            response: '{"id":"10000","isFavourite":false,"name":"System Dashboard","popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/10000","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=10000"}',
        );
    }

    public function testUpdateDashboard(): void
    {
        $request = new Schema\DashboardDetails(
            description: 'A dashboard to help auditors identify sample of issues to check.',
            editPermissions: [
            ],
            name: 'Auditors dashboard',
            sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
        );

        $id = 'foo';
        $extendAdminPermissions = false;

        $this->assertCall(
            method: 'updateDashboard',
            call: [
                'uri' => '/rest/api/3/dashboard/{id}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('extendAdminPermissions'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Dashboard::class,
            ],
            arguments: [
                $request,
                $id,
                $extendAdminPermissions,
            ],
            response: '{"id":"10000","isFavourite":false,"name":"System Dashboard","popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/10000","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=10000"}',
        );
    }

    public function testDeleteDashboard(): void
    {
        $id = 'foo';

        $this->assertCall(
            method: 'deleteDashboard',
            call: [
                'uri' => '/rest/api/3/dashboard/{id}',
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

    public function testCopyDashboard(): void
    {
        $request = new Schema\DashboardDetails(
            description: 'A dashboard to help auditors identify sample of issues to check.',
            editPermissions: [
            ],
            name: 'Auditors dashboard',
            sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
        );

        $id = 'foo';
        $extendAdminPermissions = false;

        $this->assertCall(
            method: 'copyDashboard',
            call: [
                'uri' => '/rest/api/3/dashboard/{id}/copy',
                'method' => 'post',
                'body' => $request,
                'query' => compact('extendAdminPermissions'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\Dashboard::class,
            ],
            arguments: [
                $request,
                $id,
                $extendAdminPermissions,
            ],
            response: '{"id":"10000","isFavourite":false,"name":"System Dashboard","popularity":1,"self":"https://your-domain.atlassian.net/rest/api/3/dashboard/10000","sharePermissions":[{"type":"global"}],"view":"https://your-domain.atlassian.net/secure/Dashboard.jspa?selectPageId=10000"}',
        );
    }
}
