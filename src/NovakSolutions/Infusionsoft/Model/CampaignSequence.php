<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;

/**
 * Class CampaignSequence
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property int $active_contact_count
 * @property int $active_contact_count_completed
 * @property array $historical_contact_count
 * @property string $name
 * @property string $time_zone
 * @property CampaignSequencePath[] $paths
 */
class CampaignSequence extends Model
{
    protected static $fields = [
        'id' => FieldTypes::INT,
        'active_contact_count' => FieldTypes::INT,
        'active_contact_count_completed' => FieldTypes::INT,
        'historical_contact_count' => FieldTypes::AN_ARRAY,
        'name' => FieldTypes::STRING,
        'time_zone' => FieldTypes::STRING,
        'paths' => ['array', CampaignSequencePath::class]
    ];
}
