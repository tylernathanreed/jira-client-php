<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AssociatedItemBeanDoc
final readonly class AssociatedItemBean extends Dto
{
    public function __construct(
        /** The ID of the associated record. */
        public ?string $id = null,

        /** The name of the associated record. */
        public ?string $name = null,

        /** The ID of the associated parent record. */
        public ?string $parentId = null,

        /** The name of the associated parent record. */
        public ?string $parentName = null,

        /** The type of the associated record. */
        public ?string $typeName = null,
    ) {
    }
}
