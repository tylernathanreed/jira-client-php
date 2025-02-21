<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

final readonly class CustomContextVariable extends PolymorphicDto
{
    public function __construct(
        /** Type of custom context variable. */
        public string $type,
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
            'issue' => IssueContextVariable::class,
            'json' => JsonContextVariable::class,
            'user' => UserContextVariable::class,
        ];
    }
}
