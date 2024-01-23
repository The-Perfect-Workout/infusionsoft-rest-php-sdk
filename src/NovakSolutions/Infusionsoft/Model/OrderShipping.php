<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class OrderShipping
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $company
 * @property string $country_code
 * @property string $first_name
 * @property string $last_name
 * @property string $line1
 * @property string $line2
 * @property string $locality
 * @property string $middle_name
 * @property string $phone
 * @property string $region
 * @property string $zip_code
 * @property string $zip_four
 */
class OrderShipping extends Model
{
    protected static $fields = [
        'company' => FieldTypes::STRING,
        'country_code' => FieldTypes::STRING,
        'first_name' => FieldTypes::STRING,
        'last_name' => FieldTypes::STRING,
        'line1' => FieldTypes::STRING,
        'line2' => FieldTypes::STRING,
        'locality' => FieldTypes::STRING,
        'middle_name' => FieldTypes::STRING,
        'phone' => FieldTypes::STRING,
        'region' => FieldTypes::STRING,
        'zip_code' => FieldTypes::STRING,
        'zip_four' => FieldTypes::STRING,
    ];
}
