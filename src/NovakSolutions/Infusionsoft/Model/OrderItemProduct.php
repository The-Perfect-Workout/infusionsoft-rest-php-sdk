<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class OrderItemProduct
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property string $product_desc
 * @property string $product_name
 * @property array $product_options
 * @property float $product_price
 * @property string $product_short_desc
 * @property string $sku
 * @property int $status
 * @property int $sub_category_id
 * @property bool $subscription_only
 * @property array $subscription_plans
 * @property string $url
 */
class OrderItemProduct extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'product_desc' => FieldTypes::STRING,
        'product_name' => FieldTypes::STRING,
        'product_options' => ['array', ProductOption::class],
        'product_price' => FieldTypes::FLOAT,
        'product_short_desc' => FieldTypes::STRING,
        'sku' => FieldTypes::STRING,
        'status' => FieldTypes::INT,
        'sub_category_id' => FieldTypes::INT,
        'subscription_only' => FieldTypes::BOOL,
        'subscription_plans' => ['array', SubscriptionPlan::class],
        'url' => FieldTypes::STRING,
    ];
}
