<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class CampaignSequencePathItem
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property string $name
 * @property int $next_item_id
 * @property int $previous_item_id
 * @property string $type
 */
class CampaignSequencePathItem extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'name' => FieldTypes::STRING,
        'next_item_id' => FieldTypes::INT,
        'previous_item_id' => FieldTypes::INT,
        'type' => FieldTypes::STRING,
    ];
}
