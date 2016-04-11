<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExpertAccountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-account-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_on') ?>

    <?= $form->field($model, 'last_modified_on') ?>

    <?= $form->field($model, 'trash') ?>

    <?= $form->field($model, 'last_login_activity') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'given_name') ?>

    <?php // echo $form->field($model, 'family_name') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'byear') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'reset_pass_exp_date') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'terms') ?>

    <?php // echo $form->field($model, 'confirmed') ?>

    <?php // echo $form->field($model, 'active_projects') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
