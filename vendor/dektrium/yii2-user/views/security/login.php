<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

    <div class="row">
        <h1>Login Portal</h1>
    </div>
    <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<fieldset>
					<h2>Please <?= Html::encode($this->title) ?></h2>
					<hr class="colorgraph">
					<?php $form = ActiveForm::begin([
						'id'                     => 'login-form',
						'enableAjaxValidation'   => true,
						'enableClientValidation' => false,
						'validateOnBlur'         => false,
						'validateOnType'         => false,
						'validateOnChange'       => false,
					]) ?>

					<?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']]) ?>

					<?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control input-lg', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' : '')) ?>

					<?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'green col-sm-12', 'tabindex' => '3']) ?>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
							<?php if ($module->enableRegistration): ?>
								<p class="text-center">
									<?= Html::a(Yii::t('user', '<button type="button" class="purple col-sm-12">Register</button>'), ['/user/registration/register']) ?>
								</p>
							<?php endif ?>
                        </div>
                    </div>
					
					<hr class="colorgraph">

					<?php ActiveForm::end(); ?>
					
					<?php if ($module->enableConfirmation): ?>
						<p class="text-center">
							<?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
						</p>
					<?php endif ?>
					
				</fieldset>
			</div>

        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
    </div>