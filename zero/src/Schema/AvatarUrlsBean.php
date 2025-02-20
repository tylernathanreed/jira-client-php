<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AvatarUrlsBean extends Dto
{
    public function __construct(
        /** The URL of the item's 16x16 pixel avatar. */
        public ?string $_16x16 = null,

        /** The URL of the item's 24x24 pixel avatar. */
        public ?string $_24x24 = null,

        /** The URL of the item's 32x32 pixel avatar. */
        public ?string $_32x32 = null,

        /** The URL of the item's 48x48 pixel avatar. */
        public ?string $_48x48 = null,
    ) {
    }
}
