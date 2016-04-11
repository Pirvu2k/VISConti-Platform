<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_education".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $degree
 * @property string $institution
 * @property string $from
 * @property string $degree_details
 * @property string $to
 */
class ExpertEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['degree', 'institution', 'from', 'to'], 'string', 'max' => 50],
            ['user_id','safe'],
            [['degree', 'institution', 'from', 'to'] , 'required'],
            ['degree_details' , 'string' , 'max' => 300],
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
            'from' => 'Start Year',
            'degree_details' => 'Degree Details',
            'to' => 'End Year',
        ];
    }
}
