<?php

namespace app\controllers;

use Yii;
use app\models\Canvas;
use app\models\CanvasSearch;
use app\models\File;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\Expert;
use app\models\ExpertSector;
use app\models\ExpertCanvas;
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
                'only' => ['create', 'index','update','delete','view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','view','update'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->type == 's';
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view','update'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->type == 'e';
                        },
                    ],
                    [
                        'allow' => false,
                        'actions' => ['create', 'index','update','delete','view'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['delete'],
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
          $model->created_by= Yii::$app->user->id;
          $model->status = 'Submitted';

           if ($model->save()) {
              if(!$this->findExperts($model)) {
                    $model->status ='Draft';
                    $model->save();
                    return $this->render('create', [
                        'model' => $model,
                        'error' => 'Sorry, we could not find experts available to review your project at this time. Please try again later.'
                    ]);
                }

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

    public function findExperts($model)
    {       
            $technical_experts = Expert::find()->where(['role' => 'Technical', 'confirmed' => 'Yes'])->orderBy('active_projects')->all();

            if($technical_experts == NULL) $exist=false;

            $exist = true;

            $tech_exist = ExpertCanvas::find()->where([ 'role' => 'Technical' , 'project' => $model->id])->one(); // check if there's already a technical expert for this canvas

            if($tech_exist == NULL) {

                foreach($technical_experts as $expert)
                    {      
                        $sector_check = ExpertSector::find()->where(['sector_id' => $model->sector , 'expert' => $expert->id])->one();

                        if($sector_check != NULL)
                            {   
                                $record = new ExpertCanvas();
                                $record->project = $model->id;
                                $record->expert = $expert->id;
                                $record->status = 'Pending';
                                $record->role = 'Technical';
                                $record->expiry_date = new Expression('DATE_ADD(NOW(), INTERVAL 14 DAY)');
                                $record->save();
                                break;
                            } 
                        else $exist = false;
                    }
            }

            $economical_experts = Expert::find()->where(['role' => 'Economical', 'confirmed' => 'Yes'])->orderBy('active_projects')->all();

            if($economical_experts == NULL) $exist=false;

            $econ_exist = ExpertCanvas::find()->where([ 'role' => 'Economical' , 'project' => $model->id])->one(); // check if canvas has economical expert already assigned

            if($econ_exist == NULL) {

                    foreach($economical_experts as $expert)
                        {      
                            $sector_check = ExpertSector::find()->where(['sector_id' => $model->sector , 'expert' => $expert->id])->one();

                            if($sector_check != NULL)
                                {   
                                    $record = new ExpertCanvas();
                                    $record->project = $model->id;
                                    $record->expert = $expert->id;
                                    $record->status = 'Pending';
                                    $record->role = 'Economical';
                                    $record->expiry_date = new Expression('DATE_ADD(NOW(), INTERVAL 14 DAY)');
                                    $record->save();
                                    break;
                                }
                            else $exist=false; 
                        }
            }

            $creative_experts = Expert::find()->where(['role' => 'Creative', 'confirmed' => 'Yes'])->orderBy('active_projects')->all();

            $creative_exist = ExpertCanvas::find()->where([ 'role' => 'Creative' , 'project' => $model->id])->one(); // check if canvas has creative expert already assigned

            if($creative_experts == NULL) $exist=false;

            if($creative_exist == NULL) {

                foreach($creative_experts as $expert)
                    {      
                        $sector_check = ExpertSector::find()->where(['sector_id' => $model->sector , 'expert' => $expert->id])->one();

                        if($sector_check != NULL)
                            {   
                                $record = new ExpertCanvas();
                                $record->project = $model->id;
                                $record->expert = $expert->id;
                                $record->status = 'Pending';
                                $record->role = 'Creative';
                                $record->expiry_date = new Expression('DATE_ADD(NOW(), INTERVAL 14 DAY)');
                                $record->save();
                                break;
                            }
                        else $exist=false; 
                    }
            }
            return $exist;
    }
}
