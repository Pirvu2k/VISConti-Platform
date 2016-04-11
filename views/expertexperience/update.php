<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpertExperience */

$this->title = 'Update Expert Experience: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expert Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="expert-experience-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
