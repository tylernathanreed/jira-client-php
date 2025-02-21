<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the scope of the default sharing for new filters and dashboards. */
final readonly class DefaultShareScope extends Dto
{
    public function __construct(
        /**
         * The scope of the default sharing for new filters and dashboards:
         * 
         *  - `AUTHENTICATED` Shared with all logged-in users
         *  - `GLOBAL` Shared with all logged-in users.
         * This shows as `AUTHENTICATED` in the response
         *  - `PRIVATE` Not shared with any users.
         * 
         * @var 'GLOBAL'|'AUTHENTICATED'|'PRIVATE'
         */
        public string $scope,
    ) {
    }
}
