<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AddSecuritySchemeLevelsRequestBean extends Dto
{
    public function __construct(
        /**
         * The list of scheme levels which should be added to the security scheme.
         *
         * @var ?list<SecuritySchemeLevelBean>
         */
        public ?array $levels = null,
    ) {
    }
}
