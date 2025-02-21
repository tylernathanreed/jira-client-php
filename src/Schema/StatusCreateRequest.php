<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusCreateRequestDoc
final readonly class StatusCreateRequest extends Dto
{
    public function __construct(
        public StatusScope $scope,

        /**
         * Details of the statuses being created.
         * 
         * @var list<StatusCreate>
         */
        public array $statuses,
    ) {
    }
}
