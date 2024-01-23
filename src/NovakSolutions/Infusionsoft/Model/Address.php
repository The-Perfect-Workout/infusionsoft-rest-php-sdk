<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class Address
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $country_code
 * @property string $line1
 * @property string $line2
 * @property string $locality
 * @property string $region
 * @property string $zip_code
 * @property string $zip_four
 */
class Address extends Model
{
    protected static $fields = [
        "country_code" => FieldTypes::STRING,
          "line1" =>  FieldTypes::STRING,
          "line2" =>  FieldTypes::STRING,
          "locality" =>  FieldTypes::STRING,
          "region" =>  FieldTypes::STRING,
          "zip_code" =>  FieldTypes::STRING,
          "zip_four" =>  FieldTypes::STRING
    ];
}
