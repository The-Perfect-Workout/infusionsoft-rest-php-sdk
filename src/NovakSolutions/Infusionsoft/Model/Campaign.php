<?php

namespace NovakSolutions\Infusionsoft\Model;
use NovakSolutions\Infusionsoft\Enum\FieldTypes;
use NovakSolutions\Infusionsoft\Service\CampaignService;

/**
 * Class Campaign
 * @package NovakSolutions\Infusionsoft\Model
 * @property int $id
 * @property int $active_contact_count
 * @property int $completed_contact_count
 * @property int $created_by_global_id
 * @property string $date_created
 * @property string $error_message
 * @property bool $locked
 * @property string $name
 * @property string $published_date
 * @property bool $published_status
 * @property string $published_time_zone
 * @property int $count
 * @property string $next
 * @property string $previous
 * @property CampaignGoal[] $goals
 * @property CampaignSequence[] $sequences
 */
class Campaign extends Model
{
    protected static $serviceClassName = CampaignService::class;

    protected static $fields = [
        'id' => FieldTypes::INT,
        'active_contact_count' => FieldTypes::INT,
        'completed_contact_count' => FieldTypes::INT,
        'created_by_global_id' => FieldTypes::INT,
        'date_created' => FieldTypes::DATETIME,
        'error_message' => FieldTypes::STRING,
        'locked' => FieldTypes::BOOL,
        'name' => FieldTypes::STRING,
        'published_date' => FieldTypes::DATETIME,
        'published_status' => FieldTypes::BOOL,
        'published_time_zone' => FieldTypes::STRING,
        'count' => FieldTypes::INT,
        'next' => FieldTypes::STRING,
        'previous' => FieldTypes::STRING,
        'goals' => ['array', CampaignGoal::class],
        'sequences' => ['array', CampaignSequence::class],
    ];
}
