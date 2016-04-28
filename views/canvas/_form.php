<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\captcha\CaptchaValidator;
use yii\captcha\CaptchaAction;
use app\models\Languages;
use yii\helpers\ArrayHelper;
use app\models\Sector;
use app\models\SubSector;
/* @var $this yii\web\View */
/* @var $model app\models\Canvas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="canvas-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false , 'options' => ['enctype'=>'multipart/form-data']]); ?>

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
                $items = ArrayHelper::map(Sector::find()->all(), 'id', 'name');
                 echo $form->field($model, 'sector')->dropDownList($items,['prompt'=>'Please select your sector.' , 'onchange' => '$.post ("index.php?r=site/lists&id=' . '"+$(this).val(), function(data) { $("select#canvas-subsector").html(data); });' ]);

                 $items = ArrayHelper::map(SubSector::find()->all(), 'id', 'name');
                 echo $form->field($model, 'subsector')->dropDownList($items,['prompt'=>'Please select your sub-sector.'  ]);
            ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

    <?php if(Yii::$app->user->identity->type == 'e')
    {
    	echo $form->field($model,'requested')->radioList(['Accepted'=>'Accepted' , 'In queue'=>'In queue' ,'Declined'=>'Declined']);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update & Find Experts', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
