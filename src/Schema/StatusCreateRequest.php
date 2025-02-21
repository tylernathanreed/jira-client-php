<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the statuses being created and their scope. */
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
