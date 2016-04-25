<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\captcha\CaptchaValidator;
use yii\captcha\CaptchaAction;
use app\models\Languages;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Canvas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="canvas-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false],['enctype' => 'multipart/form-data']); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 1])->textInput(['placeholder' => '5-50 Characters']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->widget(letyii\tinymce\Tinymce::className() , ['options' => ['rows'=>20],
        'configs' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "textcolor",
        ],
        'toolbar' => "undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link "
        ],

    ]) ?>

    <?php 
                $items = ArrayHelper::map(Languages::find()->all(), 'name', 'name');
                 echo $form->field($model, 'language')->dropDownList($items,['prompt'=>'Please select language.'  ]);

            ?>

    <?= $form->field($model, 'eng_summary')->textarea(['rows' => 2])->textInput(['placeholder' => '10-120 Characters']) ?>

    <?php

	echo \kato\DropZone::widget([  
		'options' => [
			'url' => 'uploads',
			'maxFilesize' => '2',
			'clientEvents' => [
				'complete' => "function(file){console.log(file)}",
				'removedfile' => "function(file){alert(file.name + ' is removed')}"
		]
		],
	]);
	   
	   echo '</br>';
	?>

    <?php if(Yii::$app->user->identity->type == 'e')
    {
    	echo $form->field($model,'requested')->radioList(['Accepted'=>'Accepted' , 'In queue'=>'In queue' ,'Declined'=>'Declined']);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
