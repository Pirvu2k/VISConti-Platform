<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
            [['date_added', 'date_modified','assigned_to','created_by','overall_technical','overall_economical','overall_creative'], 'safe'],
            ['eng_summary','string', 'max' => 120,'min'=>10 ],
            ['title','string','max'=>50,'min'=>5],
            ['content','string','max'=>2999],
            [['sector','subsector'],'integer'],
            [['sector','subsector'],'required'],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, doc, docx , pdf , ppt, pptx ,xls ,xlsx', 'maxFiles' => 10]
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
            'requested' => 'Project Status',
            'eng_summary' => 'Summary (in English)',
            'language' => 'Language',
            'files' => 'Files ( maximum 10 , allowed file types: png, jpg, doc, docx , pdf , ppt, pptx ,xls ,xlsx)'
        ];
    }

     public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $file->saveAs('uploads/'. $this->id . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
