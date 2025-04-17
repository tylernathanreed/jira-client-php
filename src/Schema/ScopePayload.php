<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a scope.
 * Defines if a project is team-managed project or company-managed project
 */
final class ScopePayload extends Dto
{
    public function __construct(
        /**
         * The type of the scope.
         * Use `GLOBAL` or empty for company-managed project, and `PROJECT` for team-managed project
         * 
         * @var 'GLOBAL'|'PROJECT'|null
         */
        public ?string $type = null,
    ) {
    }
}
