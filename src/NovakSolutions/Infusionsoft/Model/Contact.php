<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;
use NovakSolutions\Infusionsoft\Model\Traits\SavableTrait;
use NovakSolutions\Infusionsoft\Service\ContactService;

/**
 * Class Contact
 * @package NovakSolutions\Infusionsoft\Model
 * @property Address[] $addresses
 * @property string $anniversary
 * @property string $birthday
 * @property ContactCompany $company
 * @property string $contact_type
 * @property CustomField[] $custom_fields
 * @property string $date_created
 * @property EmailAddress[] $email_addresses
 * @property string $family_name
 * @property string $given_name
 * @property FaxNumber[] $fax_numbers
 * @property int $id
 * @property PhoneNumber[] $phone_numbers
 * @property SocialAccount[] $social_accounts
 */
class Contact extends Model
{
    use SavableTrait;

    protected static $serviceClassName = ContactService::class;

    protected static $fields = [
        'addresses' => ['array', Address::class],
        "anniversary" => FieldTypes::DATETIME,
        "birthday" => FieldTypes::DATETIME,
        'company' => ContactCompany::class,
        "contact_type" => FieldTypes::STRING,
        'custom_fields' => ['array', CustomField::class],
        "date_created" => FieldTypes::DATETIME,
        'email_addresses' => ['array', EmailAddress::class],
        'family_name' => FieldTypes::STRING,
        'given_name' => FieldTypes::STRING,
        'fax_numbers' => ['array', FaxNumber::class],
        'id' => FieldTypes::INT,
        'phone_numbers' => ['array', PhoneNumber::class],
        'social_accounts' => ['array', SocialAccount::class],
    ];
}
