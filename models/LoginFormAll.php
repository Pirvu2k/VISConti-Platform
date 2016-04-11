<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginFormAll extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
    public $type;
    private $_user = NULL;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password','type'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) 
            {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) 
        {
            $u = $this->getUser();
            $u->id=$u->type.'-'. $u->id;
            return Yii::$app->user->login($u, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {   
        if ($this->type == 's') 
        {
            $this->_user = Student::findByEmail($this->email);
            if($this->_user)
                $this->_user->type = 's';
        }
        
        if ($this->type == 'e') 
        {   
            $this->_user = Expert::findByEmail($this->email);
            if($this->_user)
                $this->_user->type = 'e';
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'type' => 'Role',
        ];
    }
}
