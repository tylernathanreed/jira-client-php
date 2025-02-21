<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

// CustomContextVariableDoc
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

    /** @return array<string,class-string<Dto>> */
    public static function discriminatorMap(): array
    {
        return [
            'issue' => IssueContextVariable::class,
            'json' => JsonContextVariable::class,
            'user' => UserContextVariable::class,
        ];
    }
}
