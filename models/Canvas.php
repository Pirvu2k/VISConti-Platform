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
 * @property string $date_added
 * @property string $date_modified
 */
class Canvas extends \yii\db\ActiveRecord
{   
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
            [['title', 'content','eng_summary','language'], 'string'],
            [['date_added', 'date_modified','assigned_to','created_by','status','overall_technical','overall_economical','overall_creative'], 'safe'],
            ['eng_summary','string', 'max' => 120,'min'=>10 ],
            ['title','string','max'=>50,'min'=>5],
            ['content','string','max'=>2999],
            [['sector','subsector'],'string'],
            [['sector','subsector'],'required']
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
            'language' => 'Language'
        ];
    }

	public function actionUpload()  
	{
		$fileName = 'file';
		$uploadPath = 'uploads';

		if (isset($_FILES[$fileName])) {
			$file = \yii\web\UploadedFile::getInstanceByName($fileName);

			//Print file data
			//print_r($file);

			if ($file->saveAs($uploadPath . '/' . $file->name)) {
				//Now save file data to database

				echo \yii\helpers\Json::encode($file);
			}
		}

		return false;
	}
	
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->files as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
