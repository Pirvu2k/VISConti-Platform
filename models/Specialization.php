<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialization".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $name
 * @property string $status
 * @property integer $subsector
 * @property double $Expert technical weight
 * @property double $Expert economical weight
 * @property double $Expert creative weight
 *
 * @property ExpertSpecialization[] $expertSpecializations
 * @property SubSector $subsector0
 */
class Specialization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash', 'status'], 'string'],
            [['name', 'subsector', 'Expert technical weight', 'Expert economical weight', 'Expert creative weight'], 'required'],
            [['subsector'], 'integer'],
            [['Expert technical weight', 'Expert economical weight', 'Expert creative weight'], 'number'],
            [['name'], 'string', 'max' => 20],
            [['subsector'], 'exist', 'skipOnError' => true, 'targetClass' => SubSector::className(), 'targetAttribute' => ['subsector' => 'id']],
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
            'subsector' => 'Subsector',
            'Expert technical weight' => 'Expert Technical Weight',
            'Expert economical weight' => 'Expert Economical Weight',
            'Expert creative weight' => 'Expert Creative Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSpecializations()
    {
        return $this->hasMany(ExpertSpecialization::className(), ['name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubsector0()
    {
        return $this->hasOne(SubSector::className(), ['id' => 'subsector']);
    }
}
