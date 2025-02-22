<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class PageWithCursorGetTeamResponseForPage extends Dto
{
    public function __construct(
        public ?string $cursor = null,

        public ?bool $last = null,

        public ?string $nextPageCursor = null,

        public ?int $size = null,

        public ?int $total = null,

        /** @var ?list<GetTeamResponseForPage> */
        public ?array $values = null,
    ) {
    }
}
