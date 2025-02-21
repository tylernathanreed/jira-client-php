<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a permission scheme. */
final readonly class PermissionScheme extends Dto
{
    public function __construct(
        /**
         * The name of the permission scheme.
         * Must be unique.
         */
        public string $name,

        /** A description for the permission scheme. */
        public ?string $description = null,

        /** The expand options available for the permission scheme. */
        public ?string $expand = null,

        /** The ID of the permission scheme. */
        public ?int $id = null,

        /**
         * The permission scheme to create or update.
         * See "About permission schemes and grants" for more information.
         * 
         * @link ../api-group-permission-schemes/#about-permission-schemes-and-grants
         * 
         * @var ?list<PermissionGrant>
         */
        public ?array $permissions = null,

        /** The scope of the permission scheme. */
        public ?Scope $scope = null,

        /** The URL of the permission scheme. */
        public ?string $self = null,
    ) {
    }
}
