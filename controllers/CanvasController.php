<?php

namespace app\controllers;

use Yii;
use app\models\Canvas;
use app\models\CanvasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\filters\AccessControl;

/**
 * CanvasController implements the CRUD actions for Canvas model.
 */
class CanvasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['student'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['expert'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Canvas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CanvasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Canvas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Canvas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Canvas();

        if ($model->load(Yii::$app->request->post())) {
          $model->date_added = new Expression('NOW()');
          $model->date_modified = new Expression('NOW()');
          $model->created_by= Yii::$app->user->identity->username;
          $model->student_id= Yii::$app->user->identity->id;
          $model->requested = 1;
           if ($model->save()) {             
             return $this->redirect(['view', 'id' => $model->id]);             
           } 
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Canvas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $model->date_modified = new Expression('NOW()');
           if ($model->save()) {             
             return $this->redirect(['view', 'id' => $model->id]);             
           } 
        } 
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Canvas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Canvas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Canvas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Canvas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
