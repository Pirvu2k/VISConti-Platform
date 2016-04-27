<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use app\models\Sector;
use app\models\SubSector;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\StudentAccount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-account-form">
	<div class="status-bar">
		<section class="status-bar">
			<div class="container">
				<div class="row">
					<ul id="tabs" class="nav nav-pills" data-tabs="tabs">
						<li class="active"><a href="#1" data-toggle="tab">Personal Info</a>
						</li>
						<li><a href="#2" data-toggle="tab">Contact Info</a>
						</li>
						<li><a href="#3" data-toggle="tab">Education</a>
						</li>
						<li><a href="#4" data-toggle="tab">Experience</a>
						</li>
					</ul>
				</div>
			</div>
		</section>
	</div>
    <?php $form = ActiveForm::begin(); ?>
	<div id="profile-tab-content" class="tab-content">
		<div class="tab-pane active" id="1">
			<h3> Personal Info </h3>
			<hr class="colorgraph">
			<?= $form->field($model, 'given_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'bio')->textarea(['rows'=>'4']) ?>

			<?php 
							$items=[];
							for($i=1900;$i<=2016;$i++)
								$items[$i]=$i;

							echo $form->field($model, 'birth_year')->dropDownList($items,['prompt'=>'Please select your birth year.' ]);

						?>
		</div>
		<div class="tab-pane" id="2">
			<h3> Contact Info </h3>
			<hr class="colorgraph"> 
			<?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

			<?php 
				$items = ArrayHelper::map(Country::find()->all(), 'country_name', 'country_name');
				 echo $form->field($model, 'country')->dropDownList($items,['prompt'=>'Please select your country.'  ]);

			?>

			<?= $form->field($model, 'state') ?>

			<?= $form->field($model, 'city') ?>

			<?= $form->field($model, 'address') ?>

			<?= $form->field($model, 'zip') ?>

		</div>
		<div class="tab-pane" id="3">
			<h3> Education </h3>
			<hr class="colorgraph"> 

			<?php 
				$items = ArrayHelper::map(Sector::find()->all(), 'id', 'name');
				 echo $form->field($model, 'sector')->dropDownList($items,['prompt'=>'Please select your sector.' , 'onchange' => '$.post ("index.php?r=site/lists&id=' . '"+$(this).val(), function(data) { $("select#studentaccount-sub_sector").html(data); });' ]);

				 $items = ArrayHelper::map(SubSector::find()->all(), 'id', 'name');
				 echo $form->field($model, 'sub_sector')->dropDownList($items,['prompt'=>'Please select your sub-sector.'  ]);
			?>

			<iframe width="100%" height="300" src="<?php echo Yii::$app->urlManager->createUrl('studenteducation/index');?>" frameBorder="0"></iframe>

		</div>
		<div class="tab-pane" id="4">
			<h3> Experience </h3>
			<hr class="colorgraph"> 
			<iframe width="100%" height="300" src="<?php echo Yii::$app->urlManager->createUrl('studentexperience/index');?>" frameBorder="0"></iframe>

		</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update Profile', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success pull-right' , 'style' => 'margin-right:50%']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
