<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Attributes\MapName;
use Reedware\OpenApi\Client\Dto;

final readonly class SimpleListWrapperGroupName extends Dto
{
    public function __construct(
        public ?ListWrapperCallbackGroupName $callback = null,

        /** @var ?list<GroupName> */
        public ?array $items = null,

        #[MapName('max-results')]
        public ?int $maxResults = null,

        public ?ListWrapperCallbackGroupName $pagingCallback = null,

        public ?int $size = null,
    ) {
    }
}
