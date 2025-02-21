<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PageOfCommentsDoc
final readonly class PageOfComments extends Dto
{
    public function __construct(
        /**
         * The list of comments.
         * 
         * @var ?list<Comment>
         */
        public ?array $comments = null,

        /** The maximum number of items that could be returned. */
        public ?int $maxResults = null,

        /** The index of the first item returned. */
        public ?int $startAt = null,

        /** The number of items returned. */
        public ?int $total = null,
    ) {
    }
}
