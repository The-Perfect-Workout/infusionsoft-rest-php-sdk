<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * A payment applied to an order's invoice, as returned by the v2 Orders payment endpoints.
 *
 * Class OrderPayment
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $id The invoice order payment id, which is what the payment endpoints address.
 * @property float $amount
 * @property string $note
 * @property string $invoice_id
 * @property string $payment_id The id of the payment record behind this invoice order payment.
 * @property string $pay_time
 * @property string $pay_status One of MANUAL_PAID, REFUNDED, VOIDED, PAYPAL_PAID, APPROVED, FAILED, ERROR, PENDING
 * @property string $last_updated_time
 * @property bool $skip_commission
 * @property string $refund_invoice_payment_id
 */
class OrderPayment extends Model
{
    protected static $fields = [
        'id' => FieldTypes::STRING,
        'amount' => FieldTypes::FLOAT,
        'note' => FieldTypes::STRING,
        'invoice_id' => FieldTypes::STRING,
        'payment_id' => FieldTypes::STRING,
        'pay_time' => FieldTypes::STRING,
        'pay_status' => FieldTypes::STRING,
        'last_updated_time' => FieldTypes::STRING,
        'skip_commission' => FieldTypes::BOOL,
        'refund_invoice_payment_id' => FieldTypes::STRING,
    ];
}
