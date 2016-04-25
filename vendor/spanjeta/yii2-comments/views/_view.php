<?php
use yii\helpers\Html;

if($model->type_user==1) {
	require_once "expert.php";
	$expert = new Expert();
	$expert = Expert::find()->where(['id'=>$model->create_user_id])->one();
}
else {
	require_once "student.php";
	$student = new Student();
	$student = Student::find()->where(['id'=>$model->create_user_id])->one();
}
?>
<?php  ?>
	<div class="comment-view well">

	<p><?=$model->comment?></p>

	<p><small class="pull-left">Posted By: 
	<?php
		if($model->type_user==1) {
			echo '<a href="index.php?r=expert/view&id=' . $model->create_user_id . '">';
			if(!empty($expert->given_name) || !empty($expert->family_name))
				echo '<i class="glyphicon glyphicon-user" style="margin-right:10px;"></i>'.$expert->given_name.' '.$expert->family_name;
			else
				echo '<i class="glyphicon glyphicon-envelope" style="margin-right:10px;"></i>'.$expert->email;
			echo '</a>';
		}
		else {
			echo '<a href="index.php?r=student/view&id=' . $model->create_user_id . '">';
			if(!empty($student->given_name) || !empty($student->family_name))
				echo '<i class="glyphicon glyphicon-user" style="margin-right:10px;"></i>'.$student->given_name.' '.$student->family_name;
			else
				echo '<i class="glyphicon glyphicon-envelope" style="margin-right:10px;"></i>'.$student->email;
			echo '</a>';
		}
	?>
	</small>
	<small class="pull-right">On <?= $model->create_time?></small></p>

	</div>
<?php  ?>