<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interest".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $name
 * @property string $status
 * @property integer $specialization
 * @property double $expert_technical_weight
 * @property double $expert_economical_weight
 * @property double $expert_creative_weight
 *
 * @property ExpertInterest[] $expertInterests
 * @property Specialization $specialization0
 */
class Interest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash', 'status'], 'string'],
            [['name', 'specialization', 'expert_technical_weight', 'expert_economical_weight', 'expert_creative_weight'], 'required'],
            [['specialization'], 'integer'],
            [['expert_technical_weight', 'expert_economical_weight', 'expert_creative_weight'], 'number'],
            [['name'], 'string', 'max' => 20],
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
            'name' => 'Name',
            'status' => 'Status',
            'specialization' => 'Specialization',
            'expert_technical_weight' => 'Expert Technical Weight',
            'expert_economical_weight' => 'Expert Economical Weight',
            'expert_creative_weight' => 'Expert Creative Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertInterests()
    {
        return $this->hasMany(ExpertInterest::className(), ['Interest' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization0()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'specialization']);
    }
}
