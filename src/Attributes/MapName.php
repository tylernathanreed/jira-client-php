<?php

namespace Jira\Client\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class MapName
{
    public function __construct(
        public string $name,
    ) {
    }
}
