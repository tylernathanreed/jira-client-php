<?php

namespace Jira\Client\Attributes;

use Attribute;
use Jira\Client\PolymorphicDto;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class PolymorphicList
{
    public function __construct(
        /** @var class-string<PolymorphicDto> */
        public string $name,
    ) {}
}
