<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class SocialAccount
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $name
 * @property string $type
 */
class SocialAccount extends Model
{
    protected static $fields = [
        "name" => FieldTypes::STRING,
        "type" =>  FieldTypes::STRING,
    ];
}
