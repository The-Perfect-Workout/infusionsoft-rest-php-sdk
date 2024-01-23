<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class SubscriptionPlan
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property bool $active
 * @property int $cycle
 * @property int $frequency
 * @property int $number_of_cycles
 * @property float $plan_price
 * @property int $subscription_plan_index
 * @property string $subscription_plan_name
 * @property string $url
 */
class SubscriptionPlan extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'active' => FieldTypes::BOOL,
        'cycle' => FieldTypes::INT,
        'frequency' => FieldTypes::INT,
        'number_of_cycles' => FieldTypes::INT,
        'plan_price' => FieldTypes::FLOAT,
        'subscription_plan_index' => FieldTypes::INT,
        'subscription_plan_name' => FieldTypes::STRING,
        'url' => FieldTypes::STRING,
    ];
}
