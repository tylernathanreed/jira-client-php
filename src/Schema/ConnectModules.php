<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConnectModulesDoc
final readonly class ConnectModules extends Dto
{
    public function __construct(
        /**
         * A list of app modules in the same format as the `modules` property in the
         * "app descriptor".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/app-descriptor/
         * 
         * @var list<ConnectModule>
         */
        public array $modules,
    ) {
    }
}
