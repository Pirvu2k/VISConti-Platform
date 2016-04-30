<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_canvas_activity".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $activity_text
 * @property string $trash
 * @property integer $added_by
 * @property string $added_by_type
 * @property integer $canvas
 * @property string $action_type
 *
 * @property Canvases $canvas0
 */
class CanvasActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_canvas_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash', 'added_by_type', 'action_type'], 'string'],
            [['added_by', 'canvas'], 'integer'],
            [['activity_text'], 'string', 'max' => 255],
            [['canvas'], 'exist', 'skipOnError' => true, 'targetClass' => Canvas::className(), 'targetAttribute' => ['canvas' => 'id']],
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
            'activity_text' => 'Activity Text',
            'trash' => 'Trash',
            'added_by' => 'Added By',
            'added_by_type' => 'Added By Type',
            'canvas' => 'Canvas',
            'action_type' => 'Action Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCanvas()
    {
        return \app\models\Canvas::find()->where(['id' => $this->canvas])->one();
    }

    public function getName(){

        if($this->added_by_type == 'Student')
        {
            $user= \app\models\Student::find()->where(['id'=>$this->added_by])->one();
            if(!empty($user->given_name) && !empty($user->family_name)) {
                    $user = $user->given_name . ' ' . $user->family_name;
            } else $user = $user->email;
        } else {
            $user= \app\models\Expert::find()->where(['id'=>$this->added_by])->one();
            if(!empty($user->given_name) && !empty($user->family_name)) {
                    $user = $user->given_name . ' ' . $user->family_name;
            } else $user = $user->email;
        }

        return $user;
    }
}
