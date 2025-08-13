<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class Transaction
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property float $amount
 * @property string $collection_method
 * @property int $contact_id
 * @property string $currency
 * @property string $errors
 * @property string $gateway
 * @property string $gateway_account_name
 * @property string $order_ids
 * @property string $paymentDate
 * @property string $status
 * @property boolean $test
 * @property string $transaction_date
 * @property string $type
 */
class Transaction extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'amount' => FieldTypes::FLOAT,
        'collection_method' => FieldTypes::STRING,
        'contact_id' => FieldTypes::INT,
        'currency' => FieldTypes::STRING,
        'errors' => FieldTypes::STRING,
        'gateway' => FieldTypes::STRING,
        'gateway_account_name' => FieldTypes::STRING,
        'order_ids' => FieldTypes::STRING,
        'paymentDate' => FieldTypes::STRING,
        'status' => FieldTypes::STRING,
        'test' => FieldTypes::BOOL,
        'transaction_date' => FieldTypes::STRING,
        'type' => FieldTypes::STRING,
    ];
}
