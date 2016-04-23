<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job_titles".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $code
 * @property double $expert_technical_weight
 * @property double $expert_economical_weight
 * @property double $expert_creative_weight
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_titles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['code', 'expert_technical_weight', 'expert_economical_weight', 'expert_creative_weight'], 'required'],
            [['expert_technical_weight', 'expert_economical_weight', 'expert_creative_weight'], 'number'],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique'],
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
            'code' => 'Code',
            'expert_technical_weight' => 'Expert Technical Weight',
            'expert_economical_weight' => 'Expert Economical Weight',
            'expert_creative_weight' => 'Expert Creative Weight',
        ];
    }
}
