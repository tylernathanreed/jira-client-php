<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectTemplates
{
    /**
     * Creates a project based on a custom template provided in the request
     * 
     * The request body should contain the project details and the capabilities that comprise the project:
     * 
     *  - `details` \- represents the project details settings
     *  - `template` \- represents a list of capabilities responsible for creating specific parts of a project
     * 
     * A capability is defined as a unit of configuration for the project you want to create
     * 
     * This operation is:
     * 
     *  - "asynchronous".
     * Follow the `Location` link in the response header to determine the status of the task and use "Get task" to obtain subsequent updates
     * 
     * ***Note: This API is only supported for Jira Enterprise edition.***
     */
    public function createProjectWithCustomTemplate(
        Schema\ProjectCustomTemplateCreateRequestDTO $request,
    ): bool {
        return $this->call(
            uri: '/rest/api/3/project-template',
            method: 'post',
            body: $request,
            success: 303,
            schema: true,
        );
    }
}
