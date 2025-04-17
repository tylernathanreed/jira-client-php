# Jira Client for Cloud REST API

[![PHP](https://img.shields.io/badge/PHP-8.1+-blue)](https://www.php.net/)
[![Tests](https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml)
[![Lint](https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml)
[![Static Analysis](https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml)
[![Code Coverage](https://coveralls.io/repos/github/tylernathanreed/jira-client-php/badge.svg?branch=master)](https://coveralls.io/github/tylernathanreed/jira-client-php?branch=master)

This package provides an HTTP Client to interact with the [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest).

## Table of Contents

- [Introduction](#introduction)
  - [1. Jira Cloud vs Jira Software Cloud](#jira-cloud-vs-jira-software-cloud)
- [Installation](#installation)
  - [1. Requirements](#requirements)
- [Configuration](#configuration)
  - [1. Authentication](#authentication)
  - [2. Laravel](#laravel)
- [Usage](#usage)
  - [1. Operations](#operations)
  - [2. Schema](#schema)

## Introduction

This package makes working with the [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest) simple and reliable, by providing a lightweight, well-tested PHP client generated from the official OpenAPI spec and designed for a seamless developer experience.

There are other solutions that offer a client for the Jira Cloud REST API, but I found them to be incomplete or lacking of a strong testing foundation. This client is generated from the official [OpenAPI Specification of the Jira Cloud REST API](https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json), which means that all operations are supported. Additionally, the code generator is custom built to include tests to ensure that the examples provided by the OpenAPI specification actually work.

### 1. Jira Cloud vs Jira Software Cloud
<a name="jira-cloud-vs-jira-software-cloud"></a>

The [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest) and [Jira Software Cloud REST API](https://developer.atlassian.com/cloud/jira/software/rest) are closely related, but they serve different scopes within the Atlassian ecosystem.

#### i. Jira Cloud REST API

The [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#version) acts as the core API, allowing you to interact with **fundamental Jira features** that are available in **all** Jira Cloud products.

Examples of key features and use cases include:
- Creating, editing, deleting issues
- Managing users, groups, and permissions
- Browsing projects
- Working with custom fields, workflows, and screens
- Querying issues with JQL (Jira Query Language)
- Automating ticket creation or updates
- Building dashboards
- Managing users or project settings

#### ii. Jira Software Cloud REST API

The [Jira Software Cloud REST API](https://developer.atlassian.com/cloud/jira/software/rest) acts as an extension to the core API, allowing you to interact with **Jira Software-specificfeatures** that are only available if Jira Software is installed and enabled.

Examples of key features and use cases include:
- Agile and Scrum tools (boards, sprints, backlogs)
- Working with epics, versions, and estimation
- Managing board configurations
- Sprint reports and velocity charts
- Creating or modifying sprints
- Querying sprint or board data for reporting
- Automatically moving issues across boards

This package does not yet support the Jira Software Cloud REST API, and recommends [lesstif/jira-cloud-restapi](https://github.com/lesstif/php-JiraCloud-RESTAPI) if you need these specific features. Note that `lesstif/jira-cloud-restapi` does not support the Jira Cloud REST API (only the Jira Software Cloud REST API), but you may use both that package and this one without conflicts.

## Installation
<a name="installation"></a>

Install this package using [Composer](https://getcomposer.org/):

```bash
composer require jira/client
```

### 1. Requirements
<a name="requirements"></a>

| Version | PHP       | Guzzle            |
| ------- | --------- | ----------------- |
| 1.x     | 8.3 - 8.4 |               7.x |
| 2.x     | 8.1 - 8.4 | None or 6.x - 7.x |

When [Guzzle](https://github.com/guzzle/guzzle) is not installed, [cURL](https://www.php.net/manual/en/ref.curl.php) is used instead.

## Configuration
<a name="configuration"></a>

The Jira Client must be constructed with a Configuration instance.

### 1. Authentication
<a name="authentication"></a>

#### i. Basic Authentication

```php
use Jira\Client\Client;
use Jira\Client\Configuration;

$client = new Client(new Configuration(
    host: 'https://your-domain.atlassian.net',
    username: 'jira-username',
    password: 'jira-password',
));
```

> [!IMPORTANT]
> Basic Authentication using cookie-based authentication (e.g. your website password) was disabled by Atlassian on June 3rd, 2019, in accordance with their [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-basic-auth-and-cookie-based-auth/). Basic Authentication is still fully supported, but the password must be an [API Token](https://support.atlassian.com/atlassian-account/docs/manage-api-tokens-for-your-atlassian-account/). As of December 13th, 2025, API Tokens are set to expire in one year. You will need to rotate your API Tokens prior to expiration.

> [!TIP]
> Atlassian recommends only using [Basic Auth for REST APIs](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/) for simple scripts, bots, and ad-hoc execution of the REST APIs. The expectation is that you will configure a single "admin/server" user account, and make calls to the API on behalf of this system-configured entity. If you intend to make calls to the API on behalf of an actual user, it is recommended that you use [OAuth 2.0 (3LO) Apps](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps/) instead.

#### ii. OAuth 2.0 (3LO) App Authentication

```php
use Jira\Client\Client;
use Jira\Client\Configuration;

$client = new Client(new Configuration(
    host: 'https://your-domain.atlassian.net',
    username: 'jira-username',
    accessToken: 'jira-token',
));
```

> [!TIP]
> Atlassian recommends using [OAuth 2.0 (3LO) Apps](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps/) for apps created and managed in their [developer console](https://developer.atlassian.com/console/myapps/). The expectation is that you will be making API calls on behalf of an actual user. If you intend to make calls to the API on behalf of a system-configured admin-like entity, it is recommended that you use [Basic Authentication](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/) instead.

### 2. Laravel
<a name="laravel"></a>

If you are using Laravel, you can bind the `Configuration` instance to the container in your `AppServiceProvider`:

```php
use Illuminate\Support\ServiceProvider;
use Jira\Client\Configuration;

namespace App\Providers;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Configuration::class, function () {
            return new Configuration(
                host: config('services.jira.host'),
                username: config('services.jira.username'),
                password: config('services.jira.password'),
            )
        });
    }
}
```

This example requires that you add entries to your `services` configuration file:

```php
return [
    /* ... */

    'jira' => [
        'host' => env('JIRA_HOST', 'https://your-domain.atlassian.net'),
        'username' => env('JIRA_USERNAME', 'jira-username'),
        'password' => env('JIRA_PASSWORD')
    ],
];
```

## Usage
<a name="usage"></a>

This package strictly follows the [OpenAPI Specification of the Jira Cloud REST API](https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json).

The API Specification for [Operations](https://spec.openapis.org/oas/latest.html#operation-object) includes an `operationId`, which determines the name of the methods available on the `Client` instance.

```php
use Jira\Client\Schema;

$response = $client->createProject(new Schema\CreateProjectDetails(
    key: 'EX',
    name: 'Example',
    projectTypeKey: 'business',
    projectTemplateKey: 'com.atlassian.jira-core-project-templates:jira-core-project-management',
    description: 'Example description',
    avatarId: 10130,
    issueSecurityScheme: 1000,
    permissionScheme: 1000,
    notificationScheme: 1000,
    categoryId: 1000,
));

var_dump($response);

// object(ProjectIdentifiers)#1 (3) {
//   ["id"] => int(10042)
//   ["key"] => string(2) "EX"
//   ["self"] => string(43) "http://example.com/rest/api/2/project/10042"
// }
```

By following the OpenAPI specification, this package supports 100% of all operations documented by Atlassian.

### 1. Operations
<a name="operations"></a>

DummyOperationsList

### 2. Schema
<a name="schema"></a>

DummySchemaList
