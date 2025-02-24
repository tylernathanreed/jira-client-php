<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ProjectKeyAndNameValidation
{
    /**
     * Validates a project key by confirming the key is a valid string and not in use
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $key The project key.
     */
    public function validateProjectKey(
        ?string $key = null,
    ): Schema\ErrorCollection {
        return $this->call(
            uri: '/rest/api/3/projectvalidate/key',
            method: 'get',
            query: compact('key'),
            success: 200,
            schema: Schema\ErrorCollection::class,
        );
    }

    /**
     * Validates a project key and, if the key is invalid or in use, generates a valid random string for the project key
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $key The project key.
     */
    public function getValidProjectKey(
        ?string $key = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/projectvalidate/validProjectKey',
            method: 'get',
            query: compact('key'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Checks that a project name isn't in use.
     * If the name isn't in use, the passed string is returned.
     * If the name is in use, this operation attempts to generate a valid project name based on the one supplied, usually by adding a sequence number.
     * If a valid project name cannot be generated, a 404 response is returned
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $name The project name.
     */
    public function getValidProjectName(
        string $name,
    ): true {
        return $this->call(
            uri: '/rest/api/3/projectvalidate/validProjectName',
            method: 'get',
            query: compact('name'),
            success: 200,
            schema: true,
        );
    }
}
