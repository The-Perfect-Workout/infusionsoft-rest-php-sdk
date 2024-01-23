<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class OrderContact
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $company_name
 * @property string $email
 * @property string $first_name
 * @property int $id
 * @property string $job_title
 * @property string $last_name
 */
class OrderContact extends Model
{
    protected static $fields = [
        'company_name' => FieldTypes::STRING,
        'email' => FieldTypes::STRING,
        'first_name' => FieldTypes::STRING,
        'id' => FieldTypes::INT,
        'job_title' => FieldTypes::STRING,
        'last_name' => FieldTypes::STRING,
    ];
}
