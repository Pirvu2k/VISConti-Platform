<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_education".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $degree
 * @property string $institution
 * @property string $from
 * @property string $to
 */
class StudentEducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_education';
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
            ['degree_details' , 'string' , 'max' => 1024],
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
            'to' => 'End Year',
        ];
    }
}
