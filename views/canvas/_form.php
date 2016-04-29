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

    <?php $form = ActiveForm::begin(['enableClientValidation' => false , 'enableAjaxValidation' => false, 'options' => ['enctype'=>'multipart/form-data']]); ?>

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
    <hr class="colorgraph">
    <h3> Creativity - Value proposition </h3>
    <hr class="colorgraph">
    <ul style="list-style-type:lower-latin;">
        <li>
            <p> What is my project selling? </p>

            <?= $form->field($model, 'selling')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> Why is it outstanding? </p>

            <?= $form->field($model, 'outstanding')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> What are the benefits for users? </p>

            <?= $form->field($model, 'benefits')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> How will it be marketed? </p>

            <?= $form->field($model, 'marketed')->textarea(['rows' => 2])->label(false) ?>
        </li>
    </ul>
    <hr class="colorgraph">
    <h3> Technical viability – key activities </h3>
    <hr class="colorgraph">
    <ul style="list-style-type:lower-latin;">
        <li>
            <p> Who might be the key partners in developing my project? </p>

            <?= $form->field($model, 'partners')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> What technical resources/key activities would be required? </p>

            <?= $form->field($model, 'tech_resources')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> What could go wrong? </p>

            <?= $form->field($model, 'risk')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> Does it have any social or environmntal impact? </p>

            <?= $form->field($model, 'impact')->textarea(['rows' => 2])->label(false) ?>
        </li>
    </ul>
    <hr class="colorgraph">
    <h3> Financial viability - Revenue streams </h3>
    <hr class="colorgraph">
    <ul style="list-style-type:lower-latin;">
        <li>
            <p> What financial resources would be needed to develop the project? </p>

            <?= $form->field($model, 'fin_resources')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> Who are the customers? </p>

            <?= $form->field($model, 'customers')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> How would revenue be generated? </p>

            <?= $form->field($model, 'generate')->textarea(['rows' => 2])->label(false) ?>
        </li>
        <li>
            <p> What are the costs involved? </p>

            <?= $form->field($model, 'costs')->textarea(['rows' => 2])->label(false) ?>
        </li>
    </ul>

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

    <?php if($model->isNewRecord) { ?>

    <?= $form->field($model, 'files[]')->fileInput(['multiple' => true]) ?>

    <p> Maximum number of files : 3 . Allowed formats: png, jpg, doc, docx , pdf , ppt, pptx ,xls ,xlsx . File name must be no more than 50 characters.</p>

    <?php
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update & Find Experts', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
