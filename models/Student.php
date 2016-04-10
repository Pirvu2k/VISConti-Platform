<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class Student extends User
{



    public function init() {

        parent::init();
    }

    public function rules() {
        $rules = parent::rules();
        unset($rules['emailRequired']);
        return $rules;
    }
    
    public function findByEmail() 
    {
        $student = Student::find()->where(['email' => $this->email])->one();
        
        if($student != null)
        {
            return $student;
        }
        
        return null;
    }
    
    public function validatePassword($password)
    {   
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
    
    public static function tableName()
    {
        return 'student';
    }

   
}