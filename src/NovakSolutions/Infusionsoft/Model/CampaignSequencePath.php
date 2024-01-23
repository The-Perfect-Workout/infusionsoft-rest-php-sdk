<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class CampaignSequencePath
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property CampaignSequencePathItem[] $items
 */
class CampaignSequencePath extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'items' => ['array', CampaignSequencePathItem::class]
    ];
}
