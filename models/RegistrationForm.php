<?php 

namespace app\models;

class RegistrationForm extends \dektrium\user\models\RegistrationForm
{
    /**
     * @var string
     */
    public $field;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['fieldRequired'] = ['field', 'required'];
        $rules['fieldLength']   = ['field', 'string', 'max' => 10];
        return $rules;
    }
}