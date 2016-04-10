<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

	$this->title ="Create Canvas";
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canvas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
