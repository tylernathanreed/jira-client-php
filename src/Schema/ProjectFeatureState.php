<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the feature state. */
final readonly class ProjectFeatureState extends Dto
{
    public function __construct(
        /**
         * The feature state.
         * 
         * @var 'ENABLED'|'DISABLED'|'COMING_SOON'|null
         */
        public ?string $state = null,
    ) {
    }
}
