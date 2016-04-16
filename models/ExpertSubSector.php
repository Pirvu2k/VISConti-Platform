<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_sub_sector".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property integer $subsector
 * @property integer $expert
 *
 * @property Expert $expert0
 * @property SubSector $subsector0
 */
class ExpertSubSector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_sub_sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['subsector', 'expert'], 'required'],
            [['subsector', 'expert'], 'integer'],
            [['expert'], 'exist', 'skipOnError' => true, 'targetClass' => Expert::className(), 'targetAttribute' => ['expert' => 'id']],
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
            'subsector' => 'Subsector',
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
    public function getSubsector0()
    {
        return $this->hasOne(SubSector::className(), ['id' => 'subsector']);
    }
}
