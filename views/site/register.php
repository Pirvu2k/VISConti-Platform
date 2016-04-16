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
        <div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<h2>Please Sign Up <small>It's free and always will be.</small></h2>
				<hr class="colorgraph">

				<div class="panel-body">
					<?php $form = ActiveForm::begin([
						'fieldConfig' => [
							'template' => "<div class=\"col-lg-13\">{input}</div></br><div class=\"col-lg-12\">{error}</div>",
						],
						//'enableAjaxValidation'   => true,
						//'enableClientValidation' => true,
					]); ?>

					<?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']]) ?> 

					<p style="color:red;"><?= Yii::$app->session->getFlash('error'); ?> </p>

					<?php // $form->field($model, 'username') ?>
				 
					<?= $form->field($model, 'type', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']])->dropdownList(['s' => 'Student','e'=>'Expert'] , ['prompt' => 'Please select a role.']) ?>
					
					<?= $form->field($model, 'password', ['inputOptions' => ['placeholder' => 'Password', 'autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']])->passwordInput() ?>

					<?= $form->field($model, 'captcha')->widget(Captcha::className(),['captchaAction' => '/site/captcha', 'options' => ['placeholder' => 'Captcha', 'autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1'],
						'template' => '<div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
									{image}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-9">
                                <div class="form-group">
                                    {input}
                                </div>
                            </div>
                        </div>'
					]) ?>


					<?= Html::submitButton('Create Account', ['class' => 'btn btn-success btn-block']) ?>

					<?php ActiveForm::end(); ?>
				</div>
			
				<hr class="colorgraph">
            </div>
        </div>

        <p class="text-center">
            <?= Html::a('Already registered? Sign in!', ['/site/login']) ?>
        </p>
    </div>
