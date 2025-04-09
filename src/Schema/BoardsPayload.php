<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class BoardsPayload extends Dto
{
    public function __construct(
        /**
         * The boards to be associated with the project.
         * 
         * @var ?list<BoardPayload>
         */
        public ?array $boards = null,
    ) {
    }
}
