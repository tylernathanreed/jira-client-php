<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectFeatures
{
    /**
     * Returns the list of features for a project.
     * 
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     */
    public function getFeaturesForProject(
        string $projectIdOrKey,
    ): Schema\ContainerForProjectFeatures {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/features',
            method: 'get',
            path: compact('projectIdOrKey'),
            success: 200,
            schema: Schema\ContainerForProjectFeatures::class,
        );
    }

    /**
     * Sets the state of a project feature.
     * 
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     * @param string $featureKey The key of the feature.
     */
    public function toggleFeatureForProject(
        Schema\ProjectFeatureState $request,
        string $projectIdOrKey,
        string $featureKey,
    ): Schema\ContainerForProjectFeatures {
        return $this->call(
            uri: '/rest/api/3/project/{projectIdOrKey}/features/{featureKey}',
            method: 'put',
            body: $request,
            path: compact('projectIdOrKey', 'featureKey'),
            success: 200,
            schema: Schema\ContainerForProjectFeatures::class,
        );
    }
}
