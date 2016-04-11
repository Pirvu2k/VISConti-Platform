<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_experience".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $job_title
 * @property string $institution
 * @property string $from
 * @property string $to
 * @property string $job_description
 */
class ExpertExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_title', 'institution', 'from', 'to'], 'string', 'max' => 50],
            [['job_title', 'institution', 'from', 'to'], 'required'],
            ['user_id' , 'safe'],
            ['job_description' , 'string' , 'max' => 1024],
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
            'job_title' => 'Job Title',
            'institution' => 'Institution',
            'from' => 'Start Year',
            'to' => 'End Year',
            'job_description' => 'Job Description',
        ];
    }
}
