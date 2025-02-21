<?php

namespace Jira\Client\Schema;

use Jira\Client\PolymorphicDto;

// CustomFieldContextDefaultValueDoc
final readonly class CustomFieldContextDefaultValue extends PolymorphicDto
{
    public static function discriminator(): string
    {
        return 'type';
    }

    /** @return array<string,class-string<Dto>> */
    public static function discriminatorMap(): array
    {
        return [
            'datepicker' => CustomFieldContextDefaultValueDate::class,
            'datetimepicker' => CustomFieldContextDefaultValueDateTime::class,
            'float' => CustomFieldContextDefaultValueFloat::class,
            'forge.datetime' => CustomFieldContextDefaultValueForgeDateTimeField::class,
            'forge.group' => CustomFieldContextDefaultValueForgeGroupField::class,
            'forge.group.list' => CustomFieldContextDefaultValueForgeMultiGroupField::class,
            'forge.number' => CustomFieldContextDefaultValueForgeNumberField::class,
            'forge.object' => CustomFieldContextDefaultValueForgeObjectField::class,
            'forge.string' => CustomFieldContextDefaultValueForgeStringField::class,
            'forge.string.list' => CustomFieldContextDefaultValueForgeMultiStringField::class,
            'forge.user' => CustomFieldContextDefaultValueForgeUserField::class,
            'forge.user.list' => CustomFieldContextDefaultValueForgeMultiUserField::class,
            'grouppicker.multiple' => CustomFieldContextDefaultValueMultipleGroupPicker::class,
            'grouppicker.single' => CustomFieldContextDefaultValueSingleGroupPicker::class,
            'labels' => CustomFieldContextDefaultValueLabels::class,
            'multi.user.select' => CustomFieldContextDefaultValueMultiUserPicker::class,
            'option.cascading' => CustomFieldContextDefaultValueCascadingOption::class,
            'option.multiple' => CustomFieldContextDefaultValueMultipleOption::class,
            'option.single' => CustomFieldContextDefaultValueSingleOption::class,
            'project' => CustomFieldContextDefaultValueProject::class,
            'readonly' => CustomFieldContextDefaultValueReadOnly::class,
            'single.user.select' => CustomFieldContextSingleUserPickerDefaults::class,
            'textarea' => CustomFieldContextDefaultValueTextArea::class,
            'textfield' => CustomFieldContextDefaultValueTextField::class,
            'url' => CustomFieldContextDefaultValueURL::class,
            'version.multiple' => CustomFieldContextDefaultValueMultipleVersionPicker::class,
            'version.single' => CustomFieldContextDefaultValueSingleVersionPicker::class,
        ];
    }
}
