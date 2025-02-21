<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// CommentDoc
final readonly class Comment extends Dto
{
    public function __construct(
        /** The ID of the user who created the comment. */
        public ?UserDetails $author = null,

        /**
         * The comment text in "Atlassian Document Format".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/apis/document/structure/
         */
        public mixed $body = null,

        /** The date and time at which the comment was created. */
        public ?DateTimeImmutable $created = null,

        /** The ID of the comment. */
        public ?string $id = null,

        /**
         * Whether the comment was added from an email sent by a person who is not part of the issue.
         * See "Allow external emails to be added as comments on issues"for information on setting up this feature.
         * 
         * @link https://support.atlassian.com/jira-service-management-cloud/docs/allow-external-emails-to-be-added-as-comments-on-issues/
         */
        public ?bool $jsdAuthorCanSeeRequest = null,

        /**
         * Whether the comment is visible in Jira Service Desk.
         * Defaults to true when comments are created in the Jira Cloud Platform.
         * This includes when the site doesn't use Jira Service Desk or the project isn't a Jira Service Desk project and, therefore, there is no Jira Service Desk for the issue to be visible on.
         * To create a comment with its visibility in Jira Service Desk set to false, use the Jira Service Desk REST API "Create request comment" operation.
         * 
         * @link https://developer.atlassian.com/cloud/jira/service-desk/rest/#api-rest-servicedeskapi-request-issueIdOrKey-comment-post
         */
        public ?bool $jsdPublic = null,

        /**
         * A list of comment properties.
         * Optional on create and update.
         * 
         * @var ?list<EntityProperty>
         */
        public ?array $properties = null,

        /** The rendered version of the comment. */
        public ?string $renderedBody = null,

        /** The URL of the comment. */
        public ?string $self = null,

        /** The ID of the user who updated the comment last. */
        public ?UserDetails $updateAuthor = null,

        /** The date and time at which the comment was updated last. */
        public ?DateTimeImmutable $updated = null,

        /**
         * The group or role to which this comment is visible.
         * Optional on create and update.
         */
        public ?Visibility $visibility = null,
    ) {
    }
}
