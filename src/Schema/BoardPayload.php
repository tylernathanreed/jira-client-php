<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload for creating a board */
final readonly class BoardPayload extends Dto
{
    public function __construct(
        /**
         * Takes in a JQL string to create a new filter.
         * If no value is provided, it'll default to a JQL filter for the project creating
         * 
         * @example 'project = 'My Project''
         */
        public ?string $boardFilterJQL = null,

        public ?CardLayout $cardLayout = null,

        /**
         * The columns of the board
         * 
         * @var ?list<BoardColumnPayload>
         */
        public ?array $columns = null,

        /**
         * Feature settings for the board
         * 
         * @var ?list<BoardFeaturePayload>
         */
        public ?array $features = null,

        /** The name of the board */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The quick filters for the board.
         * 
         * @var ?list<QuickFilterPayload>
         */
        public ?array $quickFilters = null,

        /** Whether sprints are supported on the board */
        public ?bool $supportsSprint = true,

        public ?SwimlanesPayload $swimlanes = null,

        public ?WorkingDaysConfig $workingDaysConfig = null,
    ) {
    }
}
