<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_specialization".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property integer $specialization
 * @property integer $expert
 *
 * @property Expert $expert0
 * @property Specialization $specialization0
 */
class ExpertSpecialization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_specialization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['specialization', 'expert'], 'required'],
            [['specialization', 'expert'], 'integer'],
            [['expert'], 'exist', 'skipOnError' => true, 'targetClass' => Expert::className(), 'targetAttribute' => ['expert' => 'id']],
            [['specialization'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['specialization' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_on' => 'Created On',
            'last_modified_on' => 'Last Modified On',
            'trash' => 'Trash',
            'specialization' => 'Specialization',
            'expert' => 'Expert',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpert0()
    {
        return $this->hasOne(Expert::className(), ['id' => 'expert']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization0()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'specialization']);
    }
}
