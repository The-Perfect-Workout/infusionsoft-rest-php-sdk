<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class Email
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $contact_id
 * @property string $headers
 * @property int $id
 * @property string $opened_date
 * @property string $received_date
 * @property string $sent_date
 * @property string $sent_from_address
 * @property string $sent_from_reply_address
 * @property string $sent_to_address
 * @property string $sent_to_bcc_addresses
 * @property string $sent_to_cc_addresses
 * @property string $subject
 */
class Email extends Model
{
    protected static $fields = [
        'contact_id' => FieldTypes::INT,
        'headers' => FieldTypes::STRING,
        'id' => FieldTypes::INT,
        'opened_date' => FieldTypes::STRING,
        'received_date' => FieldTypes::STRING,
        'sent_date' => FieldTypes::STRING,
        'sent_from_address' => FieldTypes::STRING,
        'sent_from_reply_address' => FieldTypes::STRING,
        'sent_to_address' => FieldTypes::STRING,
        'sent_to_bcc_addresses' => FieldTypes::STRING,
        'sent_to_cc_addresses' => FieldTypes::STRING,
        'subject' => FieldTypes::STRING,
    ];
}
