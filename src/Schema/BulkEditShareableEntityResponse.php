<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a request to bulk edit shareable entity. */
final class BulkEditShareableEntityResponse extends Dto
{
    public function __construct(
        /**
         * Allowed action for bulk edit shareable entity
         * 
         * @var 'changeOwner'|'changePermission'|'addPermission'|'removePermission'
         */
        public string $action,

        /**
         * The mapping dashboard id to errors if any.
         * 
         * @var array<string,BulkEditActionError>
         */
        public ?array $entityErrors = null,
    ) {
    }
}
