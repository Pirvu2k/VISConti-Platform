<?php

use yii\helpers\Html;

$this->title = 'Confirmation';

if(!empty(Yii::$app->session->getFlash('warning'))){

?>
	<div class="alert alert-danger">
  		<strong>Danger!</strong> <?= Yii::$app->session->getFlash('warning'); ?>
	</div>
<?php
} else if(!empty(Yii::$app->session->getFlash('success'))) {
?>

	<div class="alert alert-success">
  		<strong>Success!</strong> <?= Yii::$app->session->getFlash('success') ?>
	</div>

<?php
} else return Yii::$app->response->redirect('index.php?r=site/login');
?>