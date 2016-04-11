<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ExpertAccount */

$this->title = 'Create Expert Account';
$this->params['breadcrumbs'][] = ['label' => 'Expert Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
