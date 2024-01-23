<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class FaxNumber
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $field
 * @property string $number
 * @property string $type
 */
class FaxNumber extends Model
{
    protected static $fields = [
        "field" => FieldTypes::STRING,
        "number" => FieldTypes::STRING,
        "type" => FieldTypes::STRING
    ];
}
