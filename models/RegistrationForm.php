<?php

namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;

class RegistrationForm extends BaseRegistrationForm
{
    public function rules() {
        $rules = parent::rules();
        unset($rules['usernameRequired']);
        return $rules;
    }
}