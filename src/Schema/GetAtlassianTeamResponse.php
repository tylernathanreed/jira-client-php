<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GetAtlassianTeamResponseDoc
final readonly class GetAtlassianTeamResponse extends Dto
{
    public function __construct(
        /** The Atlassian team ID. */
        public string $id,

        /**
         * The planning style for the Atlassian team.
         * This is "Scrum" or "Kanban".
         * 
         * @var 'Scrum'|'Kanban'
         */
        public string $planningStyle,

        /** The capacity for the Atlassian team. */
        public ?float $capacity = null,

        /** The ID of the issue source for the Atlassian team. */
        public ?int $issueSourceId = null,

        /** The sprint length for the Atlassian team. */
        public ?int $sprintLength = null,
    ) {
    }
}
