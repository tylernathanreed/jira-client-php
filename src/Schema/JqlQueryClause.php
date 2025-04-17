<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\UnionDto;

/** A JQL query clause. */
final class JqlQueryClause extends UnionDto
{
    /** @inheritDoc */
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
