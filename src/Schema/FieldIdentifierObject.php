<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

/** Identifier for a field for example FIELD\_ID. */
final readonly class FieldIdentifierObject extends PolymorphicDto
{
    public function __construct(
        public string $type,

        /** @var array<string,mixed> */
        public ?array $identifier = null,
    ) {
    }

    public static function discriminator(): string
    {
        return 'type';
    }

    /** @inheritDoc */
    public static function discriminatorMap(): array
    {
        return [

        ];
    }
}
