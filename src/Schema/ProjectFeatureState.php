<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of the feature state. */
final class ProjectFeatureState extends Dto
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
