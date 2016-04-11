<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpertEducation */

$this->title = 'Update Expert Education: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expert Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="expert-education-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
