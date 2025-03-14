<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectsTest extends OperationsTestCase
{
    public function testGetAllProjects(): void
    {
        $expand = null;
        $recent = null;
        $properties = null;

        $this->assertCall(
            method: 'getAllProjects',
            call: [
                'uri' => '/rest/api/3/project',
                'method' => 'get',
                'query' => compact('expand', 'recent', 'properties'),
                'success' => 200,
                'schema' => [Schema\Project::class],
            ],
            arguments: [
                $expand,
                $recent,
                $properties,
            ],
            response: '[{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":1619069825000,"totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"CLASSIC"},{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10001","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10001","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10001","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10001"},"id":"10001","insight":{"lastIssueUpdateTime":1619069825000,"totalIssueCount":100},"key":"ABC","name":"Alphabetical","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/ABC","simplified":false,"style":"CLASSIC"}]',
        );
    }

    public function testCreateProject(): void
    {
        $request = $this->deserialize(Schema\CreateProjectDetails::class, [
            'assigneeType' => 'PROJECT_LEAD',
            'avatarId' => '10200',
            'categoryId' => '10120',
            'description' => 'Cloud migration initiative',
            'issueSecurityScheme' => '10001',
            'key' => 'EX',
            'leadAccountId' => '5b10a0effa615349cb016cd8',
            'name' => 'Example',
            'notificationScheme' => '10021',
            'permissionScheme' => '10011',
            'projectTemplateKey' => 'com.atlassian.jira-core-project-templates:jira-core-simplified-process-control',
            'projectTypeKey' => 'business',
            'url' => 'http://atlassian.com',
        ]);

        $this->assertCall(
            method: 'createProject',
            call: [
                'uri' => '/rest/api/3/project',
                'method' => 'post',
                'body' => $request,
                'success' => 201,
                'schema' => Schema\ProjectIdentifiers::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"id":10010,"key":"EX","self":"https://your-domain.atlassian.net/jira/rest/api/3/project/10042"}',
        );
    }

    public function testGetRecent(): void
    {
        $expand = null;
        $properties = null;

        $this->assertCall(
            method: 'getRecent',
            call: [
                'uri' => '/rest/api/3/project/recent',
                'method' => 'get',
                'query' => compact('expand', 'properties'),
                'success' => 200,
                'schema' => [Schema\Project::class],
            ],
            arguments: [
                $expand,
                $properties,
            ],
            response: '[{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":1619069825000,"totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"CLASSIC"},{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10001","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10001","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10001","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10001"},"id":"10001","insight":{"lastIssueUpdateTime":1619069825000,"totalIssueCount":100},"key":"ABC","name":"Alphabetical","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/ABC","simplified":false,"style":"CLASSIC"}]',
        );
    }

    public function testSearchProjects(): void
    {
        $startAt = 0;
        $maxResults = 50;
        $orderBy = 'key';
        $id = null;
        $keys = null;
        $query = null;
        $typeKey = null;
        $categoryId = null;
        $action = 'view';
        $expand = null;
        $status = null;
        $properties = null;
        $propertyQuery = null;

        $this->assertCall(
            method: 'searchProjects',
            call: [
                'uri' => '/rest/api/3/project/search',
                'method' => 'get',
                'query' => compact('startAt', 'maxResults', 'orderBy', 'id', 'keys', 'query', 'typeKey', 'categoryId', 'action', 'expand', 'status', 'properties', 'propertyQuery'),
                'success' => 200,
                'schema' => Schema\PageBeanProject::class,
            ],
            arguments: [
                $startAt,
                $maxResults,
                $orderBy,
                $id,
                $keys,
                $query,
                $typeKey,
                $categoryId,
                $action,
                $expand,
                $status,
                $properties,
                $propertyQuery,
            ],
            response: '{"isLast":false,"maxResults":2,"nextPage":"https://your-domain.atlassian.net/rest/api/3/project/search?startAt=2&maxResults=2","self":"https://your-domain.atlassian.net/rest/api/3/project/search?startAt=0&maxResults=2","startAt":0,"total":7,"values":[{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"EX","name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic"},{"avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10001","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10001","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10001","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10001"},"id":"10001","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"key":"ABC","name":"Alphabetical","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/ABC","simplified":false,"style":"classic"}]}',
        );
    }

    public function testGetProject(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'getProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}',
                'method' => 'get',
                'query' => compact('expand', 'properties'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\Project::class,
            ],
            arguments: [
                $projectIdOrKey,
                $expand,
                $properties,
            ],
            response: '{"assigneeType":"PROJECT_LEAD","avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"components":[{"ari":"ari:cloud:compass:fdb3fdec-4e70-be56-11ee-0242ac120002:component/fdb3fdec-4e70-11ee-be56-0242ac120002/fdb3fdec-11ee-4e70-be56-0242ac120002","assignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"assigneeType":"PROJECT_LEAD","description":"This is a Jira component","id":"10000","isAssigneeTypeValid":false,"lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"metadata":{"icon":"https://www.example.com/icon.png"},"name":"Component 1","project":"HSP","projectId":10000,"realAssignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"realAssigneeType":"PROJECT_LEAD","self":"https://your-domain.atlassian.net/rest/api/3/component/10000"}],"description":"This project was created as an example for REST.","email":"from-jira@example.com","id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"issueTypes":[{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}],"key":"EX","lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"properties":{"propertyKey":"propertyValue"},"roles":{"Developers":"https://your-domain.atlassian.net/rest/api/3/project/EX/role/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic","url":"https://www.example.com","versions":[]}',
        );
    }

    public function testUpdateProject(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'updateProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}',
                'method' => 'put',
                'body' => $request,
                'query' => compact('expand'),
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\Project::class,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
                $expand,
            ],
            response: '{"assigneeType":"PROJECT_LEAD","avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"components":[{"ari":"ari:cloud:compass:fdb3fdec-4e70-be56-11ee-0242ac120002:component/fdb3fdec-4e70-11ee-be56-0242ac120002/fdb3fdec-11ee-4e70-be56-0242ac120002","assignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"assigneeType":"PROJECT_LEAD","description":"This is a Jira component","id":"10000","isAssigneeTypeValid":false,"lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"metadata":{"icon":"https://www.example.com/icon.png"},"name":"Component 1","project":"HSP","projectId":10000,"realAssignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"realAssigneeType":"PROJECT_LEAD","self":"https://your-domain.atlassian.net/rest/api/3/component/10000"}],"description":"This project was created as an example for REST.","email":"from-jira@example.com","id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"issueTypes":[{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}],"key":"EX","lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"properties":{"propertyKey":"propertyValue"},"roles":{"Developers":"https://your-domain.atlassian.net/rest/api/3/project/EX/role/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic","url":"https://www.example.com","versions":[]}',
        );
    }

    public function testDeleteProject(): void
    {
        $projectIdOrKey = 10001;
        $enableUndo = true;

        $this->assertCall(
            method: 'deleteProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}',
                'method' => 'delete',
                'query' => compact('enableUndo'),
                'path' => compact('projectIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
                $enableUndo,
            ],
            response: null,
        );
    }

    public function testArchiveProject(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'archiveProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/archive',
                'method' => 'post',
                'path' => compact('projectIdOrKey'),
                'success' => 204,
                'schema' => true,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: null,
        );
    }

    public function testDeleteProjectAsynchronously(): void
    {
        $this->markTestIncomplete(
            'Missing response example.'
        );

        $this->assertCall(
            method: 'deleteProjectAsynchronously',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/delete',
                'method' => 'post',
                'path' => compact('projectIdOrKey'),
                'success' => 303,
                'schema' => Schema\TaskProgressBeanObject::class,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: null,
        );
    }

    public function testRestore(): void
    {
        $this->markTestSkipped(
            'Explicitly skipped test.'
        );

        $this->assertCall(
            method: 'restore',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/restore',
                'method' => 'post',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\Project::class,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"assigneeType":"PROJECT_LEAD","avatarUrls":{"16x16":"https://your-domain.atlassian.net/secure/projectavatar?size=xsmall&pid=10000","24x24":"https://your-domain.atlassian.net/secure/projectavatar?size=small&pid=10000","32x32":"https://your-domain.atlassian.net/secure/projectavatar?size=medium&pid=10000","48x48":"https://your-domain.atlassian.net/secure/projectavatar?size=large&pid=10000"},"components":[{"ari":"ari:cloud:compass:fdb3fdec-4e70-be56-11ee-0242ac120002:component/fdb3fdec-4e70-11ee-be56-0242ac120002/fdb3fdec-11ee-4e70-be56-0242ac120002","assignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"assigneeType":"PROJECT_LEAD","description":"This is a Jira component","id":"10000","isAssigneeTypeValid":false,"lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"metadata":{"icon":"https://www.example.com/icon.png"},"name":"Component 1","project":"HSP","projectId":10000,"realAssignee":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"realAssigneeType":"PROJECT_LEAD","self":"https://your-domain.atlassian.net/rest/api/3/component/10000"}],"description":"This project was created as an example for REST.","email":"from-jira@example.com","id":"10000","insight":{"lastIssueUpdateTime":"2021-04-22T05:37:05.000+0000","totalIssueCount":100},"issueTypes":[{"avatarId":1,"description":"A task that needs to be done.","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10299&avatarType=issuetype\",","id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","subtask":false},{"avatarId":10002,"description":"A problem with the software.","entityId":"9d7dd6f7-e8b6-4247-954b-7b2c9b2a5ba2","hierarchyLevel":0,"iconUrl":"https://your-domain.atlassian.net/secure/viewavatar?size=xsmall&avatarId=10316&avatarType=issuetype\",","id":"1","name":"Bug","scope":{"project":{"id":"10000"},"type":"PROJECT"},"self":"https://your-domain.atlassian.net/rest/api/3/issueType/1","subtask":false}],"key":"EX","lead":{"accountId":"5b10a2844c20165700ede21g","accountType":"atlassian","active":false,"avatarUrls":{"16x16":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=16&s=16","24x24":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=24&s=24","32x32":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=32&s=32","48x48":"https://avatar-management--avatars.server-location.prod.public.atl-paas.net/initials/MK-5.png?size=48&s=48"},"displayName":"Mia Krystof","key":"","name":"","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"},"name":"Example","projectCategory":{"description":"First Project Category","id":"10000","name":"FIRST","self":"https://your-domain.atlassian.net/rest/api/3/projectCategory/10000"},"properties":{"propertyKey":"propertyValue"},"roles":{"Developers":"https://your-domain.atlassian.net/rest/api/3/project/EX/role/10000"},"self":"https://your-domain.atlassian.net/rest/api/3/project/EX","simplified":false,"style":"classic","url":"https://www.example.com","versions":[]}',
        );
    }

    public function testGetAllStatuses(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getAllStatuses',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/statuses',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => [Schema\IssueTypeWithStatus::class],
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '[{"id":"3","name":"Task","self":"https://your-domain.atlassian.net/rest/api/3/issueType/3","statuses":[{"description":"The issue is currently being worked on.","iconUrl":"https://your-domain.atlassian.net/images/icons/progress.gif","id":"10000","name":"In Progress","self":"https://your-domain.atlassian.net/rest/api/3/status/10000"},{"description":"The issue is closed.","iconUrl":"https://your-domain.atlassian.net/images/icons/closed.gif","id":"5","name":"Closed","self":"https://your-domain.atlassian.net/rest/api/3/status/5"}],"subtask":false}]',
        );
    }

    public function testGetHierarchy(): void
    {
        $projectId = 1234;

        $this->assertCall(
            method: 'getHierarchy',
            call: [
                'uri' => '/rest/api/3/project/{projectId}/hierarchy',
                'method' => 'get',
                'path' => compact('projectId'),
                'success' => 200,
                'schema' => Schema\ProjectIssueTypeHierarchy::class,
            ],
            arguments: [
                $projectId,
            ],
            response: '{"hierarchy":[{"issueTypes":[{"avatarId":10324,"entityId":"ce32639b-8911-4689-81da-65681f451516","id":10008,"name":"Story"},{"avatarId":10324,"entityId":"ffdbced5-fbfc-4370-a848-94e2ce3751af","id":10001,"name":"Bug"}],"level":0,"name":"Base"},{"issueTypes":[{"avatarId":10179,"entityId":"80f20d47-34dc-4680-8937-936b7e762a35","id":10007,"name":"Epic"}],"level":1,"name":"Epic"},{"issueTypes":[{"avatarId":10573,"entityId":"210b4879-15cc-414c-9746-f8f6b6be0a72","id":10009,"name":"Subtask"}],"level":-1,"name":"Subtask"}],"projectId":10030}',
        );
    }

    public function testGetNotificationSchemeForProject(): void
    {
        $projectKeyOrId = 'foo';
        $expand = null;

        $this->assertCall(
            method: 'getNotificationSchemeForProject',
            call: [
                'uri' => '/rest/api/3/project/{projectKeyOrId}/notificationscheme',
                'method' => 'get',
                'query' => compact('expand'),
                'path' => compact('projectKeyOrId'),
                'success' => 200,
                'schema' => Schema\NotificationScheme::class,
            ],
            arguments: [
                $projectKeyOrId,
                $expand,
            ],
            response: '{"description":"description","expand":"notificationSchemeEvents,user,group,projectRole,field,all","id":10100,"name":"notification scheme name","notificationSchemeEvents":[{"event":{"description":"Event published when an issue is created","id":1,"name":"Issue created"},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]},{"event":{"description":"Custom event that is published together with an issue created event","id":20,"name":"Custom event","templateEvent":{"description":"Event published when an issue is created","id":1,"name":"Issue created"}},"notifications":[{"expand":"group","group":{"groupId":"276f955c-63d7-42c8-9520-92d01dca0625","name":"jira-administrators","self":"https://your-domain.atlassian.net/rest/api/3/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625"},"id":1,"notificationType":"Group","parameter":"jira-administrators","recipient":"276f955c-63d7-42c8-9520-92d01dca0625"},{"id":2,"notificationType":"CurrentAssignee"},{"expand":"projectRole","id":3,"notificationType":"ProjectRole","parameter":"10360","projectRole":{"self":"https://your-domain.atlassian.net/rest/api/3/project/MKY/role/10360","name":"Developers","id":10360,"description":"A project role that represents developers in a project","actors":[{"actorGroup":{"name":"jira-developers","displayName":"jira-developers","groupId":"952d12c3-5b5b-4d04-bb32-44d383afc4b2"},"displayName":"jira-developers","id":10240,"name":"jira-developers","type":"atlassian-group-role-actor"},{"actorUser":{"accountId":"5b10a2844c20165700ede21g"},"displayName":"Mia Krystof","id":10241,"type":"atlassian-user-role-actor"}],"scope":{"project":{"id":"10000","key":"KEY","name":"Next Gen Project"},"type":"PROJECT"}},"recipient":"10360"},{"emailAddress":"rest-developer@atlassian.com","id":4,"notificationType":"EmailAddress","parameter":"rest-developer@atlassian.com","recipient":"rest-developer@atlassian.com"},{"expand":"user","id":5,"notificationType":"User","parameter":"5b10a2844c20165700ede21g","recipient":"5b10a2844c20165700ede21g","user":{"accountId":"5b10a2844c20165700ede21g","active":false,"displayName":"Mia Krystof","self":"https://your-domain.atlassian.net/rest/api/3/user?accountId=5b10a2844c20165700ede21g"}},{"expand":"field","field":{"clauseNames":["cf[10101]","New custom field"],"custom":true,"id":"customfield_10101","key":"customfield_10101","name":"New custom field","navigable":true,"orderable":true,"schema":{"custom":"com.atlassian.jira.plugin.system.customfieldtypes:project","customId":10101,"type":"project"},"searchable":true,"untranslatedName":"New custom field"},"id":6,"notificationType":"GroupCustomField","parameter":"customfield_10101","recipient":"customfield_10101"}]}],"projects":[10001,10002],"self":"https://your-domain.atlassian.net/rest/api/3/notificationscheme"}',
        );
    }
}
