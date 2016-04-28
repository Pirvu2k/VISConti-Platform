<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class ScoreForm extends Model
{
    public $score;
    public $note;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['score','note'], 'required'],
            ['score' , 'number' , 'min' => 1 , 'max' => 100],
            ['note' , 'string' , 'min' => 50 , 'max' => 300]
            
        ];
    }

    public function attributeLabels()
    {
        return [
            'score' => 'Score',
            'note' => 'Note'
        ];
    }
}
