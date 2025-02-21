<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an operand in a JQL clause. */
final readonly class JqlQueryClauseOperand extends Dto
{
    /** @return list<class-string<Dto>> */
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
