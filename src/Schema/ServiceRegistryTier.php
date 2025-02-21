<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ServiceRegistryTierDoc
final readonly class ServiceRegistryTier extends Dto
{
    public function __construct(
        /** tier description */
        public ?string $description = null,

        /** tier ID */
        public ?string $id = null,

        /** tier level */
        public ?int $level = null,

        /** tier name */
        public ?string $name = null,

        /**
         * name key of the tier
         * 
         * @example 'service-registry.tier1.name'
         */
        public ?string $nameKey = null,
    ) {
    }
}
