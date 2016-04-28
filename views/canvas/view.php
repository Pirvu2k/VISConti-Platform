<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use app\models\ExpertCanvas;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canvas-view">
    
<div id="content">
        <main id="new" class="container">
            <div class="row">
                <h3><?= $model->title ?> 
                         <div class="pull-right">

                         <?php
                            
                            $record = ExpertCanvas::find()->where(['expert'=>Yii::$app->user->id , 'project' => $model->id , 'status' => 'Pending'])->one(); 

                            if(Yii::$app->user->identity->type == 'e' && !is_null($record))
                            {
                                
                                echo Html::a('Accept Project', ['confirm', 'id' => openssl_encrypt($record->id, 'AES-128-ECB', '12345678abcdefgh')], ['class' => 'btn btn-info']);
                            }

                             if($model->status == 'Submitted' && Yii::$app->user->identity->type == 's' && $model->created_by == Yii::$app->user->id)
                            {

                                echo Html::a('Find Evaluators', ['update', 'id' => $model->id], ['class' => 'btn btn-success']);
    
                            }

                            
                        ?>
                            
                            </div>
                    </h3>
                 
                <?php
                    if($model->status == 'Submitted' && Yii::$app->user->identity->type == 's' && $model->created_by == Yii::$app->user->id){
                        echo '<div class="alert alert-danger">
                                <strong>Attention!</strong> Your project is not evaluated on all domains! Press the \'Find Evaluators \' button to search for available experts and do your last-minute changes on the project.
                            </div>';
                    }
                ?>
                <hr class="colorgraph">
                <?= $model->content ?>
                <hr class="colorgraph">
                <h3>Project status</h3>
                <div class="row">
                    <div class="col-xs-6 col-md-2">
                        <b>Student</b>
                        </br>
                        <?= $student ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Evaluators</b>
                        </br>
                        <?php
                            foreach($experts as $e)
                            {
                                echo '<p>' . $e . '</p>';
                            }
                         ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Attachments</b>
                        </br>
                        TBI
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <b>Stage</b>
                        </br>
                        <div class="pull-left">
                            <?= $model->status ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="pull-left">
                           <p> <b>Sector:</b> <?= $sector ?> </p>
                           <p> <b>Sub-sector:</b> <?= $subsector ?> </p>
                        </div>
                    </div>
                </div>
                </br>

            </div>
            <div class="row">
            <?php 
                if(!empty($expertCanvasRecord) && empty($expertCanvasRecord->score) && empty($formModel->score) && $expertCanvasRecord->status == 'Active')
                {
            ?>
            
                <h2> Add score </h2>
                <?php $form=ActiveForm::begin([]); ?>

                <?= $form->field($formModel , 'score')->textInput(['placeholder' => '1-100']); ?>

                <p> Please provide some arguments/notes along with your score. </p>

                <?= $form->field($formModel, 'note')->textArea(['placeholder' => '50-300 Characters' , 'rows' => 3]); ?>

                <div class="form-group">
                     <?= Html::submitButton('Add Score', ['class' => 'btn btn-info' , 'data-confirm' => 'Are you sure you want to finish evaluation for this project and add score? THIS ACTION IS IRREVERSIBLE! ']); ?>
                </div>

                <?php ActiveForm::end(); ?>
            
            <?php } else if(!empty($expertCanvasRecord)&& $expertCanvasRecord->status == 'Active') {

                            echo '<h4> Your score for this project:<b> '. (!empty($expertCanvasRecord->score) ? $expertCanvasRecord->score : $formModel->score) .'</b></h4>'; 
                            echo  '<p><b> Your notes: </b>' . (!empty($expertCanvasRecord->notes) ? $expertCanvasRecord->notes : $formModel->note) . '</p>';

                        }
            ?>
            </div>
            <div class="row">

                <h2>Activities/Actions</h2>

                <ul class="col-md-10 col-sm-9 feed">
                    <li>
                        <h2 class="col-sm-12"><a href="#">Project 1</a></h2>
                        <div class="col-sm-12">
                            <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                            </data>
                        </div>
                        <time>Two hours ago by <a href="">Student 1</a>
                        </time>
						<div class="clearfix visible-*"></div>
                    </li>
                    <li>
                        <h2 class="col-sm-12"><a href="#">Project 2</a></h2>
                        <div class="col-sm-12">
                            <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                            </data>
                        </div>
                        <time>Two hours ago by <a href="">Student 1</a>
                        </time>
                        <div class="clearfix visible-*"></div>
                    </li>
					</br>
                    <button class="btn orange">Log activity/action</button>

                </ul>

            </div>
        </main>
    </div>
<?=   \spanjeta\comments\CommentsWidget::widget(['model'=>$model]); ?>
</div>
