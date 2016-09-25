<?php

namespace mhndev\yii2Rate\Entities;

use mhndev\rate\Interfaces\iRate;
use mhndev\rate\Traits\RateTrait;
use yii\db\ActiveRecord;

/**
 * Class Rate
 * @package mhndev\yii2Rate\Entities
 */
class Rate extends ActiveRecord implements iRate
{
    use RateTrait;

}
