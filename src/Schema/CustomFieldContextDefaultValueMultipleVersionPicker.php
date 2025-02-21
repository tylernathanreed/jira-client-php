<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a multiple version picker custom field. */
final readonly class CustomFieldContextDefaultValueMultipleVersionPicker extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The IDs of the default versions.
         * 
         * @var list<string>
         */
        public array $versionIds,

        /**
         * The order the pickable versions are displayed in.
         * If not provided, the released-first order is used.
         * Available version orders are `"releasedFirst"` and `"unreleasedFirst"`.
         */
        public ?string $versionOrder = null,
    ) {
    }
}
