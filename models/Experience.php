<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $job_title
 * @property string $institution
 * @property string $from
 * @property string $to
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_title', 'institution', 'from', 'to'], 'string', 'max' => 50],
            [['job_title', 'institution', 'from', 'to'], 'required'],
            ['user_id','safe'],
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
            'from' => 'From',
            'to' => 'To',
        ];
    }
}
