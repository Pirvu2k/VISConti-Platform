<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_on',
            'last_modified_on',
            'last_login_activity',
            'trash',
            // 'given_name',
            // 'family_name',
            // 'email:email',
            // 'birth_year',
            // 'password',
            // 'password_exp_date',
            // 'mobile',
            // 'phone',
            // 'fax',
            // 'agreed_terms',
            // 'confirmed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
