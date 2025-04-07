<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\UnionDto;

/** Details of an operand in a JQL clause. */
final readonly class JqlQueryClauseOperand extends UnionDto
{
    /** @inheritDoc */
    public function unionTypes(): array
    {
        return [
            ListOperand::class,
            ValueOperand::class,
            FunctionOperand::class,
            KeywordOperand::class,
        ];
    }
}
