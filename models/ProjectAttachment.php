<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_attachments".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property integer $project
 * @property string $attachment_name
 *
 * @property ProjectCanvas $project0
 */
class ProjectAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_attachments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on'], 'safe'],
            [['trash'], 'string'],
            [['project', 'attachment_name'], 'required'],
            [['project'], 'integer'],
            [['attachment_name'], 'string', 'max' => 50],
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
            'project' => 'Project',
            'attachment_name' => 'Attachment Name',
        ];
    }

}
