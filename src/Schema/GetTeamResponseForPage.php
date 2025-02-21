<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GetTeamResponseForPageDoc
final readonly class GetTeamResponseForPage extends Dto
{
    public function __construct(
        /** The team ID. */
        public string $id,

        /**
         * The team type.
         * This is "PlanOnly" or "Atlassian".
         * 
         * @var 'PlanOnly'|'Atlassian'
         */
        public string $type,

        /**
         * The team name.
         * This is returned if the type is "PlanOnly".
         */
        public ?string $name = null,
    ) {
    }
}
