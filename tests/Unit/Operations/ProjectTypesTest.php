<?php

namespace Tests\Unit\Operations;

use Jira\Client\Schema;
use Tests\OperationsTestCase;

class ProjectTypesTest extends OperationsTestCase
{
    public function testGetAllProjectTypes(): void
    {
        $this->assertCall(
            method: 'getAllProjectTypes',
            call: [
                'uri' => '/rest/api/3/project/type',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ProjectType::class],
            ],
            arguments: [],
            response: '[{"color":"#FFFFFF","descriptionI18nKey":"jira.project.type.business.description","formattedKey":"Business","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"business"},{"color":"#AAAAAA","descriptionI18nKey":"jira.project.type.software.description","formattedKey":"Software","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"software"}]',
        );
    }

    public function testGetAllAccessibleProjectTypes(): void
    {
        $this->assertCall(
            method: 'getAllAccessibleProjectTypes',
            call: [
                'uri' => '/rest/api/3/project/type/accessible',
                'method' => 'get',
                'success' => 200,
                'schema' => [Schema\ProjectType::class],
            ],
            arguments: [],
            response: '[{"color":"#FFFFFF","descriptionI18nKey":"jira.project.type.business.description","formattedKey":"Business","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"business"},{"color":"#AAAAAA","descriptionI18nKey":"jira.project.type.software.description","formattedKey":"Software","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"software"}]',
        );
    }

    public function testGetProjectTypeByKey(): void
    {
        $projectTypeKey = 'foo';

        $this->assertCall(
            method: 'getProjectTypeByKey',
            call: [
                'uri' => '/rest/api/3/project/type/{projectTypeKey}',
                'method' => 'get',
                'path' => compact('projectTypeKey'),
                'success' => 200,
                'schema' => Schema\ProjectType::class,
            ],
            arguments: [
                $projectTypeKey,
            ],
            response: '{"color":"#FFFFFF","descriptionI18nKey":"jira.project.type.business.description","formattedKey":"Business","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"business"}',
        );
    }

    public function testGetAccessibleProjectTypeByKey(): void
    {
        $projectTypeKey = 'foo';

        $this->assertCall(
            method: 'getAccessibleProjectTypeByKey',
            call: [
                'uri' => '/rest/api/3/project/type/{projectTypeKey}/accessible',
                'method' => 'get',
                'path' => compact('projectTypeKey'),
                'success' => 200,
                'schema' => Schema\ProjectType::class,
            ],
            arguments: [
                $projectTypeKey,
            ],
            response: '{"color":"#FFFFFF","descriptionI18nKey":"jira.project.type.business.description","formattedKey":"Business","icon":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4xLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAzMiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzIgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZmlsbD0iIzY2NjY2NiIgZD0iTTE2LDBDNy4yLDAsMCw3LjIsMCwxNmMwLDguOCw3LjIsMTYsMTYsMTZjOC44LDAsMTYtNy4yLDE2LTE2QzMyLDcuMiwyNC44LDAsMTYsMHogTTI1LjcsMjMNCgkJYzAsMS44LTEuNCwzLjItMy4yLDMuMkg5LjJDNy41LDI2LjIsNiwyNC44LDYsMjNWOS44QzYsOCw3LjUsNi42LDkuMiw2LjZoMTMuMmMwLjIsMCwwLjQsMCwwLjcsMC4xbC0yLjgsMi44SDkuMg0KCQlDOSw5LjQsOC44LDkuNiw4LjgsOS44VjIzYzAsMC4yLDAuMiwwLjQsMC40LDAuNGgxMy4yYzAuMiwwLDAuNC0wLjIsMC40LTAuNHYtNS4zbDIuOC0yLjhWMjN6IE0xNS45LDIxLjNMMTEsMTYuNGwyLTJsMi45LDIuOQ0KCQlMMjYuNCw2LjhjMC42LDAuNywxLjIsMS41LDEuNywyLjNMMTUuOSwyMS4zeiIvPg0KPC9nPg0KPC9zdmc+","key":"business"}',
        );
    }
}
