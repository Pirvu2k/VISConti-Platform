<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpertExperience */

$this->title = 'Create Expert Experience';
$this->params['breadcrumbs'][] = ['label' => 'Expert Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="expert-experience-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
