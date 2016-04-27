<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert_project_canvas_assignation".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property integer $expert
 * @property integer $project
 * @property integer $role
 * @property string $status
 * @property string $expiry_date
 * @property string $notes
 * @property double $score
 *
 * @property Expert $expert0
 * @property ExpertRoles $role0
 * @property ProjectCanvas $project0
 */
class ExpertCanvas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert_project_canvas_assignation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on', 'expiry_date'], 'safe'],
            [['expert', 'project'], 'integer'],
            [['status', 'notes' ,'role'], 'string'],
            [['score'], 'number'],
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
            'expert' => 'Expert',
            'project' => 'Project',
            'role' => 'Role',
            'status' => 'Status',
            'expiry_date' => 'Expiry Date',
            'notes' => 'Notes',
            'score' => 'Score',
        ];
    }

}
