<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	public $type;

    public function init() {
        parent::init();
    }

    public function rules() {
        $rules = parent::rules();
        unset($rules['usernameRequired']);
        return $rules;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {	
        $params = explode("-", $id);
        if($params[0] == 's')
        { 
        	$user=Student::find()->where(['id' => $params[1]])->one();
        	$user->type = 's';
        }  
        
        else 
        {
            $user=Expert::find()->where(['id' => $params[1]])->one();
            $user->type = 'e';
        }	
       
        return $user;
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getEmail(){
        if($this->type == 's'){
            $user = Student::find()->where(['id'=>$this->id])->one();
        }
        else {
            $user = Expert::find()->where(['id'=>$this->id])->one();
        }
        
        return $user->email;

    }

    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();

        return $this->auth_key;
    }
}
