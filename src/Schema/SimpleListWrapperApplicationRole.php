<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Attributes\MapName;
use Jira\Client\Http\Dto;

final class SimpleListWrapperApplicationRole extends Dto
{
    public function __construct(
        public ?ListWrapperCallbackApplicationRole $callback = null,

        /** @var ?list<ApplicationRole> */
        public ?array $items = null,

        #[MapName('max-results')]
        public ?int $maxResults = null,

        public ?ListWrapperCallbackApplicationRole $pagingCallback = null,

        public ?int $size = null,
    ) {
    }
}
