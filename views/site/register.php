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
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\captcha\CaptchaValidator;
use yii\captcha\CaptchaAction;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    //'enableAjaxValidation'   => true,
                    //'enableClientValidation' => true,
                ]); ?>

                <?= $form->field($model, 'email') ?> 

                <p style="color:red;"><?= Yii::$app->session->getFlash('error'); ?> </p>

                <?php // $form->field($model, 'username') ?>
             
                <?= $form->field($model, 'type')->dropdownList(['' => 'Please select a role', 's' => 'Student','e'=>'Expert']) ?>
                
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'captcha')->widget(Captcha::className(),['captchaAction' => '/site/captcha']) ?>

                <?= Html::submitButton('Create Account', ['class' => 'btn btn-success btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a('Already registered? Sign in!', ['/site/loginall']) ?>
        </p>
    </div>
</div>
