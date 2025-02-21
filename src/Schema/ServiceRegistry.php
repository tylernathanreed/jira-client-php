<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ServiceRegistry extends Dto
{
    public function __construct(
        /** service description */
        public ?string $description = null,

        /** service ID */
        public ?string $id = null,

        /** service name */
        public ?string $name = null,

        /** organization ID */
        public ?string $organizationId = null,

        /** service revision */
        public ?string $revision = null,

        public ?ServiceRegistryTier $serviceTier = null,
    ) {
    }
}
