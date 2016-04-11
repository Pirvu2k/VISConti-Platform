<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $created_on
 * @property string $last_modified_on
 * @property string $last_login_activity
 * @property string $trash
 * @property string $given_name
 * @property string $family_name
 * @property string $email
 * @property integer $birth_year
 * @property string $password
 * @property string $password_exp_date
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $agreed_terms
 * @property string $confirmed
 *
 * @property ProjectCanvasStudent[] $projectCanvasStudents
 * @property StudentEducation[] $studentEducations
 * @property StudentExperience[] $studentExperiences
 */
class StudentAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_on', 'last_modified_on', 'last_login_activity', 'password_exp_date'], 'safe'],
            [['trash', 'agreed_terms', 'confirmed'], 'string'],
            [['birth_year'], 'integer'],
            [['mobile' , 'phone'] , 'integer' , 'message' => 'Please enter a valid number.'],
            [['zip'] , 'integer' , 'message' => 'Please enter a valid zip code.'],
            [['sector' , 'sub_sector'] , 'string' , 'max' => 50],
            [['given_name', 'family_name', 'email', 'fax'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['sub_sector'] , 'validateSubsector'],
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
            'last_login_activity' => 'Last Login Activity',
            'trash' => 'Trash',
            'given_name' => 'Given Name',
            'family_name' => 'Family Name',
            'email' => 'E-mail',
            'birth_year' => 'Birth Year',
            'password' => 'Password',
            'password_exp_date' => 'Password Exp Date',
            'mobile' => 'Mobile Number',
            'phone' => 'Phone Number',
            'agreed_terms' => 'Agreed Terms',
            'confirmed' => 'Confirmed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectCanvasStudents()
    {
        return $this->hasMany(ProjectCanvasStudent::className(), ['Student' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentEducations()
    {
        return $this->hasMany(StudentEducation::className(), ['Student' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentExperiences()
    {
        return $this->hasMany(StudentExperience::className(), ['Student' => 'id']);
    }

    public function validateSubsector($attribute, $params)
    {
        if(empty($this->sector))
            $this->addError('sub_sector' , 'Select sector first.');
    }

    public function getSector()
    {
        $data=Sector::find()->where(['id' => $this->sector])->one();
        $data = $data->name;
        return $data;
    }

    public function getSubSector()
    {
        $data=SubSector::find()->where(['id' => $this->sub_sector])->one();
        $data = $data->name;
        return $data;
    }
}
