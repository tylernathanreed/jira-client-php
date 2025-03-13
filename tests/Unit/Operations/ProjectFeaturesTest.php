<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectFeaturesTest extends OperationsTestCase
{
    public function testGetFeaturesForProject(): void
    {
        $projectIdOrKey = 'foo';

        $this->assertCall(
            method: 'getFeaturesForProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/features',
                'method' => 'get',
                'path' => compact('projectIdOrKey'),
                'success' => 200,
                'schema' => Schema\ContainerForProjectFeatures::class,
            ],
            arguments: [
                $projectIdOrKey,
            ],
            response: '{"features":[{"feature":"jsw.classic.roadmap","imageUri":"https://jira.atlassian.com/s/sb53l8/b/3/ab8a7691e4738b4f147e293f0864adfd5b8d3c85/_/download/resources/com.atlassian.jira.rest:classic-project-features/simple-roadmap-feature.svg","localisedDescription":"Your roadmap is an optimized location to create and manage your epics.","localisedName":"Roadmap","prerequisites":[],"projectId":10001,"state":"ENABLED","toggleLocked":true},{"feature":"jsw.classic.backlog","imageUri":"https://jira.atlassian.com/s/sb53l8/b/3/ab8a7691e4738b4f147e293f0864adfd5b8d3c85/_/download/resources/com.atlassian.jira.rest:classic-project-features/simple-backlog-feature.svg","localisedDescription":"Plan and prioritize work in a dedicated space. To enable and configure the backlog for each board, go to board settings.","localisedName":"Backlog","prerequisites":[],"projectId":10001,"state":"ENABLED","toggleLocked":true}]}',
        );
    }

    public function testToggleFeatureForProject(): void
    {
        $request = new Schema\ProjectFeatureState(
            state: 'ENABLED',
        );

        $projectIdOrKey = 'foo';
        $featureKey = 'foo';

        $this->assertCall(
            method: 'toggleFeatureForProject',
            call: [
                'uri' => '/rest/api/3/project/{projectIdOrKey}/features/{featureKey}',
                'method' => 'put',
                'body' => $request,
                'path' => compact('projectIdOrKey', 'featureKey'),
                'success' => 200,
                'schema' => Schema\ContainerForProjectFeatures::class,
            ],
            arguments: [
                $request,
                $projectIdOrKey,
                $featureKey,
            ],
            response: '{"features":[{"feature":"jsw.classic.roadmap","imageUri":"https://jira.atlassian.com/s/sb53l8/b/3/ab8a7691e4738b4f147e293f0864adfd5b8d3c85/_/download/resources/com.atlassian.jira.rest:classic-project-features/simple-roadmap-feature.svg","localisedDescription":"Your roadmap is an optimized location to create and manage your epics.","localisedName":"Roadmap","prerequisites":[],"projectId":10001,"state":"ENABLED","toggleLocked":true},{"feature":"jsw.classic.backlog","imageUri":"https://jira.atlassian.com/s/sb53l8/b/3/ab8a7691e4738b4f147e293f0864adfd5b8d3c85/_/download/resources/com.atlassian.jira.rest:classic-project-features/simple-backlog-feature.svg","localisedDescription":"Plan and prioritize work in a dedicated space. To enable and configure the backlog for each board, go to board settings.","localisedName":"Backlog","prerequisites":[],"projectId":10001,"state":"ENABLED","toggleLocked":true}]}',
        );
    }
}
