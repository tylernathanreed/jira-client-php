<?php

namespace Jira\Client\Schema;

use Jira\Client\UnionDto;

/** An operand that can be part of a list operand. */
final readonly class JqlQueryUnitaryOperand extends UnionDto
{
    /** @inheritDoc */
    public function unionTypes(): array
    {
        return [
            ValueOperand::class,
            FunctionOperand::class,
            KeywordOperand::class,
        ];
    }
}
