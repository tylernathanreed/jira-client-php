<?php

namespace Jira\Client\Schema;

use Jira\Client\Attributes\MapName;
use Jira\Client\Dto;

/** A list of custom field details. */
final readonly class ConnectCustomFieldValue extends Dto
{
    public function __construct(
        /**
         * The type of custom field.
         * 
         * @var 'StringIssueField'|'NumberIssueField'|'RichTextIssueField'|'SingleSelectIssueField'|'MultiSelectIssueField'|'TextIssueField'
         */
        #[MapName('_type')]
        public string $type,

        /** The custom field ID. */
        public int $fieldID,

        /** The issue ID. */
        public int $issueID,

        /** The value of number type custom field when `_type` is `NumberIssueField`. */
        public ?float $number = null,

        /** The value of single select and multiselect custom field type when `_type` is `SingleSelectIssueField` or `MultiSelectIssueField`. */
        public ?string $optionID = null,

        /** The value of richText type custom field when `_type` is `RichTextIssueField`. */
        public ?string $richText = null,

        /** The value of string type custom field when `_type` is `StringIssueField`. */
        public ?string $string = null,

        /** The value of of text custom field type when `_type` is `TextIssueField`. */
        public ?string $text = null,
    ) {
    }
}
