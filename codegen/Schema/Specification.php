<?php

namespace Jira\CodeGen\Schema;

use Jira\CodeGen\Exceptions\MissingSpecificationException;
use RuntimeException;

/**
 * @phpstan-type TArray array<string,mixed>
 * @phpstan-type TOpenApi array{
 *     openapi: string,
 *     info: TInfo,
 *     jsonSchemaDialect?: string,
 *     servers?: list<TArray>,
 *     paths?: array<string,TPath>,
 *     webhooks?: TArray,
 *     components?: TArray,
 *     security?: list<TArray>,
 *     tags?: list<TArray>,
 *     externalDocs?: TArray,
 * }
 * @phpstan-type TInfo array{
 *     title: string,
 *     summary?: string,
 *     description?: string,
 *     termsOfService?: string,
 *     contact?: TArray,
 *     license?: TArray,
 *     version: string,
 * }
 * @phpstan-type TComponents array{
 *     schemas?: array<string,TSchema>,
 *     responses?: array<string,TArray>,
 *     parameters?: array<string,TArray>,
 *     examples?: array<string,TArray>,
 *     requestBodies?: array<string,TArray>,
 *     headers?: array<string,TArray>,
 *     securitySchemas?: array<string,TArray>,
 *     links?: array<string,TArray>,
 *     callbacks?: array<string,TArray>,
 *     pathItems?: array<string,TArray>,
 * }
 * @phpstan-type TSchema array{
 *     description?: string,
 *     discriminator?: TArray,
 *     oneOf?: list<array{'$ref':string}>,
 *     anyOf?: list<array{'$ref':string}>,
 *     xml?: TArray,
 *     externalDocs?: TArray,
 *     properties?: array<string,TValue>,
 *     required?: list<string>,
 *     type?: string,
 *     nullable?: bool,
 *     '$ref'?: string,
 * }
 * @phpstan-type TValue array{
 *     additionalProperties?: TAdditionalProperties|bool,
 *     description?: string,
 *     enum?: list<string>,
 *     items?: array{
 *         type?: string,
 *         '$ref'?: string,
 *         enum?: list<string>,
 *     },
 *     allOf?: list<array{'$ref':string}>,
 *     format?: string,
 *     type?: string,
 *     readOnly?: bool,
 *     writeOnly?: bool,
 *     uniqueItems?: bool,
 *     minItems?: int,
 *     maxItems?: int,
 *     minimum?: int,
 *     maximum?: int,
 *     maxLength?: int,
 *     default?: int|string|bool|null,
 *     nullable?: bool,
 *     example?: int|string|bool|null,
 *     '$ref'?: string,
 * }
 * @phpstan-type TAdditionalProperties array{
 *     description?: string,
 *     format?: string,
 *     type?: string,
 *     readOnly?: bool,
 *     writeOnly?: bool,
 *     '$ref'?: string,
 *     items?: array{type?:string,'$ref'?:string},
 *     uniqueItems?: bool,
 * }
 * @phpstan-type TDiscriminator array{
 *     propertyName: string,
 *     mapping?: array<string,string>
 * }
 * @phpstan-type TPath array{
 *     '$ref'?: string,
 *     summary?: string,
 *     description?: string,
 *     get?: TOperation,
 *     put?: TOperation,
 *     post?: TOperation,
 *     delete?: TOperation,
 *     options?: TOperation,
 *     head?: TOperation,
 *     patch?: TOperation,
 *     trace?: TOperation,
 *     servers?: list<TArray>,
 *     parameters?: list<TArray>,
 * }
 * @phpstan-type TOperation array{
 *     tags?: list<string>,
 *     summary?: string,
 *     description?: string,
 *     externalDocs?: TArray,
 *     operationId?: string,
 *     parameters?: list<TParameter>,
 *     requestBody?: TRequestBody,
 *     responses?: array<int,TResponse>,
 *     callbacks?: TArray,
 *     deprecated?: bool,
 *     security?: list<TArray>,
 *     servers?: list<TArray>,
 * }
 * @phpstan-type TParameter array{
 *     name: string,
 *     in: 'query'|'header'|'path'|'cookie',
 *     description?: string,
 *     required?: bool,
 *     deprecated?: bool,
 *     allowEmptyValue?: bool,
 *     schema?: TValue
 * }
 * @phpstan-type TRequestBody array{
 *     description?: string,
 *     content: array<string,TMediaType>,
 *     required?: bool,
 * }
 * @phpstan-type TResponse array{
 *     description: string,
 *     headers?: array<string,TArray>,
 *     content?: array<string,TMediaType>,
 *     links?: array<string,TArray>
 * }
 * @phpstan-type TMediaType array{
 *     schema?: TValue,
 *     example?: string|TArray,
 *     examples?: array<string,TArray>,
 *     encoding?: array<string,TArray>,
 * }
 * @phpstan-type TCompiledOperation array{
 *     id: string,
 *     group: string,
 *     uri: string,
 *     method: string,
 *     operation: TOperation,
 * }
 * @phpstan-type TCompiledOperations array<string,array<string,TCompiledOperation>>
 */
final class Specification
{
    use Concerns\ResolvesSafeNames;

    /** @var ?TOpenApi */
    protected static ?array $specification = null;

    /** @var ?TCompiledOperations */
    protected static ?array $operations = null;

    /** @return TOpenApi */
    public static function getSpecification(): array
    {
        return static::$specification ??= static::resolveSpecification();
    }

    /** @return TOpenApi */
    protected static function resolveSpecification(): array
    {
        $filepath = 'https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json';

        $contents = file_get_contents($filepath);

        if ($contents === false) {
            throw new RuntimeException('Failed to open specification.');
        }

        // @phpstan-ignore return.type (Not going to validate)
        return json_decode($contents, true);
    }

    public static function getComponentSchema(string $name): Schema
    {
        $spec = Specification::getSpecification();

        /** @var array<string,TSchema> */
        $schemas = $spec['components']['schemas'] ?? [];

        if (! isset($schemas[$name])) {
            throw new MissingSpecificationException('Schema', $name);
        }

        return Schema::make(ucfirst($name), $schemas[$name]);
    }

    public static function getOperationGroup(string $name): OperationGroup
    {
        $operations = static::getOperationGroups();

        if (is_null($group = ($operations[$name] ?? null))) {
            throw new MissingSpecificationException('Operation Group', $name);
        }

        return OperationGroup::make($name, $group);
    }

    /** @return array<string,TSchema> */
    public static function getComponentSchemas(): array
    {
        $spec = Specification::getSpecification();

        /** @var array<string,TSchema> */
        return $spec['components']['schemas'] ?? [];
    }

    /** @return TCompiledOperations */
    public static function getOperationGroups(): array
    {
        // @phpstan-ignore return.type,assign.propertyType (lost context)
        return static::$operations ??= static::resolveOperationGroups();
    }

    /** @return TCompiledOperations */
    protected static function resolveOperationGroups(): array
    {
        $specification = static::getSpecification();

        $operations = [];

        foreach (($specification['paths'] ?? []) as $uri => $path) {
            foreach (['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'] as $method) {
                if (! isset($path[$method])) {
                    continue;
                }

                /** @var TOperation $operation */
                $operation = $path[$method];

                if (is_null($id = ($operation['operationId'] ?? null))) {
                    continue;
                }

                $group = ucfirst(static::resolveSafeName($operation['tags'][0] ?? 'Other'));

                $operations[$group] ??= [];

                $operations[$group][$id] = compact('id', 'group', 'uri', 'method', 'operation');
            }
        }

        return $operations;
    }
}
