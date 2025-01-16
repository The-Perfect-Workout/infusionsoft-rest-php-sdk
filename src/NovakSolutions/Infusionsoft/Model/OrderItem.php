<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;
use NovakSolutions\Infusionsoft\Service\OrderItemService;

/**
 * Class OrderItem
 * @package NovakSolutions\Infusionsoft\Model
 * @property float $cost
 * @property string $description
 * @property float $discount
 * @property int $id
 * @property int $jobRecurringId
 * @property string $name
 * @property string $notes
 * @property float $price
 * @property OrderItemProduct $product
 * @property int $quantity
 * @property float $specialAmount
 * @property int $specialId
 * @property int $specialPctOrAmt
 * @property SubscriptionPlan $subscriptionPlan
 * @property string $type
 */
class OrderItem extends Model
{
    protected static $serviceClassName = OrderItemService::class;

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
        'specialAmount' => FieldTypes::FLOAT,
        'specialId' => FieldTypes::INT,
        'specialPctOrAmt' => FieldTypes::INT,
        'subscriptionPlan' => SubscriptionPlan::class,
        'type' => FieldTypes::STRING,
    ];
}
