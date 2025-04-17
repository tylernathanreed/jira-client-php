<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload used to create a project role.
 * It is optional for CMP projects, as a default role actor will be provided.
 * TMP will add new role actors to the table.
 */
final class RolePayload extends Dto
{
    public function __construct(
        /**
         * The default actors for the role.
         * By adding default actors, the role will be added to any future projects created
         * 
         * @var ?list<ProjectCreateResourceIdentifier>
         * 
         * @example '[pcri:user:id:1234]'
         */
        public ?array $defaultActors = null,

        /** The description of the role */
        public ?string $description = null,

        /** The name of the role */
        public ?string $name = null,

        /**
         * The strategy to use when there is a conflict with an existing project role.
         * FAIL - Fail execution, this always needs to be unique; USE - Use the existing entity and ignore new entity parameters
         * 
         * @var 'FAIL'|'USE'|'NEW'|null
         */
        public ?string $onConflict = 'USE',

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The type of the role.
         * Only used by project-scoped project
         * 
         * @var 'HIDDEN'|'VIEWABLE'|'EDITABLE'|null
         * 
         * @example 'EDITABLE'
         */
        public ?string $type = null,
    ) {
    }
}
