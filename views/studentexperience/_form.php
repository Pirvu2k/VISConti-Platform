<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentExperience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_description')->textarea(['rows'=>'4']) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?php 
                    $items=[];
                    for($i=1900;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'from')->dropDownList($items,['prompt'=>'Select start year.' ]);

                ?>

    <?php 


                    echo $form->field($model, 'to')->dropDownList($items,['prompt'=>'Select end year.' ]);

                ?>

    <div class="form-group">
        <p><?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right' , 'style' => 'margin-right:50%']) ?>
            <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-danger']) ?>
        </p>
    </div>

    <?php ActiveForm::end(); ?>

</div>
