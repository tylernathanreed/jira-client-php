<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Details of a user, group, field, or project role that holds a permission.
 * See "Holder object" in *Get all permission schemes* for more information.
 * 
 * @link ../api-group-permission-schemes/#holder-object
 */
final readonly class PermissionHolder extends Dto
{
    public function __construct(
        /** The type of permission holder. */
        public string $type,

        /** Expand options that include additional permission holder details in the response. */
        public ?string $expand = null,

        /**
         * As a group's name can change, use of `value` is recommended.
         * The identifier associated withthe `type` value that defines the holder of the permission.
         */
        public ?string $parameter = null,

        /** The identifier associated with the `type` value that defines the holder of the permission. */
        public ?string $value = null,
    ) {
    }
}
