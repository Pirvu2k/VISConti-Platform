<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form ActiveForm */
?>
<div class="loginstudent">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'created on') ?>
        <?= $form->field($model, 'last_modified_on') ?>
        <?= $form->field($model, 'last_login_activity') ?>
        <?= $form->field($model, 'password_exp_date') ?>
        <?= $form->field($model, 'trash') ?>
        <?= $form->field($model, 'agreed_terms') ?>
        <?= $form->field($model, 'confirmed') ?>
        <?= $form->field($model, 'given_name') ?>
        <?= $form->field($model, 'family_name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'birth_year') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'mobile') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'fax') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- loginstudent -->
