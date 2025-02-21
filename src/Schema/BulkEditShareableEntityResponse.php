<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkEditShareableEntityResponseDoc
final readonly class BulkEditShareableEntityResponse extends Dto
{
    public function __construct(
        /**
         * Allowed action for bulk edit shareable entity
         * 
         * @var 'changeOwner'|'changePermission'|'addPermission'|'removePermission'
         */
        public string $action,

        /** The mapping dashboard id to errors if any. */
        public ?BulkEditActionError $entityErrors = null,
    ) {
    }
}
