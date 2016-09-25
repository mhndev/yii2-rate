<?php

namespace mhndev\yii2Rate\Models;

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

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'rates';
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if(!empty($this->parent_id)) {

            $parent = $this->getParent();

            if (!empty($parent->path)){
                $this->path = $parent->path . '' . $parent->id;
            }
            else{
                $this->path = $parent->id;
            }
        }

        if (parent::beforeSave($insert)) {
            if($insert)
                $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
            return true;
        } else {
            return false;
        }


    }

}
