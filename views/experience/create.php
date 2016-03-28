<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Experience */

$this->title = 'Add Work Experience';
$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="experience-create">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
