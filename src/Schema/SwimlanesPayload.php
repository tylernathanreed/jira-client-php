<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for customising a swimlanes on a board */
final readonly class SwimlanesPayload extends Dto
{
    public function __construct(
        /**
         * The custom swimlane definitions.
         * 
         * @var ?list<SwimlanePayload>
         */
        public ?array $customSwimlanes = null,

        /** The name of the custom swimlane to use for work items that don't match any other swimlanes. */
        public ?string $defaultCustomSwimlaneName = null,

        /**
         * The swimlane strategy for the board.
         * 
         * @var 'none'|'custom'|'parentChild'|'assignee'|'assigneeUnassignedFirst'|'epic'|'project'|'issueparent'|'issuechildren'|'request_type'|null
         */
        public ?string $swimlaneStrategy = null,
    ) {
    }
}
