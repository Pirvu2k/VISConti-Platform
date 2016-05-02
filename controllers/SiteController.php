<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\LoginFormAll;
use app\models\ContactForm;
use yii\data\Pagination;
use app\models\Project;
use app\models\RegistrationForm;
use app\models\Student;
use app\models\Expert;
use yii\db\Expression;
use kartik\widgets\DepDrop;
use app\models\SubSector;
use app\models\ExpertCanvas;
use app\models\CanvasActivity;

class SiteController extends Controller
{   
    public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ], 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
            ],
        ];
    }

    public function actionIndex()
    {   

        //recent activities

        if(Yii::$app->user->identity->type == 's')
        {
            $activities = CanvasActivity::find()->where(['added_by' => Yii::$app->user->id , 'added_by_type' => 'Student'])->orderBy(['created_on' => SORT_DESC])->limit(5)->all();

            //ownProjects
            $ownProjects=Project::find()->where(['created_by'=>Yii::$app->user->id ,'status'=>'Submitted'])->orWhere(['status' => 'Expert evaluation requested', 'created_by'=>Yii::$app->user->id]);

            $ownProjects_pages = new Pagination(['totalCount' => $ownProjects->count(), 'pageSize'=>8, 'pageParam' => 'own']);
            
            $ownProjects = $ownProjects->offset($ownProjects_pages->offset)
                ->orderBy(['date_added' => SORT_DESC])
                ->limit($ownProjects_pages->limit)
                ->all();

            //studentAcceptedProjects
            $studentAcceptedProjects = Project::find()->where(['status' => 'Expert evaluation in progress'])->andWhere(['created_by' => Yii::$app->user->id]);
                    
            $studentAcceptedProjects_pages = new Pagination(['totalCount' => $studentAcceptedProjects->count(), 'pageSize'=>8, 'pageParam' => 'review']);
            
            $studentAcceptedProjects = $studentAcceptedProjects->offset($studentAcceptedProjects_pages->offset)
                ->orderBy(['date_added' => SORT_DESC])
                ->limit($studentAcceptedProjects_pages->limit)
                ->all();

            return $this->render('index', [
            'ownProjects' => $ownProjects,
            'activities' => $activities,
            'ownProjects_pages' => $ownProjects_pages,
            'studentAcceptedProjects' => $studentAcceptedProjects,
            'studentAcceptedProjects_pages' => $studentAcceptedProjects_pages,
        ]);

        } else {
            $activities = CanvasActivity::find()->where(['added_by' => Yii::$app->user->id , 'added_by_type' => 'Expert'])->orderBy(['created_on' => SORT_DESC])->limit(5)->all();

            //invitations
            $invitations=ExpertCanvas::find()->where(['expert' => Yii::$app->user->id , 'status' => 'Pending']);

            $invitations_pages = new Pagination(['totalCount' => $invitations->count(), 'pageSize'=>8, 'pageParam' => 'inv']);
            
            $invitations = $invitations->offset($invitations_pages->offset)
                ->orderBy(['created_on' => SORT_DESC])
                ->limit($invitations_pages->limit)
                ->all();
                
            
            
            //acceptedProjects
            $acceptedProjects=ExpertCanvas::find()->where(['expert' => Yii::$app->user->id , 'status' => 'Active']);
                    
            $acceptedProjects_pages = new Pagination(['totalCount' => $acceptedProjects->count(), 'pageSize'=>8, 'pageParam' => 'accepted']);
            
            $acceptedProjects = $acceptedProjects->offset($acceptedProjects_pages->offset)
                ->orderBy(['created_on' => SORT_DESC])
                ->limit($acceptedProjects_pages->limit)
                ->all();

            return $this->render('index', [
            'invitations' => $invitations,
            'invitations_pages' => $invitations_pages,
            'activities' => $activities,
            'acceptedProjects' => $acceptedProjects,
            'acceptedProjects_pages' => $acceptedProjects_pages,
        ]);
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginFormAll();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('loginall', [
            'model' => $model,
        ]);
    }

     public function actionRegister()
    {
        $model = new RegistrationForm();
        
        if ($model->load(Yii::$app->request->post())) {
           if($model->type=='s')
           {
                $student = new Student();
                $student->email = $model->email;
                $student->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $student->created_on = $student->last_login_activity = new Expression('NOW()');
                $student->last_modified_on = new Expression('NOW()');
                $student->generateAuthKey();
                if(!Student::findOne(['email'=>$model->email]))
                {
                    $student->save();
                    $email = \Yii::$app->mailer->compose()
                        ->setTo($student->email)
                        ->setFrom(['mailer@cop.viscontiproject.eu'])
                        ->setSubject('Signup Confirmation')
                        ->setTextBody("
                            In order to confirm your e-mail , please click the following link : ".
                                Yii::$app->urlManager->createAbsoluteUrl(
                                    ['site/confirm','id'=>$student->id,'key'=>$student->auth_key,'type'=>'s']
                                )
                            )
                        ->send();
                    if($email){
                    Yii::$app->getSession()->setFlash('success','A confirmation e-mail was sent to the address you provided.');
                    }
                    else{
                    Yii::$app->getSession()->setFlash('warning','Registration failed , please contact admin.');
                    }
                    return $this->redirect('index.php?r=site/confirmation');
                }
                else {
                    Yii::$app->getSession()->setFlash('error', 'E-mail already in use.');
                    return $this->redirect('index.php?r=site/register');
                }
           }
           else {
                $expert = new Expert();
                $expert->email = $model->email;
                $expert->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
                $expert->created_on = $expert->last_modified_on = $expert->last_login_activity = new Expression('NOW()');
                $expert->generateAuthKey();
                if(!Expert::findOne(['email'=>$model->email]))
                {   
                    $expert->save();
                    $email = \Yii::$app->mailer->compose()
                        ->setTo($expert->email)
                        ->setFrom('mailer@cop.viscontiproject.eu')
                        ->setSubject('Signup Confirmation')
                        ->setTextBody("
                            In order to confirm your e-mail , please click the following link :  ".
                            Yii::$app->urlManager->createAbsoluteUrl(
                            ['site/confirm','id'=>$expert->id,'key'=>$expert->auth_key,'type'=>'e']))
                        ->send();
                    if($email){
                    Yii::$app->getSession()->setFlash('success','A confirmation e-mail was sent to the address you provided.');
                    }
                    else{
                    Yii::$app->getSession()->setFlash('warning','Registration failed , please contact admin.');
                    }
                    return $this->redirect('index.php?r=site/confirmation');
                }
                else {
                    Yii::$app->getSession()->setFlash('error', 'E-mail already in use.');
                    return $this->redirect('index.php?r=site/register');
                }
                
           }
        } 
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCanvas()
    {
        if(!Yii::$app->user->can('student'))
            return $this->render('canvas1');
        else return $this->render('hello');
    }
    public function actionFaq()
    {
        return $this->render('faq');
    }

    public function actionLists($id)
    {

        $subsectors = SubSector::find()->where(['sector' => $id])->all();

        if(!empty($subsectors)) {
            foreach($subsectors as $subsector)
            {
                echo "<option value='". $subsector->sector . "'>" . $subsector->name . "</option>";
            }
        }
        else {
            echo "<option>.</option>";
        }
    }

    public function actionConfirmation(){
        return $this->render('confirmation'); //page user sees after signup
    }

    public function actionConfirm($id, $key, $type)
    {
        if($type=='e')
        {
            $user = \app\models\Expert::find()->where([
                'id'=>$id,
                'auth_key'=>$key,
                'confirmed'=>'No',
                ])->one();
        }
        else {
            $user = \app\models\Student::find()->where([
                'id'=>$id,
                'auth_key'=>$key,
                'confirmed'=>'No',
                ])->one();
        }
        if(!empty($user)){
        $user->confirmed='Yes';
        $user->save();
        Yii::$app->getSession()->setFlash('success','Account confirmed successfully.');
        }
        else{
        Yii::$app->getSession()->setFlash('warning','Seems like there was an error. Please contact admin.');
        }
        return $this->render('confirmation');
    }
 
}
