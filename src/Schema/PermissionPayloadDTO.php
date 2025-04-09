<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The payload to create a permission scheme */
final readonly class PermissionPayloadDTO extends Dto
{
    public function __construct(
        /**
         * Configuration to generate addon role.
         * Default is false if null
         */
        public ?bool $addAddonRole = null,

        /** The description of the permission scheme */
        public ?string $description = null,

        /**
         * List of permission grants
         * 
         * @var ?list<PermissionGrantDTO>
         */
        public ?array $grants = null,

        /** The name of the permission scheme */
        public ?string $name = null,

        /**
         * The strategy to use when there is a conflict with an existing permission scheme.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters; NEW - If the entity exist, try and create a new one with a different name
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = 'NEW',

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
