<?php

namespace App\Schema;

/**
 * @phpstan-type TOperationArray array{id:string,group:string,uri:string,method:string,operation:TOperationObject}
 * @phpstan-type TOperationObject object{
 *     deprecated?:bool,
 *     description?:string,
 *     operationId:string,
 *     parameters:list<TParameterObject>,
 *     responses:object,
 *     security?:list<object>,
 *     summary?:string,
 *     tags:list<string>,
 * }
 * @phpstan-type TParameterObject object{
 * }
 */
class Specification
{
    use Concerns\ResolvesSafeNames;

    protected static ?object $specification = null;

    /** @return array<string,object> */
    protected static ?array $operations = null;

    public static function getSpecification(): object
    {
        return static::$specification ??= static::resolveSpecification();
    }

    protected static function resolveSpecification(): object
    {
        $filepath = 'https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json';

        return json_decode(file_get_contents($filepath));
    }

    /** @return array<string,array<string,TOperation>> */
    public static function getOperationGroups(): array
    {
        return static::$operations ??= static::resolveOperationGroups();
    }

    /** @return array<string,array<string,TOperation>> */
    protected static function resolveOperationGroups(): array
    {
        $specification = static::getSpecification();

        $operations = [];

        foreach ((array) $specification->paths as $uri => $path) {
            foreach (['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'] as $method) {
                if (! isset($path->{$method})) {
                    continue;
                }

                $operation = $path->{$method};

                if (is_null($id = ($operation->operationId ?? null))) {
                    continue;
                }

                $group = ucfirst(static::resolveSafeName($operation->tags[0] ?? 'Other'));

                $operations[$group] ??= [];

                $operations[$group][$id] = compact('id', 'group', 'uri', 'method', 'operation');
            }
        }

        return $operations;
    }
}
