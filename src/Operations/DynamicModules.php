<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait DynamicModules
{
    /**
     * Returns all modules registered dynamically by the calling app
     * 
     * **"Permissions" required:** Only Connect apps can make this request.
     */
    public function DynamicModulesResource.getModules_get(): Schema\ConnectModules
    {
        return $this->call(
            uri: '/rest/atlassian-connect/1/app/module/dynamic',
            method: 'get',
            success: 200,
            schema: Schema\ConnectModules::class,
        );
    }

    /**
     * Registers a list of modules
     * 
     * **"Permissions" required:** Only Connect apps can make this request.
     */
    public function DynamicModulesResource.registerModules_post(
        Schema\ConnectModules $request,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/app/module/dynamic',
            method: 'post',
            body: $request,
            success: 200,
            schema: true,
        );
    }

    /**
     * Remove all or a list of modules registered by the calling app
     * 
     * **"Permissions" required:** Only Connect apps can make this request.
     * 
     * @param ?list<string> $moduleKey The key of the module to remove.
     *                                 To include multiple module keys, provide multiple copies of this parameter
     *                                 For example, `moduleKey=dynamic-attachment-entity-property&moduleKey=dynamic-select-field`
     *                                 Nonexistent keys are ignored.
     */
    public function DynamicModulesResource.removeModules_delete(
        ?array $moduleKey = null,
    ): true {
        return $this->call(
            uri: '/rest/atlassian-connect/1/app/module/dynamic',
            method: 'delete',
            query: compact('moduleKey'),
            success: 204,
            schema: true,
        );
    }
}
