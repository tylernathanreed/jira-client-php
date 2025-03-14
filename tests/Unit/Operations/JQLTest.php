<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class JQLTest extends OperationsTestCase
{
    public function testGetAutoComplete(): void
    {
        $this->assertCall(
            method: 'getAutoComplete',
            call: [
                'uri' => '/rest/api/3/jql/autocompletedata',
                'method' => 'get',
                'success' => 200,
                'schema' => Schema\JQLReferenceData::class,
            ],
            arguments: [],
            response: '{"jqlReservedWords":["empty","and","or","in","distinct"],"visibleFieldNames":[{"displayName":"summary","operators":["~","!~","is","is not"],"orderable":"true","searchable":"true","types":["java.lang.String"],"value":"summary"},{"auto":"true","cfid":"cf[10880]","displayName":"Sprint - cf[10880]","operators":["=","!=","in","not in","is","is not"],"orderable":"true","searchable":"true","types":["com.atlassian.greenhopper.service.sprint.Sprint"],"value":"Sprint"}],"visibleFunctionNames":[{"displayName":"standardIssueTypes()","isList":"true","types":["com.atlassian.jira.issue.issuetype.IssueType"],"value":"standardIssueTypes()"},{"displayName":"issuesWithText()","supportsListAndSingleValueOperators":"true","types":["com.atlassian.jira.issue.issuetype.IssueType"],"value":"issuesWithText()"}]}',
        );
    }

    public function testGetAutoCompletePost(): void
    {
        $request = $this->deserialize(Schema\SearchAutoCompleteFilter::class, [
            'includeCollapsedFields' => true,
            'projectIds' => [
                '10000',
                '10001',
                '10002',
            ],
        ]);

        $this->assertCall(
            method: 'getAutoCompletePost',
            call: [
                'uri' => '/rest/api/3/jql/autocompletedata',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\JQLReferenceData::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"jqlReservedWords":["empty","and","or","in","distinct"],"visibleFieldNames":[{"displayName":"summary","operators":["~","!~","is","is not"],"orderable":"true","searchable":"true","types":["java.lang.String"],"value":"summary"},{"auto":"true","cfid":"cf[10061]","displayName":"Component - cf[10061]","operators":["=","!=","in","not in","is","is not"],"orderable":"true","types":["com.atlassian.jira.issue.customfields.option.Option"],"value":"cf[10061]"},{"auto":"true","cfid":"cf[10062]","displayName":"Component - cf[10062]","operators":["=","!=","in","not in","is","is not"],"orderable":"true","types":["com.atlassian.jira.issue.customfields.option.Option"],"value":"cf[10062]"},{"auto":"true","displayName":"Component - Component[Dropdown]","operators":["=","!=","in","not in","is","is not"],"searchable":"true","types":["com.atlassian.jira.issue.customfields.option.Option"],"value":"\"Component[Dropdown]\""}],"visibleFunctionNames":[{"displayName":"standardIssueTypes()","isList":"true","types":["com.atlassian.jira.issue.issuetype.IssueType"],"value":"standardIssueTypes()"}]}',
        );
    }

    public function testGetFieldAutoCompleteForQueryString(): void
    {
        $fieldName = 'reporter';
        $fieldValue = null;
        $predicateName = null;
        $predicateValue = null;

        $this->assertCall(
            method: 'getFieldAutoCompleteForQueryString',
            call: [
                'uri' => '/rest/api/3/jql/autocompletedata/suggestions',
                'method' => 'get',
                'query' => compact('fieldName', 'fieldValue', 'predicateName', 'predicateValue'),
                'success' => 200,
                'schema' => Schema\AutoCompleteSuggestions::class,
            ],
            arguments: [
                $fieldName,
                $fieldValue,
                $predicateName,
                $predicateValue,
            ],
            response: '{"results":[{"displayName":"<b>Ac</b>tiveObjects (AO)","value":"ActiveObjects"},{"displayName":"Atlassian Connect (<b>AC</b>)","value":"Atlassian Connect"},{"displayName":"Atlassian Connect in Jira (<b>AC</b>JIRA)","value":"Atlassian Connect in Jira"}]}',
        );
    }

    public function testParseJqlQueries(): void
    {
        $request = $this->deserialize(Schema\JqlQueriesToParse::class, [
            'queries' => [
                'summary ~ test AND (labels in (urgent, blocker] OR lastCommentedBy = currentUser(]] AND status CHANGED AFTER startOfMonth(-1M] ORDER BY updated DESC',
                'issue.property["spaces here"].value in ("Service requests", Incidents]',
                'invalid query',
                'summary = test',
                'summary in test',
                'project = INVALID',
                'universe = 42',
            ],
        ]);

        $validation = 'strict';

        $this->assertCall(
            method: 'parseJqlQueries',
            call: [
                'uri' => '/rest/api/3/jql/parse',
                'method' => 'post',
                'body' => $request,
                'query' => compact('validation'),
                'success' => 200,
                'schema' => Schema\ParsedJqlQueries::class,
            ],
            arguments: [
                $request,
                $validation,
            ],
            response: '{"queries":[{"query":"summary ~ test AND (labels in (urgent, blocker) OR lastCommentedBy = currentUser()) AND status CHANGED AFTER -5d ORDER BY updated DESC","structure":{"orderBy":{"fields":[{"direction":"desc","field":{"encodedName":"updated","name":"updated"}}]},"where":{"clauses":[{"field":{"encodedName":"summary","name":"summary"},"operand":{"encodedValue":"test","value":"test"},"operator":"~"},{"clauses":[{"field":{"encodedName":"labels","name":"labels"},"operand":{"encodedOperand":"urgent, blocker)","values":[{"encodedValue":"urgent","value":"urgent"},{"encodedValue":"blocker","value":"blocker"}]},"operator":"in"},{"field":{"encodedName":"lastCommentedBy","name":"lastCommentedBy","property":[{"entity":"issue","key":"propertyKey","path":"path.in.property","type":"user"}]},"operand":{"arguments":[],"encodedOperand":"currentUser()","function":"currentUser"},"operator":"="}],"operator":"or"},{"field":{"encodedName":"status","name":"status"},"operator":"changed","predicates":[{"operand":{"arguments":["-1M"],"encodedOperand":"startOfMonth(-1M)","function":"startOfMonth"},"operator":"after"}]}],"operator":"and"}}},{"query":"issue.property[\"spaces here\"].value in (\"Service requests\", Incidents)","structure":{"where":{"field":{"encodedName":"issue.property[\"spaces here\"].value","name":"issue.property[spaces here].value","property":[{"entity":"issue","key":"spaces here","path":"value"}]},"operand":{"encodedOperand":"(\"Service requests\", Incidents)","values":[{"encodedValue":"\"Service requests\"","value":"Service requests"},{"encodedValue":"Incidents","value":"Incidents"}]},"operator":"in"}}},{"errors":["Error in the JQL Query: Expecting operator but got \'query\'. The valid operators are \'=\', \'!=\', \'<\', \'>\', \'<=\', \'>=\', \'~\', \'!~\', \'IN\', \'NOT IN\', \'IS\' and \'IS NOT\'. (line 1, character 9)"],"query":"invalid query"},{"errors":["The operator \'=\' is not supported by the \'summary\' field."],"query":"summary = test"},{"errors":["Operator \'in\' does not support the non-list value \'\"test\"\' for field \'summary\'."],"query":"summary in test"},{"errors":["The value \'INVALID\' does not exist for the field \'project\'."],"query":"project = INVALID"},{"errors":["Field \'universe\' does not exist or you do not have permission to view it."],"query":"universe = 42"}]}',
        );
    }

    public function testMigrateQueries(): void
    {
        $request = $this->deserialize(Schema\JQLPersonalDataMigrationRequest::class, [
            'queryStrings' => [
                'assignee = mia',
                'issuetype = Bug AND assignee in (mia] AND reporter in (alana] order by lastViewed DESC',
            ],
        ]);

        $this->assertCall(
            method: 'migrateQueries',
            call: [
                'uri' => '/rest/api/3/jql/pdcleaner',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\ConvertedJQLQueries::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"queriesWithUnknownUsers":[{"convertedQuery":"assignee = unknown","originalQuery":"assignee = mia"}],"queryStrings":["issuetype = Bug AND assignee in (abcde-12345) AND reporter in (abc551-c4e99) order by lastViewed DESC"]}',
        );
    }

    public function testSanitiseJqlQueries(): void
    {
        $request = $this->deserialize(Schema\JqlQueriesToSanitize::class, [
            'queries' => [
                [
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => '5b10ac8d82e05b22cc7d4ef5',
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => 'cda2aa1395ac195d951b3387',
                    'query' => 'project = \\\'Sample project\\\'',
                ],
                [
                    'accountId' => '5b10ac8d82e05b22cc7d4ef5',
                    'query' => 'invalid query',
                ],
            ],
        ]);

        $this->assertCall(
            method: 'sanitiseJqlQueries',
            call: [
                'uri' => '/rest/api/3/jql/sanitize',
                'method' => 'post',
                'body' => $request,
                'success' => 200,
                'schema' => Schema\SanitizedJqlQueries::class,
            ],
            arguments: [
                $request,
            ],
            response: '{"queries":[{"initialQuery":"project = \'Sample project\'","sanitizedQuery":"project = 12345"},{"initialQuery":"project = \'Sample project\'","sanitizedQuery":"project = \'Sample project\'","accountId":"5b10ac8d82e05b22cc7d4ef5"},{"initialQuery":"project = \'Sample project\'","sanitizedQuery":"project = 12345","accountId":"cda2aa1395ac195d951b3387"},{"initialQuery":"non-parsable query","errors":{"errorMessages":["Error in the JQL Query: Expecting operator but got \'query\'. The valid operators are \'=\', \'!=\', \'<\', \'>\', \'<=\', \'>=\', \'~\', \'!~\', \'IN\', \'NOT IN\', \'IS\' and \'IS NOT\'. (line 1, character 9)"],"errors":{}},"accountId":"5b10ac8d82e05b22cc7d4ef5"}]}',
        );
    }
}
