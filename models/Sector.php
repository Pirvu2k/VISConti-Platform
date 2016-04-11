<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sector".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $name
 * @property string $status
 *
 * @property ExpertSector[] $expertSectors
 * @property IndustryAccount[] $industryAccounts
 * @property IndustryAccount[] $industryAccounts0
 * @property IndustryAccount[] $industryAccounts1
 * @property ProjectCanvas[] $projectCanvas
 * @property SubSector[] $subSectors
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash', 'status'], 'string'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSectors()
    {
        return $this->hasMany(ExpertSector::className(), ['Specialization' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts0()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sector 2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts1()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sector 3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCanvas()
    {
        return $this->hasMany(ProjectCanvas::className(), ['Target sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubSectors()
    {
        return $this->hasMany(SubSector::className(), ['sector' => 'id']);
    }
}
