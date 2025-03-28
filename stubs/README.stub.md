# Jira Client

[![Tests](https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/tests.yml)
[![Lint](https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/coding-standards.yml)
[![Code Coverage](https://coveralls.io/repos/github/tylernathanreed/jira-client-php/badge.svg?branch=master)](https://coveralls.io/github/tylernathanreed/jira-client-php?branch=master)
[![Static Analysis](https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/tylernathanreed/jira-client-php/actions/workflows/static-analysis.yml)

This package provides an HTTP Client to interact with the [Jira Cloud REST API](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#version).

## Table of Contents

- [Introduction](#introduction)
- [Configuration](#configuration)
  - [1. Authentication](#authentication)
  - [2. Laravel](#laravel)
- [Usage](#usage)
  - [1. Operations](#operations)
  - [2. Schema](#schema)

## Installation
<a name="installation"></a>

Install this package using [Composer](https://getcomposer.org/):

```bash
composer require jira/client
```

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

Note that [Basic Auth for REST APIs](https://developer.atlassian.com/cloud/jira/platform/basic-auth-for-rest-apis/) is not as secure as other methods. Atlassian recommends only using Basic Auth for simple scripts and manual calls to the REST APIs.

#### ii. OAuth/Token Authentication

```php
use Jira\Client\Client;
use Jira\Client\Configuration;

$client = new Client(new Configuration(
    host: 'https://your-domain.atlassian.net',
    username: 'jira-username',
    accessToken: 'jira-token',
));
```

Note that Atlassian has a security policy for [API Tokens](https://support.atlassian.com/atlassian-account/docs/manage-api-tokens-for-your-atlassian-account/) that cause them to expire within one year. You'll need a process to rotate API Tokens if you authenticate in this manner.

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

{{ OperationList }}

### 2. Schema
<a name="schema"></a>

{{ SchemaList }}
