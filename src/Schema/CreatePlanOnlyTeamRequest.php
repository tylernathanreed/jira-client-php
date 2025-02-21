<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class CreatePlanOnlyTeamRequest extends Dto
{
    public function __construct(
        /** The plan-only team name. */
        public string $name,

        /**
         * The planning style for the plan-only team.
         * This must be "Scrum" or "Kanban".
         * 
         * @var 'Scrum'|'Kanban'
         */
        public string $planningStyle,

        /** The capacity for the plan-only team. */
        public ?float $capacity = null,

        /** The ID of the issue source for the plan-only team. */
        public ?int $issueSourceId = null,

        /**
         * The account IDs of the plan-only team members.
         * 
         * @var ?list<string>
         */
        public ?array $memberAccountIds = null,

        /** The sprint length for the plan-only team. */
        public ?int $sprintLength = null,
    ) {
    }
}
