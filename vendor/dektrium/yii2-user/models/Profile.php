<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dektrium\user\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property string  $phone_number
 * @property string  $fax_number
 * @property string  $country 
 * @property User    $user
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends ActiveRecord
{
    /** @var \dektrium\user\Module */
    protected $module;

    /** @inheritdoc */
    public function init()
    {
        $this->module = Yii::$app->getModule('user');
    }

    /** @inheritdoc */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'bioString' => ['bio', 'string'],
            'publicEmailPattern' => ['public_email', 'email'],
            'gravatarEmailPattern' => ['gravatar_email', 'email'],
            'websiteUrl' => ['website', 'url'],
            'nameLength' => ['name', 'string', 'max' => 255],
            'publicEmailLength' => ['public_email', 'string', 'max' => 255],
            'gravatarEmailLength' => ['gravatar_email', 'string', 'max' => 255],
            'websiteLength' => ['website', 'string', 'max' => 255],
            'phoneNumberValidator' =>['phone_number','integer','min'=>9999999999,'max'=>999999999999999,'tooSmall' => 'Please enter a valid phone number.','tooBig'=> 'Please enter a valid phone number.'],
            'faxNumberValidator' =>['fax_number','integer','min'=>9999999999,'max'=>999999999999999,'tooSmall' => 'Please enter a valid fax number.','tooBig'=> 'Please enter a valid fax number.'],
            'countryString' => ['country', 'string'],
            'stateString' => ['state', 'string'],
            'addressString' => ['address', 'string'],
            'cityString' => ['city', 'string'],
            'zipInt' => ['zip','string' , 'min'=> 3, 'max'=>16],
            'byear' => ['byear', 'string'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'name'           => Yii::t('user', 'Name'),
            'public_email'   => Yii::t('user', 'Public E-mail'),
            'gravatar_email' => Yii::t('user', 'Gravatar email'),
            'website'        => Yii::t('user', 'Website'),
            'bio'            => Yii::t('user', 'Bio'),
            'phone_number'   => Yii::t('user', 'Phone Number (International Format)'),
            'fax_number'     => Yii::t('user', 'Fax Number (International Format)'),
            'country'        => Yii::t('user', 'Country'),
            'state'          => Yii::t('user', 'State'),
            'address'        => Yii::t('user', 'Address'),
            'city'           => Yii::t('user', 'City'),
            'zip'            => Yii::t('user', 'Zip/Postal Code'),
            'byear'          => Yii::t('user', 'Year of Birth'),
        ];
    }

    /** @inheritdoc */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isAttributeChanged('gravatar_email')) {
                $this->setAttribute('gravatar_id', md5(strtolower($this->getAttribute('gravatar_email'))));
            }

            return true;
        }

        return false;
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getUser()
    {
        return $this->hasOne($this->module->modelMap['User'], ['id' => 'user_id']);
    }
}
