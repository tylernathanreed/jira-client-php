<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details a link group, which defines issue operations. */
final readonly class LinkGroup extends Dto
{
    public function __construct(
        /** @var ?list<LinkGroup> */
        public ?array $groups = null,

        public ?SimpleLink $header = null,

        public ?string $id = null,

        /** @var ?list<SimpleLink> */
        public ?array $links = null,

        public ?string $styleClass = null,

        public ?int $weight = null,
    ) {
    }
}
