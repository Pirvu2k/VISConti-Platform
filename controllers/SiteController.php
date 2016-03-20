<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use yii\data\Pagination;
use app\models\Project;

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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $query=Project::find()->where(['requested' => '0']);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $projects = $query->orderBy('date_added')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $invitations=Project::find()->where(['requested' => '1']) -> all();

        $ownProjects=Project::find()->where(['created_by'=>Yii::$app->user->identity->username]) -> all();

        $blockedProjects=Project::find()->where(['requested' => '2']) -> all();

        return $this->render('index', [
            'projects' => $projects,
            'pagination' => $pagination,
            'invitations' => $invitations,
            'ownProjects' => $ownProjects,
            'blockedProjects' => $blockedProjects,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
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

}
