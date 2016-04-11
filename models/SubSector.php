<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_sector".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $name
 * @property string $status
 * @property integer $sector
 *
 * @property ExpertSubSector[] $expertSubSectors
 * @property IndustryAccount[] $industryAccounts
 * @property IndustryAccount[] $industryAccounts0
 * @property IndustryAccount[] $industryAccounts1
 * @property Interest[] $interests
 * @property ProjectCanvas[] $projectCanvas
 * @property Specialization[] $specializations
 * @property Sector $sector0
 */
class SubSector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_sector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash', 'status'], 'string'],
            [['name', 'sector'], 'required'],
            [['sector'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['sector'], 'exist', 'skipOnError' => true, 'targetClass' => Sector::className(), 'targetAttribute' => ['sector' => 'id']],
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
            'sector' => 'Sector',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSubSectors()
    {
        return $this->hasMany(ExpertSubSector::className(), ['Sub-sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sub-sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts0()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sub-sector 2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryAccounts1()
    {
        return $this->hasMany(IndustryAccount::className(), ['Sub-sector 3' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['Sub-sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCanvas()
    {
        return $this->hasMany(ProjectCanvas::className(), ['Target sub-sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecializations()
    {
        return $this->hasMany(Specialization::className(), ['Sub-sector' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector0()
    {
        return $this->hasOne(Sector::className(), ['id' => 'sector']);
    }

    public static function getSub($sector_id) {
        $data=\app\models\SubSector::find()
       ->where(['sector'=>$sector_id])
       ->select(['id','name'])->asArray()->all();

            return $data;
        }
}
