<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpertEducation */

$this->title = 'Create Expert Education';
$this->params['breadcrumbs'][] = ['label' => 'Expert Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="expert-education-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
