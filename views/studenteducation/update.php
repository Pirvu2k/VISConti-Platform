<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */

$this->title = 'Update Student Education: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<link href="../web/css/site.css" rel="stylesheet" />
<div class="student-education-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
