<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Button;
/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="canvas-view">
    
<div id="content">
        <main id="new" class="container">
            <div class="row">
                <h3><?= $model->title ?>
                         <div class="pull-right">
                         <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                            <div>
                </h3> 
                
                <hr class="colorgraph">
                <?= $model->content ?>
                <hr class="colorgraph">
                <h3>Project status</h3>
                <div class="row">
                    <div class="col-xs-6 col-md-2">
                        <b>Students</b>
                        </br>
                        <?= $model->created_by ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Evaluators</b>
                        </br>
                        <?= $model->assigned_to ?>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <b>Attachments</b>
                        </br>
                        TBI
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <b>Stage</b>
                        </br>
                        <div class="pull-left">
                            <?= $model->requested ?>
                        </div>
                        <div class="pull-right">
                            No
                        </div>
                    </div>
                </div>
                </br>
                <div class="col-xs-6 col-md-10">
                    <span class="menu pull-right">
  <a class="btn silver" data-target="#" href="">Comments <span class="caret"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#">TBI</a>
                        </li>
                        <li>
                            <a href="#">TBI </a>
                        </li>
                    </ul>
                    </span>
                </div>

            </div>
            <div class="row">

                <h2>Activities/Actions</h2>

                <ul class="col-md-10 col-sm-9 feed">
                    <li>
                        <h2 class="col-sm-12"><a href="#">Project 1</a></h2>
                        <div class="col-sm-12 clearfix">
                            <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                            </data>
                        </div>
                        <time>Two hours ago by <a href="">Student 1</a>
                        </time>
                        </br>
                    </li>
                    <li>
                        <h2 class="col-sm-12"><a href="#">Project 2</a></h2>
                        <div class="col-sm-12 clearfix">
                            <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                            </data>
                        </div>
                        <time>Two hours ago by <a href="">Student 1</a>
                        </time>
                        </br>
                    </li>

                    <button class="btn orange">Log activity/action</button>

                </ul>

            </div>
        </main>
    </div>
<?=   \spanjeta\comments\CommentsWidget::widget(['model'=>$model]); ?>
</div>
