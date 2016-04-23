<?php

namespace app\controllers;

use Yii;
use app\models\ExpertAccount;
use app\models\ExpertAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ExpertEducation;
use app\models\ExpertExperience;
use app\models\ExpertSector;
use app\models\ExpertSubSector;
use app\models\ExpertSpecialization;
use app\models\ExpertInterest;
use app\models\Sector;
use app\models\SubSector;
use app\models\Specialization;
use app\models\Interest;
/**
 * ExpertController implements the CRUD actions for ExpertAccount model.
 */
class ExpertController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'index','update','delete','view','role'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['create', 'index','delete'],
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'matchCallback' => function ($rule, $action) {
                            if(Yii::$app->user->identity->type=='e' && (Yii::$app->user->id == Yii::$app->request->get('id')))
                                return true;
                            else return false; 
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['role'],
                        'matchCallback' => function ($rule, $action) {
                            if(empty(Yii::$app->user->identity->role) && Yii::$app->user->identity->type=='e' && (Yii::$app->user->id == Yii::$app->request->get('id')))
                                return true;
                            else return false; 
                        },
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ExpertAccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpertAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpertAccount model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)

    {   $experience=ExpertExperience::find()->where(['user_id' => $id]) -> all();
        $education=ExpertEducation::find()->where(['user_id' => $id]) -> all();
        $sectors=ExpertSector::find()->where(['expert' => $id])->all();
        $subsectors=ExpertSubSector::find()->where(['expert'=>$id])->all();
        $specializations=ExpertSpecialization::find()->where(['expert'=>$id])->all();
        $interests=ExpertInterest::find()->where(['expert'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'experience' => $experience,
            'education' => $education,
            'sectors' => $sectors,
            'subsectors' => $subsectors,
            'specializations' => $specializations,
            'interests' => $interests,
        ]);
    }

    /**
     * Creates a new ExpertAccount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ExpertAccount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ExpertAccount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $sectors=Sector::find()->all();

            foreach($sectors as $s)
            {
                if(isset($_POST['sector_'. $s->id]) && $_POST['hidden_sector_'.$s->id] == '0') {
                        //add sector to expert_sector table
                        $item=new ExpertSector();
                        $item->sector_id=$s->id;
                        $item->expert=Yii::$app->user->id;
                        $item->save();
                }

                if(!isset($_POST['sector_'. $s->id]) && $_POST['hidden_sector_'.$s->id] == '1') {
                        //remove sector from expert_sector table
                        $item=ExpertSector::find()->where(['expert'=>Yii::$app->user->id, 'sector_id' => $s->id])->one();
                        $item->delete();
                }
            }

            $subsectors=SubSector::find()->all();

            foreach($subsectors as $s)
            {
                if(isset($_POST['subsector_'. $s->id]) && $_POST['hidden_subsector_'.$s->id] == '0') {
                        //add sector to expert_sub_sector table
                        $item=new ExpertSubSector();
                        $item->subsector=$s->id;
                        $item->expert=Yii::$app->user->id;
                        $item->save();
                }

                if(!isset($_POST['subsector_'. $s->id]) && $_POST['hidden_subsector_'.$s->id] == '1') {
                        //remove sector from expert_sub_sector table
                        $item=ExpertSubSector::find()->where(['expert'=>Yii::$app->user->id, 'subsector' => $s->id])->one();
                        $item->delete();
                }
            }

            $specializations=Specialization::find()->all();

            foreach($specializations as $s)
            {
                if(isset($_POST['specialization_'. $s->id]) && $_POST['hidden_specialization_'.$s->id] == '0') {
                        //add sector to expert_specialization table
                        $item=new ExpertSpecialization();
                        $item->specialization=$s->id;
                        $item->expert=Yii::$app->user->id;
                        $item->save();
                }

                if(!isset($_POST['specialization_'. $s->id]) && $_POST['hidden_specialization_'.$s->id] == '1') {
                        //remove sector from expert_specialization table
                        $item=ExpertSpecialization::find()->where(['expert'=>Yii::$app->user->id, 'specialization' => $s->id])->one();
                        $item->delete();
                }
            }

            $interests=Interest::find()->all();

            foreach($interests as $s)
            {
                if(isset($_POST['interest_'. $s->id]) && $_POST['hidden_interest_'.$s->id] == '0') {
                        //add sector to expert_sub_sector table
                        $item=new ExpertInterest();
                        $item->interest=$s->id;
                        $item->expert=Yii::$app->user->id;
                        $item->save();
                }

                if(!isset($_POST['interest_'. $s->id]) && $_POST['hidden_interest_'.$s->id] == '1') {
                        //remove sector from expert_sub_sector table
                        $item=ExpertInterest::find()->where(['expert'=>Yii::$app->user->id, 'interest' => $s->id])->one();
                        $item->delete();
                }
            }

            if($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
        } 
            return $this->render('update', [
                'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing ExpertAccount model.
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
     * Finds the ExpertAccount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExpertAccount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExpertAccount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionRole($id){
        $tw = 0; // technical weight
        $ew = 0; // economical weight
        $cw = 0; // creative weight

        $ed_records = \app\models\ExpertEducation::find()->where(['user_id' => Yii::$app->user->id])->all(); // get ed records

        foreach($ed_records as $ed) 
        {   
            $degree = \app\models\Degrees::find()->where(['code'=>$ed->degree])->one(); // get degree weights

            $tw+= $degree->expert_technical_weight * 0.1; // add degree weights
            $ew+= $degree->expert_economical_weight * 0.1;
            $cw+= $degree->expert_creative_weight * 0.1;
        }

        $exp_records = \app\models\ExpertExperience::find()->where(['user_id' => Yii::$app->user->id])->all();

        foreach($exp_records as $exp)
        {   
            $job = \app\models\Jobs::find()->where(['code'=>$exp->job_title])->one();

            $tw+= $job->expert_technical_weight * 0.1;
            $ew+= $job->expert_economical_weight * 0.1;
            $cw+= $job->expert_creative_weight * 0.1;
        }

        $sectors = \app\models\ExpertSector::find()->where(['expert' => Yii::$app->user->id])->all();

        foreach($sectors as $s)
        {   
            $sector = \app\models\Sector::find()->where(['id'=> $s->sector_id])->one();

            $tw+= $sector->expert_technical_weight * 0.1;
            $ew+= $sector->expert_economical_weight * 0.1;
            $cw+= $sector->expert_creative_weight * 0.1;
        }

        $subsectors = \app\models\ExpertSubSector::find()->where(['expert' => Yii::$app->user->id])->all();

        foreach($subsectors as $s)
        {   
            $subsector = \app\models\SubSector::find()->where(['id'=> $s->subsector])->one();

            $tw+= $subsector->expert_technical_weight * 0.2;
            $ew+= $subsector->expert_economical_weight * 0.2;
            $cw+= $subsector->expert_creative_weight * 0.2;
        }

        $specializations = \app\models\ExpertSpecialization::find()->where(['expert' => Yii::$app->user->id])->all();

        foreach($specializations as $s)
        {   
            $specialization = \app\models\Specialization::find()->where(['id'=> $s->specialization])->one();

            $tw+= $specialization->expert_technical_weight * 0.4;
            $ew+= $specialization->expert_economical_weight * 0.4;
            $cw+= $specialization->expert_creative_weight * 0.4;
        }

        $interests = \app\models\ExpertInterest::find()->where(['expert' => Yii::$app->user->id])->all();

        foreach($interests as $i)
        {   
            $interest = \app\models\Interest::find()->where(['id'=> $i->interest])->one();

            $tw+= $interest->expert_technical_weight * 0.8;
            $ew+= $interest->expert_economical_weight * 0.8;
            $cw+= $interest->expert_creative_weight * 0.8;
        }

        $max = max($tw,$ew,$cw);

        $expert=\app\models\ExpertAccount::find()->where(['id'=>Yii::$app->user->id])->one();

        if($max==$tw)
        {
            $expert->role='Technical';
            $expert->save();
        }
        else if($max==$ew) {
            $expert->role='Economical';
            $expert->save();
        }
        else {
            $expert->role='Creative';
            $expert->save();
        }

        return $this->render('update', [
                'model' => $this->findModel($id),
            ]);
    }
}
