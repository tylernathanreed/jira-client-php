<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a version picker custom field. */
final readonly class CustomFieldContextDefaultValueSingleVersionPicker extends Dto
{
    public function __construct(
        public string $type,

        /** The ID of the default version. */
        public string $versionId,

        /**
         * The order the pickable versions are displayed in.
         * If not provided, the released-first order is used.
         * Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
         */
        public ?string $versionOrder = null,
    ) {
    }
}
