<?php

namespace Jira\Client\Http\Attributes;

use Attribute;
use Jira\Client\Http\PolymorphicDto;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class PolymorphicList
{
    public function __construct(
        /** @var class-string<PolymorphicDto> */
        public string $name,
    ) {}
}
