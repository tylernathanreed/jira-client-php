<?php

namespace Jira\Client\Http\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class MapName
{
    public function __construct(
        public readonly string $name,
    ) {
    }
}
