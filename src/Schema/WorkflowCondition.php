<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

/** The workflow transition rule conditions tree. */
final readonly class WorkflowCondition extends PolymorphicDto
{
    public static function discriminator(): string
    {
        return 'nodeType';
    }

    /** @return array<string,class-string<Dto>> */
    public static function discriminatorMap(): array
    {
        return [
            'compound' => WorkflowCompoundCondition::class,
            'simple' => WorkflowSimpleCondition::class,
        ];
    }
}
