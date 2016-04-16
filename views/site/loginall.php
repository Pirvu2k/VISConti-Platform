<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="row">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
	
    <div class="row" style="margin-top:20px">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<fieldset>
					<h2>Please fill out the following fields to login:</h2>
					<hr class="colorgraph">
	
	
					<?php $form = ActiveForm::begin([
						'id' => 'login-form',
						'options' => ['class' => 'form-horizontal'],
						'fieldConfig' => [
							'template' => "<div class=\"col-lg-12\">{input}</div></br><div class=\"col-lg-12\">{error}</div>",
						],
					]); ?>

						<?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']]) ?>

						<?= $form->field($model, 'password', ['inputOptions' => ['placeholder' => 'Password', 'autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']])->passwordInput() ?>

						<?= $form->field($model, 'type', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']])->dropdownList(['s'=>'Student', 'e' => 'Expert'], ['prompt' => 'Please select a role.']);?>

						<?= $form->field($model, 'rememberMe', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control input-lg', 'tabindex' => '1']])->checkbox([
							'template' => "<div class=\"col-lg-12\">{input} {label}</div>",
						]) ?>
						
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<?= Html::submitButton('Login', ['class' => 'green col-sm-12', 'tabindex' => '3', 'name' => 'login-button']) ?>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<p class="text-center">
									<?= Html::a('<button type="button" class="purple col-sm-12">Register</button>', ['site/register']) ?>
								</p>
							</div>
						</div>
						
						<hr class="colorgraph">
				</fieldset>
			</div>


    <?php ActiveForm::end(); ?>
			</div>