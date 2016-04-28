<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
use app\models\ExpertCanvas;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$checkUser = (Yii::$app->user->identity->type == 's' && ($student == Yii::$app->user->identity->email || $student == Yii::$app->user->identity->given_name . ' ' . Yii::$app->user->identity->family_name)) || (Yii::$app->user->identity->type == 'e' && !empty($expertCanvasRecord)); // checks if current user is part of project

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

            <?php 
                if($checkUser) {
            ?>
                
                <div class="row">
                    <hr class="colorgraph">
                </div>

                <div class="row">

                <div class="col-xs-6 col-md-4">
                        <p> Overall Technical Score: <b><?= ($model->overall_technical == 0 ? 'Not set' : $model->overall_technical) ?></b></p> 
                </div>

                <div class="col-xs-6 col-md-4">
                        <p> Overall Economical Score: <b><?= ($model->overall_economical == 0 ? 'Not set' : $model->overall_economical) ?></b></p> 
                </div>

                <div class="col-xs-6 col-md-4">
                        <p> Overall Creative Score: <b><?= ($model->overall_creative == 0 ? 'Not set' : $model->overall_creative) ?></b></p> 
                </div>
            
                </div>

                <div class="row">
                    <hr class="colorgraph">
                </div>



            <?php
                }
            ?>

            <div class="row">
            <?php 
                if(!empty($expertCanvasRecord) && empty($expertCanvasRecord->score) && $expertCanvasRecord->status == 'Active')
                {
            ?>
            
                <h2> Add score </h2>
                <?php $form=ActiveForm::begin(['enableClientValidation' => true]); ?>

                <?= $form->field($scoreModel , 'score')->textInput(['placeholder' => '1-100']); ?>

                <p> Please provide some arguments/notes along with your score. </p>

                <?= $form->field($scoreModel, 'note')->textArea(['placeholder' => '25-255 Characters' , 'rows' => 3]); ?>

                <div class="form-group">
                     <?= Html::submitButton('Add Score', ['class' => 'btn btn-info' , 'data-confirm' => 'Are you sure you want to finish evaluation for this project and add score? THIS ACTION IS IRREVERSIBLE! ']); ?>
                </div>

                <?php ActiveForm::end(); ?>
            
            <?php } else if(!empty($expertCanvasRecord)&& $expertCanvasRecord->status == 'Active') {

                            echo '<h4> Your score for this project:<b> '. $expertCanvasRecord->score .'</b></h4>'; 
                            echo  '<p style ="word-break:break-all;"><b> Your notes: </b>' . $expertCanvasRecord->notes . '</p>';

                        }
            ?>
            </div>

            <div class="row">

                <?php
                    if($checkUser) {
                ?>

                    <h2> Add note </h2>

                    <?php $form=ActiveForm::begin(['enableClientValidation' => true]); ?>

                    <?= $form->field($noteModel, 'note')->textArea(['placeholder' => '10-255 Characters' , 'rows' => 3]); ?>

                    <div class="form-group">
                         <?= Html::submitButton('Add Note', ['class' => 'btn btn-info' , 'data-confirm' => 'Are you sure you want to add this note?It can\'t be removed afterwards.']); ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                <?php
                    }
                ?>
            </div>

            <div class="row">

                <h2>Activities</h2>

                <ul class="col-md-10 col-sm-9 feed">
                    <?php
                        foreach($activities as $activity) {
                    ?>
                    <li>
                        <h2 class="col-sm-12"><a href="#"><?= $activity->action_type ?></a></h2>
                        <div class="col-sm-12">
                            <data style="word-break:break-all;"><b><?= $activity->activity_text ?></b>
                            </data>
                        </div>
                        <time>At <?= $activity->created_on ?> by <a href=""><?= $activity->getName() ?> </a>
                        </time>
						<div class="clearfix visible-*"></div>
                    </li>
                    <?php
                    }
					echo LinkPager::widget([
						'pagination' => $activities_pages,
					]);
					if (empty($activities)) echo 'No activities/actions to show.';
                    ?>
                    
                    <!-- <button class="btn orange">Log activity/action</button> -->

                </ul>

            </div>
        </main>
    </div>
<?=   \spanjeta\comments\CommentsWidget::widget(['model'=>$model]); ?>
</div>
