<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\ProjectAttachment;

/**
 * This is the model class for table "canvases".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $status
 * @property string $date_added
 * @property string $date_modified
 */
class Canvas extends \yii\db\ActiveRecord
{   
    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'canvases';

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content','language','eng_summary'], 'required'],
            [['title', 'content','eng_summary','language','status'], 'string'],
            [['selling','outstanding','benefits','marketed','partners','tech_resources','risk','impact','fin_resources','customers','generate','costs'],'string', 'min' => 5 , 'max' => 80 , 'tooShort' => 'This field should be at least 5 characters long.', 'tooLong' => 'This field should be at most 80 characters long.' ],
            [['date_added', 'date_modified','created_by','overall_technical','overall_economical','overall_creative'], 'safe'],
            ['eng_summary','string', 'max' => 120,'min'=>10 ],
            ['title','string','max'=>50,'min'=>5],
            ['content','string','max'=>2999],
            [['sector','subsector'],'integer'],
            [['sector','subsector'],'required'],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, doc, docx , pdf , ppt, pptx ,xls ,xlsx', 'maxFiles' => 3 ,'maxSize' => 1024 * 1024 * 5 , 'tooBig' => 'Maximum accepted file size is 5MB.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'eng_summary' => 'Summary (in English)',
            'language' => 'Language',
            'files' => 'Files'
        ];
    }

     public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                if($file->saveAs('uploads/'. $this->id . $file->baseName . '.' . $file->extension))
                    {
                        $attachment = new ProjectAttachment;
                        $attachment->attachment_name = $this->id . $file->baseName . '.' . $file->extension;
                        $attachment->project = $this->id;
                        $attachment->save();
                    };
            }
            return true;
        } else {
            return false;
        }
    }
}
