<?php

namespace Reedware\OpenApi\Client\Http\Attributes;

use Attribute;
use Reedware\OpenApi\Client\Http\PolymorphicDto;

#[Attribute(Attribute::TARGET_PROPERTY)]
final readonly class PolymorphicList
{
    public function __construct(
        /** @var class-string<PolymorphicDto> */
        public string $name,
    ) {}
}
