<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expert".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $trash
 * @property string $last_login_activity
 * @property string $title
 * @property string $given_name
 * @property string $family_name
 * @property string $email
 * @property integer $birth_year
 * @property string $password
 * @property string $reset_pass_exp_date
 * @property string $website
 * @property string $bio
 * @property string $country
 * @property string $zip
 * @property string $city
 * @property string $address
 * @property string $state
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $terms
 * @property string $confirmed
 * @property integer $active_projects
 *
 * @property ExpertInterest[] $expertInterests
 * @property ExpertProjectCanvasAssignation[] $expertProjectCanvasAssignations
 * @property ExpertSector[] $expertSectors
 * @property ExpertSpecialization[] $expertSpecializations
 * @property ExpertSubSector[] $expertSubSectors
 */
class ExpertAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on', 'last_login_activity', 'reset_pass_exp_date','auth_key'], 'safe'],
            [['trash', 'terms', 'confirmed'], 'string'],
            [['birth_year', 'active_projects'], 'integer'],
            [['title', 'given_name', 'family_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['mobile' , 'phone'] , 'integer' , 'message' => 'Please enter a valid number.'],
            [['zip'] , 'integer' , 'message' => 'Please enter a valid zip code.'],
            [['website', 'country', 'city', 'address', 'state', 'fax', 'role'], 'string', 'max' => 50],
            [['bio'], 'string', 'max' => 1024],
            [['email'], 'unique'],
            'websiteUrl' => ['website', 'url', 'defaultScheme' => 'http'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_on' => 'Created On',
            'last_modified_on' => 'Last Modified On',
            'trash' => 'Trash',
            'last_login_activity' => 'Last Login Activity',
            'title' => 'Title',
            'given_name' => 'Given Name',
            'family_name' => 'Family Name',
            'email' => 'Email',
            'birth_year' => 'Birth Year',
            'password' => 'Password',
            'reset_pass_exp_date' => 'Reset Pass Exp Date',
            'website' => 'Website',
            'bio' => 'Bio',
            'country' => 'Country',
            'zip' => 'Zip',
            'city' => 'City',
            'address' => 'Address',
            'state' => 'State',
            'mobile' => 'Mobile',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'terms' => 'Terms',
            'confirmed' => 'Confirmed',
            'active_projects' => 'Active Projects',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertInterests()
    {
        return $this->hasMany(ExpertInterest::className(), ['CoP' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertProjectCanvasAssignations()
    {
        return $this->hasMany(ExpertProjectCanvasAssignation::className(), ['Expert' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSectors()
    {
        return $this->hasMany(ExpertSector::className(), ['CoP' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSpecializations()
    {
        return $this->hasMany(ExpertSpecialization::className(), ['CoP' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertSubSectors()
    {
        return $this->hasMany(ExpertSubSector::className(), ['CoP' => 'id']);
    }
}
