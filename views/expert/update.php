<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpertAccount */

$this->title = 'Update Profile ';
$this->params['breadcrumbs'][] = ['label' => 'Expert Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expert-account-update">

    <h1><?= Html::encode($this->title) ?> </h1>
    <p class="text-center"> Note : Press 'Update Profile' at the bottom of the page to save changes. </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php
		if(!empty(Yii::$app->session->getFlash('error')))
			echo '<script> alert("'.Yii::$app->session->getFlash('error').'");</script>';
	?>
</div>
