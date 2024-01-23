<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class ProductOption
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property bool $allow_spaces
 * @property bool $can_contain_character
 * @property bool $can_contain_number
 * @property bool $can_end_with_character
 * @property bool $can_end_with_number
 * @property bool $can_start_with_character
 * @property bool $can_start_with_number
 * @property int $display_index
 * @property string $label
 * @property int $max_chars
 * @property int $min_chars
 * @property string $name
 * @property bool $required
 * @property string $text_message
 * @property string $type
 * @property array $values
 */
class ProductOption extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'allow_spaces' => FieldTypes::BOOL,
        'can_contain_character' => FieldTypes::BOOL,
        'can_contain_number' => FieldTypes::BOOL,
        'can_end_with_character' => FieldTypes::BOOL,
        'can_end_with_number' => FieldTypes::BOOL,
        'can_start_with_character' => FieldTypes::BOOL,
        'can_start_with_number' => FieldTypes::BOOL,
        'display_index' => FieldTypes::INT,
        'label' => FieldTypes::STRING,
        'max_chars' => FieldTypes::INT,
        'min_chars' => FieldTypes::INT,
        'name' => FieldTypes::STRING,
        'required' => FieldTypes::BOOL,
        'text_message' => FieldTypes::STRING,
        'type' => FieldTypes::STRING,
        'values' => ['array', ProductOptionValue::class],
    ];
}
