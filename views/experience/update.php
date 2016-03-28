<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Experience */

$this->title = 'Update Work Experience: ' . $model->job_title . " at " . $model->institution;
$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<link href="../web/css/site.css" rel="stylesheet" />

<div class="experience-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
