<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jobs;
/* @var $this yii\web\View */
/* @var $model app\models\ExpertExperience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
                $items = ArrayHelper::map(Jobs::find()->all(), 'code', 'code');
                 echo $form->field($model, 'job_title')->dropDownList($items,['prompt'=>'Please select job title.'  ]);

            ?>

    <?= $form->field($model, 'job_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?php 
                    $items=[];
                    for($i=1940;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'from')->dropDownList($items,['prompt'=>'Select start year.' ]);

                ?>

    <?php
                    $items=[];
                    for($i=1940;$i<=2030;$i++)
                        $items[$i]=$i;
     echo $form->field($model, 'to')->dropDownList($items,['prompt'=>'Select end year.' ]); ?>



    <div class="form-group">
        <p><?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right' , 'style' => 'margin-right:50%']) ?>
            <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-danger']) ?>
        </p>
    </div>

    <?php ActiveForm::end(); ?>

</div>
