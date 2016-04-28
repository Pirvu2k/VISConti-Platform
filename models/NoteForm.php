<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class NoteForm extends Model
{
    public $note;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['note'], 'required'],
            ['note' , 'string' , 'min' => 10 , 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'note' => 'Note'
        ];
    }
}
