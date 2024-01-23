<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class PaymentPlan
 * @package NovakSolutions\Infusionsoft\Model
 * @property bool $auto_charge
 * @property int $credit_card_id
 * @property int $days_between_payments
 * @property float $initial_payment_amount
 * @property string $initial_payment_date
 * @property int $number_of_payments
 * @property PaymentPlanPaymentGateway $payment_gateway
 * @property string $plan_start_date
 */
class PaymentPlan extends Model
{
    protected static $fields = [
        'auto_charge' => FieldTypes::BOOL,
        'credit_card_id' => FieldTypes::INT,
        'days_between_payments' => FieldTypes::INT,
        'initial_payment_amount' => FieldTypes::FLOAT,
        'initial_payment_date' => FieldTypes::DATE,
        'number_of_payments' => FieldTypes::INT,
        'payment_gateway' => PaymentPlanPaymentGateway::class,
        'plan_start_date' => FieldTypes::DATE,
    ];
}
