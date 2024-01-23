<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;
use NovakSolutions\Infusionsoft\Model\Traits\DeletableTrait;
use NovakSolutions\Infusionsoft\Model\Traits\SavableTrait;
use NovakSolutions\Infusionsoft\Service\HookService;

/**
 * Class Hook
 * @package NovakSolutions\Infusionsoft\Model
 * @property string $eventKey
 * @property string $hookUrl
 * @property string $key
 * @property string $status
 */
class Hook extends Model
{
    use SavableTrait;
    use DeletableTrait;

    public static $primaryKeyFieldName = 'key';
    protected static $serviceClassName = HookService::class;

    protected static $fields = [
        "eventKey" => FieldTypes::STRING,
        "hookUrl" => FieldTypes::STRING,
        "key" => FieldTypes::STRING,
        "status" => FieldTypes::STRING
    ];

    public static $readOnlyFields = [
        'key', 'status'
    ];
}
