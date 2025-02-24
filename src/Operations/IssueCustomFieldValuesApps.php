<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait IssueCustomFieldValuesApps
{
    /**
     * Updates the value of one or more custom fields on one or more issues.
     * Combinations of custom field and issue should be unique within the request
     * 
     * Apps can only perform this operation on "custom fields" and "custom field types" declared in their own manifests
     * 
     * **"Permissions" required:** Only the app that owns the custom field or custom field type can update its values with this operation
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
     * 
     * @param bool $generateChangelog Whether to generate a changelog for this update.
     */
    public function updateMultipleCustomFieldValues(
        Schema\MultipleCustomFieldValuesUpdateDetails $request,
        ?bool $generateChangelog = true,
    ): true {
        return $this->call(
            uri: '/rest/api/3/app/field/value',
            method: 'post',
            body: $request,
            query: compact('generateChangelog'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Updates the value of a custom field on one or more issues
     * 
     * Apps can only perform this operation on "custom fields" and "custom field types" declared in their own manifests
     * 
     * **"Permissions" required:** Only the app that owns the custom field or custom field type can update its values with this operation
     * 
     * The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
     * However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
     * 
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field/
     * @link https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
     * 
     * @param string $fieldIdOrKey The ID or key of the custom field.
     *                             For example, `customfield_10010`.
     * @param bool $generateChangelog Whether to generate a changelog for this update.
     */
    public function updateCustomFieldValue(
        Schema\CustomFieldValueUpdateDetails $request,
        string $fieldIdOrKey,
        ?bool $generateChangelog = true,
    ): true {
        return $this->call(
            uri: '/rest/api/3/app/field/{fieldIdOrKey}/value',
            method: 'put',
            body: $request,
            query: compact('generateChangelog'),
            path: compact('fieldIdOrKey'),
            success: 204,
            schema: true,
        );
    }
}
