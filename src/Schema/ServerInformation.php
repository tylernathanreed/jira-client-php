<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// ServerInformationDoc
final readonly class ServerInformation extends Dto
{
    public function __construct(
        /** The base URL of the Jira instance. */
        public ?string $baseUrl = null,

        /** The timestamp when the Jira version was built. */
        public ?DateTimeImmutable $buildDate = null,

        /** The build number of the Jira version. */
        public ?int $buildNumber = null,

        /**
         * The type of server deployment.
         * This is always returned as *Cloud*.
         */
        public ?string $deploymentType = null,

        /** The display URL of the Jira instance. */
        public ?string $displayUrl = null,

        /** The display URL of Confluence. */
        public ?string $displayUrlConfluence = null,

        /** The display URL of the Servicedesk Help Center. */
        public ?string $displayUrlServicedeskHelpCenter = null,

        /**
         * Jira instance health check results.
         * Deprecated and no longer returned.
         * 
         * @var ?list<HealthCheckResult>
         */
        public ?array $healthChecks = null,

        /** The unique identifier of the Jira version. */
        public ?string $scmInfo = null,

        /** The time in Jira when this request was responded to. */
        public ?DateTimeImmutable $serverTime = null,

        /**
         * The default timezone of the Jira server.
         * In a format known as Olson Time Zones, IANA Time Zones or TZ Database Time Zones.
         */
        public ?string $serverTimeZone = null,

        /** The name of the Jira instance. */
        public ?string $serverTitle = null,

        /** The version of Jira. */
        public ?string $version = null,

        /**
         * The major, minor, and revision version numbers of the Jira version.
         * 
         * @var ?list<int>
         */
        public ?array $versionNumbers = null,
    ) {
    }
}
