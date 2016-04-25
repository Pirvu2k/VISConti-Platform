<div class="comment-view">
<?php if ($model &&  !Yii::$app->user->isGuest) {?>
<?=

	$this->render ( '_form', [ 
			'model' => $model 
	] )?>

    <?php }?>
<?php
echo \yii\widgets\ListView::widget([
     'dataProvider' => $comments,
     'itemOptions' => ['class' => 'item'],
<<<<<<< HEAD
=======
     'summary' => '',
>>>>>>> c9579b21655241726d9f05fe4c86b60466b84d15
     'itemView' => '_view',
]);
?>
</div>

