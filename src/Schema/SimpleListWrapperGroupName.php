<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Attributes\MapName;
use Jira\Client\Http\Dto;

final class SimpleListWrapperGroupName extends Dto
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
