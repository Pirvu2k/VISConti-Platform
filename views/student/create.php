<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentAccount */

$this->title = 'Create Student Account';
$this->params['breadcrumbs'][] = ['label' => 'Student Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
