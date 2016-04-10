<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */

$this->title = 'Create Student Education';
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="student-education-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
