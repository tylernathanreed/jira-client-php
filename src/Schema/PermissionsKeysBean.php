<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class PermissionsKeysBean extends Dto
{
    public function __construct(
        /**
         * A list of permission keys.
         * 
         * @var list<string>
         */
        public array $permissions,
    ) {
    }
}
