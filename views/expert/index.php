<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpertAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expert Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expert Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_on',
            'last_modified_on',
            'trash',
            'last_login_activity',
            // 'title',
            // 'given_name',
            // 'family_name',
            // 'email:email',
            // 'byear',
            // 'password',
            // 'reset_pass_exp_date',
            // 'country',
            // 'mobile',
            // 'phone',
            // 'fax',
            // 'terms',
            // 'confirmed',
            // 'active_projects',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
