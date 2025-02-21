<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An operand that can be part of a list operand. */
final readonly class JqlQueryUnitaryOperand extends Dto
{
    /** @return list<class-string<Dto>> */
    public function unionTypes(): array
    {
        return [
            ValueOperand::class,
            FunctionOperand::class,
            KeywordOperand::class,
        ];
    }
}
