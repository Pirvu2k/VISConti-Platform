<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $degree
 * @property string $institution
 * @property string $from
 * @property string $to
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'degree', 'institution', 'from', 'to'], 'string', 'max' => 50],
            [[ 'degree', 'institution', 'from', 'to'], 'required'],
            ['user_id', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'degree' => 'Degree',
            'institution' => 'Institution',
            'from' => 'From',
            'to' => 'To',
        ];
    }
}
