<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpertEducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expert Educations';
$this->params['breadcrumbs'][] = $this->title;
?>

<link href="../web/css/site.css" rel="stylesheet" />

<div class="expert-education-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Degree', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'degree',
            'institution',
            'from',
            // 'degree_details',
             'to',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
