<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class IssueNotificationSchemesTest extends OperationsTestCase
{
    public function testGetNotificationSchemes(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $id = null;
        $projectId = null;
        $onlyDefault = false;
        $expand = null;

        $this->assertCall(
            method: 'getNotificationSchemes',
            call: [
                'uri' => '/rest/api/3/notificationscheme',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'id', 'projectId', 'onlyDefault', 'expand'),
                'success' => 200,
                'schema' => Schema\PageBeanNotificationScheme::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $id,
                $projectId,
                $onlyDefault,
                $expand,
            ],
            response: '{"isLast":false,"maxResults":6,"startAt":1,"total":5,"values":[{"description":"description","expand":"notificationSchemeEvents,user,group,projectRole,field,all","id":10100,"name":"notification scheme name","notificationSchemeEvents":[{"event":{"description":"Event published when an issue is created","id":1,"name":"Issue created"},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]},{"event":{"description":"Custom event that is published together with an issue created event","id":20,"name":"Custom event","templateEvent":{"description":"Event published when an issue is created","id":1,"name":"Issue created"}},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]}],"projects":[10001,10002],"self":"https://your-domain.atlassian.net/rest/api/3/notificationscheme"}]}',
        );
    }

    public function testCreateNotificationScheme(): void
    {
        $request = $this->deserialize(Schema\CreateNotificationSchemeDetails::class, [
            'description' => 'My new scheme description',
            'name' => 'My new notification scheme',
            'notificationSchemeEvents' => [
                [
                    'event' => [
                        'id' => '1',
                    ],
                    'notifications' => [
                        [
                            'notificationType' => 'Group',
                            'parameter' => 'jira-administrators',
                        ],
                    ],
                ],
            ],
        ]);

        $this->assertCall(
            method: 'createNotificationScheme',
            call: [
                'uri' => '/rest/api/3/notificationscheme',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\NotificationSchemeId::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":"10001"}',
        );
    }

    public function testGetNotificationSchemeToProjectMappings(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $notificationSchemeId = null;
        $projectId = null;

        $this->assertCall(
            method: 'getNotificationSchemeToProjectMappings',
            call: [
                'uri' => '/rest/api/3/notificationscheme/project',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'notificationSchemeId', 'projectId'),
                'success' => 200,
                'schema' => Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $notificationSchemeId,
                $projectId,
            ],
            response: '{"isLast":true,"maxResults":50,"startAt":0,"total":4,"values":[{"notificationSchemeId":"10001","projectId":"100001"}]}',
        );
    }

    public function testGetNotificationScheme(): void
    {
        $id = 1234;
        $expand = null;

        $this->assertCall(
            method: 'getNotificationScheme',
            call: [
                'uri' => '/rest/api/3/notificationscheme/{id}',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('id'),
                'success' => 200,
                'schema' => Schema\NotificationScheme::class,
            ],
            arguments: [
                $id,
                $expand,
            ],
            response: '{"description":"description","expand":"notificationSchemeEvents,user,group,projectRole,field,all","id":10100,"name":"notification scheme name","notificationSchemeEvents":[{"event":{"description":"Event published when an issue is created","id":1,"name":"Issue created"},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]},{"event":{"description":"Custom event that is published together with an issue created event","id":20,"name":"Custom event","templateEvent":{"description":"Event published when an issue is created","id":1,"name":"Issue created"}},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]}],"projects":[10001,10002],"self":"https://your-domain.atlassian.net/rest/api/3/notificationscheme"}',
        );
    }

    public function testUpdateNotificationScheme(): void
    {
        $request = $this->deserialize(Schema\UpdateNotificationSchemeDetails::class, [
            'description' => 'My updated notification scheme description',
            'name' => 'My updated notification scheme',
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'updateNotificationScheme',
            call: [
                'uri' => '/rest/api/3/notificationscheme/{id}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testAddNotifications(): void
    {
        $request = $this->deserialize(Schema\AddNotificationsDetails::class, [
            'notificationSchemeEvents' => [
                [
                    'event' => [
                        'id' => '1',
                    ],
                    'notifications' => [
                        [
                            'notificationType' => 'Group',
                            'parameter' => 'jira-administrators',
                        ],
                    ],
                ],
            ],
        ]);

        $id = 'foo';

        $this->assertCall(
            method: 'addNotifications',
            call: [
                'uri' => '/rest/api/3/notificationscheme/{id}/notification',
                'method' => 'put',
                'body' => $request,
                'path' => compact('id'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $request,
                $id,
            ],
            response: null,
        );
    }

    public function testDeleteNotificationScheme(): void
    {
        $notificationSchemeId = 'foo';

        $this->assertCall(
            method: 'deleteNotificationScheme',
            call: [
                'uri' => '/rest/api/3/notificationscheme/{notificationSchemeId}',
                'method' => 'delete',
                'path' => compact('notificationSchemeId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $notificationSchemeId,
            ],
            response: null,
        );
    }

    public function testRemoveNotificationFromNotificationScheme(): void
    {
        $notificationSchemeId = 'foo';
        $notificationId = 'foo';

        $this->assertCall(
            method: 'removeNotificationFromNotificationScheme',
            call: [
                'uri' => '/rest/api/3/notificationscheme/{notificationSchemeId}/notification/{notificationId}',
                'method' => 'delete',
                'path' => compact('notificationSchemeId', 'notificationId'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $notificationSchemeId,
                $notificationId,
            ],
            response: null,
        );
    }
}
