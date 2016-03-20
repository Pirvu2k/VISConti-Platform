<?php

namespace app\models;

use Yii;

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
    public $captcha;
     
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
            [['title', 'content','eng_summary'], 'string'],
            [['date_added', 'date_modified','requested','assigned_to','expert_id','student_id','created_by'], 'safe'],
            ['eng_summary','string', 'max' => 120,'min'=>10 ],
            ['title','string','max'=>50,'min'=>5],
            ['captcha','captcha']
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
}
