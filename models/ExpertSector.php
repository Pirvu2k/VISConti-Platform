<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_sector".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property integer $sector_id
 * @property integer $expert
 *
 * @property Expert $expert0
 * @property Sector $sector
 */
class ExpertSector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['sector_id', 'expert'], 'required'],
            [['sector_id', 'expert'], 'integer'],
            [['expert'], 'exist', 'skipOnError' => true, 'targetClass' => Expert::className(), 'targetAttribute' => ['expert' => 'id']],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector_id' => 'id']],
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
            'sector_id' => 'Sector ID',
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
    public function getSector()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector_id']);
    }
}
