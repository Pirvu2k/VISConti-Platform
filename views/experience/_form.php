<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Experience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?php 
                    $items=[];
                    for($i=1960;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'from')->dropDownList($items,['value'=> $model->from  ,'prompt'=>'Please select start year.']);

                ?>

    <?php 
                    $items=[];
                    for($i=1960;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'to')->dropDownList($items,['value'=> $model->to , 'prompt'=>'Please select end year.' ]);

                ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
