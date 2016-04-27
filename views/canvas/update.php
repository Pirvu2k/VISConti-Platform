<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Canvas */

$this->title = 'Update Canvas: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Canvas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="canvas-update">



    <h1><?= Html::encode($this->title) ?></h1>

    <?php
                    if($model->status == 'Submitted'){
                        echo '<div class="alert alert-info">
                                <strong>Hey!</strong> Before your project gets reviewed, you can still update any information. When you\'re ready , just press \'Update\' at the bottom of the page and we\'ll try to find an evaluator for you as soon as possible! 
                            </div>';
                    }
                ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php

if(!empty($error))
{
	echo '<script> alert("'. $error .'"); </script>';
}

?>