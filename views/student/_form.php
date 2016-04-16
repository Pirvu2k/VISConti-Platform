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

    <?php $form = ActiveForm::begin(); ?>
    <hr class="colorgraph">
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
    <hr class="colorgraph">
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

    <hr class="colorgraph">
    <h3> Education </h3>
    <hr class="colorgraph"> 

    <?php 
        $items = ArrayHelper::map(Sector::find()->all(), 'id', 'name');
         echo $form->field($model, 'sector')->dropDownList($items,['prompt'=>'Please select your sector.' , 'onchange' => '$.post ("index.php?r=site/lists&id=' . '"+$(this).val(), function(data) { $("select#studentaccount-sub_sector").html(data); });' ]);

         $items = ArrayHelper::map(SubSector::find()->all(), 'id', 'name');
         echo $form->field($model, 'sub_sector')->dropDownList($items,['prompt'=>'Please select your sub-sector.'  ]);
    ?>

    <iframe width="975" height="300" src="<?php echo Yii::$app->urlManager->createUrl('studenteducation/index');?>" frameBorder="0"></iframe>

    <hr class="colorgraph">
    <h3> Experience </h3>
    <hr class="colorgraph"> 

    <iframe width="975" height="300" src="<?php echo Yii::$app->urlManager->createUrl('studentexperience/index');?>" frameBorder="0"></iframe>

    <hr class="colorgraph">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update Profile', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success pull-right' , 'style' => 'margin-right:50%']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
