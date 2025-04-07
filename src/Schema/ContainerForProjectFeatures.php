<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The list of features on a project. */
final readonly class ContainerForProjectFeatures extends Dto
{
    public function __construct(
        /**
         * The project features.
         * 
         * @var ?list<ProjectFeature>
         */
        public ?array $features = null,
    ) {
    }
}
