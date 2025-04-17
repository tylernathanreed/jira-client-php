<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class BoardsPayload extends Dto
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
