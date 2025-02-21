<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A JQL query clause. */
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
