<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class PaymentPlanPaymentGateway
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $merchant_account_id
 * @property bool $use_default
 */
class PaymentPlanPaymentGateway extends Model
{
    protected static $fields = [
        'merchant_account_id' => FieldTypes::INT,
        'use_default' => FieldTypes::BOOL,
    ];
}
