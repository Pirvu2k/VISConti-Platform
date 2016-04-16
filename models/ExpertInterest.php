<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_interest".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property integer $interest
 * @property integer $expert
 *
 * @property Expert $expert0
 * @property Interest $interest0
 */
class ExpertInterest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_interest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['interest', 'expert'], 'required'],
            [['interest', 'expert'], 'integer'],
            [['expert'], 'exist', 'skipOnError' => true, 'targetClass' => Expert::className(), 'targetAttribute' => ['expert' => 'id']],
            [['interest'], 'exist', 'skipOnError' => true, 'targetClass' => Interest::className(), 'targetAttribute' => ['interest' => 'id']],
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
            'interest' => 'Interest',
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
    public function getInterest0()
    {
        return $this->hasOne(Interest::className(), ['id' => 'interest']);
    }
}
