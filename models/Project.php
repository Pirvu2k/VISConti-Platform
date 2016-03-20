<?php

namespace app\models;

use yii\db\ActiveRecord;

class Project extends ActiveRecord {
	public static function tableName()
    {
        return 'canvases';

    }
}