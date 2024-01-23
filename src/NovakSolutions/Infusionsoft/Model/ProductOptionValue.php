<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class ProductOptionValue
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property int $index
 * @property bool $is_default
 * @property string $label
 * @property float $price_adjustment
 * @property string $sku
 */
class ProductOptionValue extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'index' => FieldTypes::INT,
        'is_default' => FieldTypes::BOOL,
        'label' => FieldTypes::STRING,
        'price_adjustment' => FieldTypes::FLOAT,
        'sku' => FieldTypes::STRING,
    ];
}
