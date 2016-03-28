<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Country;
/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <h1>Personal Info</h1>
                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'bio')->textarea() ?>

                <?= $form->field($model, 'public_email') ?>

                <?php 
                    $items=[];
                    for($i=1900;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'byear')->dropDownList($items,['value'=> $model->byear ]);

                ?>

                <?= $form->field($model, 'website') ?>

                <h1> Contact Info </h1>

                

                <?= $form->field($model, 'phone_number') ?>

                <?= $form->field($model, 'fax_number') ?>

                <?php 
                    $items = ArrayHelper::map(Country::find()->all(), 'country_name', 'country_name');
                    echo $form->field($model, 'country')->dropDownList($items,['value'=> $model->country ]);

                ?>

                <?= $form->field($model, 'state') ?>

                <?= $form->field($model, 'city') ?>

                <?= $form->field($model, 'address') ?>

                <?= $form->field($model, 'zip') ?>

                <h1> Education </h1>

                <?= $form->field($model, 'degree')->dropDownList(['Associate' => 'Associate', 'Bachelor' => 'Bachelor', 'Master'=>'Master', 'PhD'=>'PhD'], ['value'=>$model->country]) ?>

                <?= $form->field($model, 'degree_details') ?>

                <?= $form->field($model, 'institution_name') ?>

                <?php 
                    $items=[];
                    for($i=1960;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'start_year')->dropDownList($items,['value'=> $model->start_year ]);

                ?>


                <?php 
                    $items=[];
                    for($i=1960;$i<=2016;$i++)
                        $items[$i]=$i;

                    echo $form->field($model, 'end_year')->dropDownList($items,['value'=> $model->end_year ]);

                ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
