<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait ServiceRegistry
{
    /**
     * Retrieve the attributes of given service registries
     * 
     * **"Permissions" required:** Only Connect apps can make this request and the servicesIds belong to the tenant you are requesting
     * 
     * @param list<string> $serviceIds The ID of the services (the strings starting with "b:" need to be decoded in Base64).
     */
    public function ServiceRegistryResource.services_get(
        array $serviceIds,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/service-registry',
            method: 'get',
            query: compact('serviceIds'),
            success: 200,
            schema: true,
        );
    }
}
