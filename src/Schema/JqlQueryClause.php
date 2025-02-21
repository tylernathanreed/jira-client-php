<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryClauseDoc
final readonly class JqlQueryClause extends Dto
{
    /** @return list<class-string<Dto>> */
    public function unionTypes(): array
    {
        return [
            CompoundClause::class,
            FieldValueClause::class,
            FieldWasClause::class,
            FieldChangedClause::class,
        ];
    }
}
