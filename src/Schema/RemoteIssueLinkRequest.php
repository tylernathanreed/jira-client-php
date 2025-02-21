<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RemoteIssueLinkRequestDoc
final readonly class RemoteIssueLinkRequest extends Dto
{
    public function __construct(
        /** Details of the item linked to. */
        public RemoteObject $object,

        /**
         * Details of the remote application the linked item is in.
         * For example, trello.
         */
        public ?Application $application = null,

        /**
         * An identifier for the remote item in the remote system.
         * For example, the global ID for a remote item in Confluence would consist of the app ID and page ID, like this: `appId=456&pageId=123`
         * 
         * Setting this field enables the remote issue link details to be updated or deleted using remote system and item details as the record identifier, rather than using the record's Jira ID
         * 
         * The maximum length is 255 characters.
         */
        public ?string $globalId = null,

        /**
         * Description of the relationship between the issue and the linked item.
         * If not set, the relationship description "links to" is used in Jira.
         */
        public ?string $relationship = null,
    ) {
    }
}
