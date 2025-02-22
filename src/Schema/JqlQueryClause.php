<?php

namespace Jira\Client\Schema;

use Jira\Client\UnionDto;

/** A JQL query clause. */
final readonly class JqlQueryClause extends UnionDto
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
