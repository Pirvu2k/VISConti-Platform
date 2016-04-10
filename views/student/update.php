<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentAccount */

$this->title = 'Update Profile';
$this->params['breadcrumbs'][] = ['label' => 'Student Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
