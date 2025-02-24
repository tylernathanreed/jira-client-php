<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait JQL
{
    /**
     * Returns reference data for JQL searches.
     * This is a downloadable version of the documentation provided in "Advanced searching - fields reference" and "Advanced searching - functions reference", along with a list of JQL-reserved words.
     * Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder
     * 
     * To filter visible field details by project or collapse non-unique fields by field type then "Get field reference data (POST)" can be used
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/gwORLQ
     * @link https://confluence.atlassian.com/x/hgORLQ
     */
    public function getAutoComplete(): Schema\JQLReferenceData
    {
        return $this->call(
            uri: '/rest/api/3/jql/autocompletedata',
            method: 'get',
            success: 200,
            schema: Schema\JQLReferenceData::class,
        );
    }

    /**
     * Returns reference data for JQL searches.
     * This is a downloadable version of the documentation provided in "Advanced searching - fields reference" and "Advanced searching - functions reference", along with a list of JQL-reserved words.
     * Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder
     * 
     * This operation can filter the custom fields returned by project.
     * Invalid project IDs in `projectIds` are ignored.
     * System fields are always returned
     * 
     * It can also return the collapsed field for custom fields.
     * Collapsed fields enable searches to be performed across all fields with the same name and of the same field type.
     * For example, the collapsed field `Component - Component[Dropdown]` enables dropdown fields `Component - cf[10061]` and `Component - cf[10062]` to be searched simultaneously
     * 
     * **"Permissions" required:** None.
     * 
     * @link https://confluence.atlassian.com/x/gwORLQ
     * @link https://confluence.atlassian.com/x/hgORLQ
     */
    public function getAutoCompletePost(
        Schema\SearchAutoCompleteFilter $request,
    ): Schema\JQLReferenceData {
        return $this->call(
            uri: '/rest/api/3/jql/autocompletedata',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\JQLReferenceData::class,
        );
    }

    /**
     * Returns the JQL search auto complete suggestions for a field
     * 
     * Suggestions can be obtained by providing:
     * 
     *  - `fieldName` to get a list of all values for the field
     *  - `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`
     *  - `fieldName` and `predicateName` to get a list of all predicate values for the field
     *  - `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param string $fieldName The name of the field.
     * @param string $fieldValue The partial field item name entered by the user.
     * @param string $predicateName The name of the " CHANGED operator predicate" for which the suggestions are generated.
     *                              The valid predicate operators are *by*, *from*, and *to*.
     *                              @link https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED
     * @param string $predicateValue The partial predicate item name entered by the user.
     */
    public function getFieldAutoCompleteForQueryString(
        ?string $fieldName = null,
        ?string $fieldValue = null,
        ?string $predicateName = null,
        ?string $predicateValue = null,
    ): Schema\AutoCompleteSuggestions {
        return $this->call(
            uri: '/rest/api/3/jql/autocompletedata/suggestions',
            method: 'get',
            query: compact('fieldName', 'fieldValue', 'predicateName', 'predicateValue'),
            success: 200,
            schema: Schema\AutoCompleteSuggestions::class,
        );
    }

    /**
     * Parses and validates JQL queries
     * 
     * Validation is performed in context of the current user
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param 'strict'|'warn'|'none' $validation
     *        How to validate the JQL query and treat the validation results.
     *        Validation options include:
     *         - `strict` Returns all errors.
     *        If validation fails, the query structure is not returned
     *         - `warn` Returns all errors.
     *        If validation fails but the JQL query is correctly formed, the query structure is returned
     *         - `none` No validation is performed.
     *        If JQL query is correctly formed, the query structure is returned.
     */
    public function parseJqlQueries(
        Schema\JqlQueriesToParse $request,
        string $validation = 'strict',
    ): Schema\ParsedJqlQueries {
        return $this->call(
            uri: '/rest/api/3/jql/parse',
            method: 'post',
            body: $request,
            query: compact('validation'),
            success: 200,
            schema: Schema\ParsedJqlQueries::class,
        );
    }

    /**
     * Converts one or more JQL queries with user identifiers (username or user key) to equivalent JQL queries with account IDs
     * 
     * You may wish to use this operation if your system stores JQL queries and you want to make them GDPR-compliant.
     * For more information about GDPR-related changes, see the "migration guide"
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
     */
    public function migrateQueries(
        Schema\JQLPersonalDataMigrationRequest $request,
    ): Schema\ConvertedJQLQueries {
        return $this->call(
            uri: '/rest/api/3/jql/pdcleaner',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\ConvertedJQLQueries::class,
        );
    }

    /**
     * Sanitizes one or more JQL queries by converting readable details into IDs where a user doesn't have permission to view the entity
     * 
     * For example, if the query contains the clause *project = 'Secret project'*, and a user does not have browse permission for the project "Secret project", the sanitized query replaces the clause with *project = 12345"* (where 12345 is the ID of the project).
     * If a user has the required permission, the clause is not sanitized.
     * If the account ID is null, sanitizing is performed for an anonymous user
     * 
     * Note that sanitization doesn't make the queries GDPR-compliant, because it doesn't remove user identifiers (username or user key).
     * If you need to make queries GDPR-compliant, use "Convert user identifiers to account IDs in JQL queries"
     * 
     * Before sanitization each JQL query is parsed.
     * The queries are returned in the same order that they were passed
     * 
     * **"Permissions" required:** *Administer Jira* "global permission".
     * 
     * @link https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-sanitize-post
     * @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function sanitiseJqlQueries(
        Schema\JqlQueriesToSanitize $request,
    ): Schema\SanitizedJqlQueries {
        return $this->call(
            uri: '/rest/api/3/jql/sanitize',
            method: 'post',
            body: $request,
            success: 200,
            schema: Schema\SanitizedJqlQueries::class,
        );
    }
}
