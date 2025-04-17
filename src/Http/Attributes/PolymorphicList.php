<?php

namespace Jira\Client\Http\Attributes;

use Attribute;
use Jira\Client\Http\PolymorphicDto;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class PolymorphicList
{
    public function __construct(
        /** @var class-string<PolymorphicDto> */
        public readonly string $name,
    ) {}
}
