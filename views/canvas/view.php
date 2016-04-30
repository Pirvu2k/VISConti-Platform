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

$checkUser = (Yii::$app->user->identity->type == 's' && $student->email == Yii::$app->user->identity->email) || (Yii::$app->user->identity->type == 'e' && !empty($expertCanvasRecord)); // checks if current user is part of project

$tech_check=false;
$creative_check=false;
$economical_check=false;

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
                        <?php
                            if(!empty($student->given_name) && !empty($student->family_name))
                                $studentname = $student->given_name . ' ' . $student->family_name;
                            else $studentname = $student->email;

                            echo '<a href="index.php?r=student/view&id='. $student->id . '"><p>' . $studentname . '</p></a>';
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Evaluators</b>
                        </br>
                        <?php
                            foreach($experts as $e)
                            {
                                if(!empty($e->given_name) && !empty($e->family_name))
                                    {
                                        $ename = $e->given_name . ' ' . $e->family_name;
                                    }
                                else $ename = $e->email;
                                echo '<a href="index.php?r=expert/view&id='. $e->id . '"><p>' . $ename . '</p></a>';
                            }
                         ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Attachments</b>
                        </br>
                        <?php
                            foreach($attachments as $attachment)
                            {
                        ?>
                                <a href="uploads/<?= $attachment->attachment_name ?>" target="_blank"> <p style="word-break:break-all;"> <?= $attachment->attachment_name ?></p> </a>
                        <?php
                            } if (empty($attachments)) echo '<p> No attachments. </p>';
                        ?>
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
                        <h4> Overall Technical Score: <b><?= ($model->overall_technical == 0 ? 'Not set' : $model->overall_technical) ?></b></h4> 
                </div>

                <div class="col-xs-6 col-md-4">
                        <h4> Overall Economical Score: <b><?= ($model->overall_economical == 0 ? 'Not set' : $model->overall_economical) ?></b></h4> 
                </div>

                <div class="col-xs-6 col-md-4">
                        <h4> Overall Creative Score: <b><?= ($model->overall_creative == 0 ? 'Not set' : $model->overall_creative) ?></b></h4> 
                </div>
            
                </div>

                <div class="row">
                    <hr class="colorgraph">
                </div>


            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <h3> Creativity - Value Proposition </h3>
                    <br>
                    <ul style="list-style-type:none;margin-left:-30px;">
                        <?php if(!empty($model->selling)) { $creative_check=true; ?>
                        <li>
                            <h4><b>What is my project selling?</b></h4>

                            <p style="word-break:break-all"> <?= $model->selling ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->outstanding)) { $creative_check=true; ?>
                        <li>
                            <h4><b> Why is it outstanding? </b></h4>

                            <p style="word-break:break-all"> <?= $model->outstanding ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->benefits)) { $creative_check=true; ?>
                        <li>
                            <h4><b>  What are the benefits for users?</b> </h4>

                            <p style="word-break:break-all"> <?= $model->benefits ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->marketed)) { $creative_check=true; ?>
                        <li>
                            <h4><b>  How will it be marketed? </b></h4>

                            <p style="word-break:break-all"> <?= $model->marketed ?> </p>
                        </li>
                        <?php
                            } if (!$creative_check) echo '<h4> Not completed by student. </h4>';
                        ?>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h3> Technical – Key Activities </h3>
                    <br>
                    <ul style="list-style-type:none;margin-left:-30px;">
                        <?php if(!empty($model->partners)) { $tech_check=true; ?>
                        <li>
                            <h4><b>Who might be the key partners in developing my project?</b></h4>

                            <p style="word-break:break-all"> <?= $model->partners ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->tech_resources)) { $tech_check=true; ?>
                        <li>
                            <h4><b> What technical resources/key activities would be required? </b></h4>

                            <p style="word-break:break-all"> <?= $model->tech_resources?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->risk)) { $tech_check=true; ?>
                        <li>
                            <h4><b> What could go wrong? </b> </h4>

                            <p style="word-break:break-all"> <?= $model->risk ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->impact)) { $tech_check=true; ?>
                        <li>
                            <h4><b>  Does it have any social or environmntal impact? </b></h4>

                            <p style="word-break:break-all"> <?= $model->impact ?> </p>
                        </li>
                        <?php
                            } if (!$tech_check) echo '<h4> Not completed by student. </h4>';
                        ?>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h3> Financial - Revenue streams </h3>
                    <br>
                    <ul style="list-style-type:none;margin-left:-30px;">
                        <?php if(!empty($model->fin_resources)) { $economical_check=true; ?>
                        <li>
                            <h4><b>What financial resources would be needed to develop the project?</b></h4>

                            <p style="word-break:break-all"> <?= $model->fin_resources ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->customers)) { $economical_check=true; ?>
                        <li>
                            <h4><b> Who are the customers? </b></h4>

                            <p style="word-break:break-all"> <?= $model->customers ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->generate)) { $economical_check=true; ?>
                        <li>
                            <h4><b> How would revenue be generated? </b> </h4>

                            <p style="word-break:break-all"> <?= $model->generate ?> </p>
                        </li>
                        <?php
                            }
                        ?>
                        <?php if(!empty($model->costs)) { $economical_check=true; ?>
                        <li>
                            <h4><b> What are the costs involved? </b></h4>

                            <p style="word-break:break-all"> <?= $model->costs ?> </p>
                        </li>
                        <?php
                            } if (!$economical_check) echo '<h4> Not completed by student. </h4>';
                        ?>
                    </ul>
                </div>
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
                        <h2 class="col-sm-12"><a href="#"><?= $activity->action_type ?></a></h2>												<span class="pull-right"><time>At <?= $activity->created_on ?> by <a href=""><?= $activity->getName() ?> </a></time></span>
                        <div class="col-sm-12">
                            <data style="word-break:break-all;"><b><?= $activity->activity_text ?></b>
                            </data>
                        </div>
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
<?php if($checkUser) {

        echo \spanjeta\comments\CommentsWidget::widget(['model'=>$model]); 

        }
?>
</div>
