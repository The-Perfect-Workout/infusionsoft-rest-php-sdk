<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class CustomField
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $content
 * @property int $id
 */
class CustomField extends Model
{
    protected static $fields = [
        "content" => FieldTypes::STRING,
        "id" =>  FieldTypes::INT,
    ];
}
