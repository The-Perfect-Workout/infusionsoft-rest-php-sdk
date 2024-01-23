<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class OrderItem
 * @package NovakSolutions\Infusionsoft\Model
 * @property float $cost
 * @property string $description
 * @property float $discount
 * @property int $id
 * @property string $name
 * @property string $notes
 * @property float $price
 * @property OrderItemProduct $product
 * @property int $quantity
 * @property string $type
 */
class OrderItem extends Model
{
    protected static $fields = [
        'cost' => FieldTypes::FLOAT,
        'description' => FieldTypes::STRING,
        'discount' => FieldTypes::FLOAT,
        'id' => FieldTypes::INT,
        'name' => FieldTypes::STRING,
        'notes' => FieldTypes::STRING,
        'price' => FieldTypes::FLOAT,
        'product' => OrderItemProduct::class,
        'quantity' => FieldTypes::INT,
        'type' => FieldTypes::STRING,
    ];
}
