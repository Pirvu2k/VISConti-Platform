<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

$this->title = 'Update Canvas: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="canvas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
