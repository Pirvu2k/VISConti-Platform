<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Degrees;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\ExpertEducation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
                $items = ArrayHelper::map(Degrees::find()->all(), 'code', 'code');
                 echo $form->field($model, 'degree')->dropDownList($items,['prompt'=>'Please select degree.'  ]);

            ?>

    <?= $form->field($model, 'institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'degree_details')->textarea(['rows'=>'4']) ?>

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
