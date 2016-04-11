<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentExperience */

$this->title = 'Add Work Experience';
$this->params['breadcrumbs'][] = ['label' => 'Student Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="student-experience-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
