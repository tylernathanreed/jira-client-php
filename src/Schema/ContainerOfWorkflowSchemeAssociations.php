<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A container for a list of workflow schemes together with the projects they are associated with. */
final readonly class ContainerOfWorkflowSchemeAssociations extends Dto
{
    public function __construct(
        /**
         * A list of workflow schemes together with projects they are associated with.
         * 
         * @var list<WorkflowSchemeAssociations>
         */
        public array $values,
    ) {
    }
}
