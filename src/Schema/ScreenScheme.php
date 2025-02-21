<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A screen scheme. */
final readonly class ScreenScheme extends Dto
{
    public function __construct(
        /** The description of the screen scheme. */
        public ?string $description = null,

        /** The ID of the screen scheme. */
        public ?int $id = null,

        /** Details of the issue type screen schemes associated with the screen scheme. */
        public ?PageBeanIssueTypeScreenScheme $issueTypeScreenSchemes = null,

        /** The name of the screen scheme. */
        public ?string $name = null,

        /** The IDs of the screens for the screen types of the screen scheme. */
        public ?ScreenTypes $screens = null,
    ) {
    }
}
