<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class ContactCompany
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $company_name
 * @property int $id
 */
class ContactCompany extends Model
{
    protected static $fields = [
        "company_name" => FieldTypes::STRING,
        "id" =>  FieldTypes::INT,
    ];
}
