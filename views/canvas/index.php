<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects ready for review: ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canvas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title:ntext',
            'eng_summary:ntext',
            'date_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
