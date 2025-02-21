<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryClauseOperandDoc
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
