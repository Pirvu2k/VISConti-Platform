<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;
use yii\helpers\ArrayHelper;
use app\models\Sector;
use app\models\SubSector;
use app\models\Specialization;
use app\models\Interest;
use app\models\ExpertSector;
use app\models\ExpertSubSector;
use app\models\ExpertSpecialization;
use app\models\ExpertInterest;

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
						<li><a href="#5" data-toggle="tab">Specialization</a>
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

			<?= $form->field($model, 'title')->dropdownList(['Mr.' => 'Mr.' , 'Ms.' => 'Ms.' , 'Mrs.' => 'Mrs.'] , ['prompt' => 'Select a Title.']) ?>

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

		</div>
		
		<div class="tab-pane" id="3">
			<h3> Education </h3>
			<hr class="colorgraph"> 

			<iframe width="100%" height="300" src="<?php echo Yii::$app->urlManager->createUrl('experteducation/index');?>" frameBorder="0"></iframe>
		</div>
		
		<div class="tab-pane" id="4">
			<h3> Experience </h3>
			<hr class="colorgraph"> 

			<iframe width="100%" height="300" src="<?php echo Yii::$app->urlManager->createUrl('expertexperience/index');?>" frameBorder="0"></iframe>

		</div>
		
		<div class="tab-pane" id="5">
			<h3> Specialization </h3>
			<hr class="colorgraph"> 
			<p> Note : Once you choose one or more items from a list, the next one will populate based on your choices.</p>
			<div class="row">
			<?php
				//----------- sectors start ---------
				$sectors = Sector::find()->all(); // get sectors

				$user_sectors = ExpertSector::find()->where(['expert' => Yii::$app->user->id])->all(); // set checkbox based on db, and hidden one aswell

				$user_subsectors = ExpertSubSector::find()->where(['expert' => Yii::$app->user->id])->all(); 

				$user_specializations = ExpertSpecialization::find()->where(['expert' => Yii::$app->user->id])->all();

				$user_interests = ExpertInterest::find()->where(['expert' => Yii::$app->user->id])->all();

				echo '<div class="col-sm-3">';
				echo '<p style="font-size:150%;"> <b>Sectors</b> </p>';

				foreach($sectors as $s )
				{   
					$value=0;
					foreach($user_sectors as $u_s){
						if($u_s->sector_id == $s->id)
						{
							$value=1;
							break;
						}
					}

					echo '<input type="checkbox" class="sector controller'. $s->id .' controller" data-container=".checkbox_container'. $s->id . '" data-target=".controlled'. $s->id .'" name="sector_'.$s->id.'" '.(($value==1) ? 'checked' : '').'> 
								 <span class="checkboxtext">'.$s->name.'</span>
							</input>
							<br>'; //echo all sectors , along with controls for subsectors
					echo '<input type="hidden" value="'.$value.'" name="hidden_sector_'.$s->id.'"></input>';
				}

				echo '</div>';
				echo '<div class="col-sm-3">';
				//------- sectors end ----------
				//------- subsectors start -----
				 

				echo '<p style="font-size:150%;"> <b>Sub-Sectors</b> </p>';

				foreach($sectors as $s)
				{   
					$subsectors = Subsector::find()->where(['sector' => $s->id])->all(); // get all subsectors for $s sector

					foreach($subsectors as $item)
					{  
						$value=0;
						foreach($user_subsectors as $u_s){
							if($u_s->subsector == $item->id)
							{
								$value=1;
								break;
							}
						}
						echo '<div class="checkcont checkbox_container'.$s->id.'">';
						echo '<input type="checkbox" data-container=".checkbox_containerspec'. $item->id . '" data-target=".controlledspec'. $item->id .'"
							 class="controlled controller controlled'.$s->id.'" name="subsector_'.$item->id.'" '.(($value==1) ? 'checked' : '').' >'.$item->name.'</input>';
						echo '<input type="hidden" value="'.$value.'" name="hidden_subsector_'.$item->id.'"></input>';
						echo '<br></div>';
					}
				}
				echo '</div>';
				//--------- subsectors end -----
				//-------- specializations start ----
				echo '<div class="col-sm-3">';

				 

				echo '<p style="font-size:150%;"> <b>Specialization</b> </p>';

				$subs = SubSector::find()->all(); // get sectors

				foreach($subs as $s)
				{   
					$specializations = Specialization::find()->where(['subsector' => $s->id])->all(); // get all specializations for $s subsector

					foreach($specializations as $item)
					{   
						$value=0;
						foreach($user_specializations as $u_s){
							if($u_s->specialization == $item->id)
							{
								$value=1;
								break;
							}
						}

						echo '<div class="checkcont checkbox_containerspec'.$s->id.'">';
						echo '<input type="checkbox" class="controlled controller controlledspec'.$s->id.'" data-container=".checkbox_containerint'. $item->id . '" data-target=".controlledint'. $item->id .'" name="specialization_'.$item->id.'"'.(($value==1) ? 'checked' : '').' >'.$item->name.'</input>';
						echo '<input type="hidden" value="'.$value.'" name="hidden_specialization_'.$item->id.'"></input>';
						echo '<br></div>';
					}
				}
				echo '</div>';
				//specializations end
				//interests start

				echo '<div class="col-sm-3">';

				 

				echo '<p style="font-size:150%;"> <b>Interests</b> </p>';

				$specs = Specialization::find()->all(); // get sectors

				foreach($specs as $s)
				{   
					$interests = Interest::find()->where(['specialization' => $s->id])->all(); // get all specializations for $s subsector

					foreach($interests as $item)
					{   
						$value=0;
						foreach($user_interests as $u_i){
							if($u_i->interest == $item->id)
							{
								$value=1;
								break;
							}
						}

						echo '<div class="checkcont checkbox_containerint'.$s->id.'">';
						echo '<input type="checkbox" class="controlled placeholder controlledint'.$s->id.'" name="interest_'.$item->id.'"'.(($value==1) ? 'checked' : '').' >'.$item->name.'</input>';
						echo '<input type="hidden" value="'.$value.'" name="hidden_interest_'.$item->id.'"></input>';
						echo '<br></div>';
					}
				}
				echo '</div>';

				//interests end
			?>

			</div>
			<br>
		<div class="row">
		<div class="col-sm-3">
		<p> Before firing role determination , please press 'Update Profile'. The following data should be filled in order for the role to be determined: </p>
		</div>
		<div class="col-sm-6">
		<ul class="list-group">
			<li class="list-group-item">At least one experience record.</li>
			<li class="list-group-item">At least one educational record.</li>
			<li class="list-group-item">At least one sector.</li>
			<li class="list-group-item">For each sector, at least one sub-sector.</li>
			<li class="list-group-item">For each sub-sector, at least one specialization.</li>
		</ul>
		</div>
		</div>
       
   		 <?php
		 	if(empty($model->role))
		 		{echo Html::a('Find my role', ['/expert/role','id'=>Yii::$app->user->id], ['class'=>'btn orange text-center']);}
		 	else
		 		{echo '<div class="alert alert-info">
  						<strong>Role:</strong> '.$model->role.'.
						</div><br>';}  
		 ?>
		
		</div>
		

	</div>

    <div class="form-group">
    	
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update Profile', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success pull-right' , 'style' => 'margin-right:50%;']) ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>

$('.controlled').each(function(){
    var $this=$(this);
    if($this.prop('checked') == false) {
        $this.hide();
        $this.parent('.checkcont').hide();
    } 
}); // disable and hide all unchecked items

$('.controlled').each(function(){
    var $this=$(this);
    if($this.prop('checked') == true) { 
            $('.'+$this.attr('class').split(' ')[2]).each(function(){
                $(this).show();
                $(this).parent('.checkcont').show();
                //show child elements
                $($(this).data('container')).show();
                $($(this).data('target')).show();
        });
    }
}); //show childs of checked items

$('.sector').each(function(){
    var $this=$(this);
    if($this.prop('checked') == true) { 
                $($(this).data('container')).show();
                $($(this).data('target')).show();
        };
});

$('.controller').click(function () { 
    var $this = $(this),
        $inputs = $($this.data('target')), //get inputs
        $containers=$($this.data('container')); // get container
    if(this.checked) {
        $inputs.show("slow");
        $containers.show("slow");
    } else 
    {
        $inputs.prop('checked', false); // uncheck all child elements if parent is unchecked
        $inputs.hide("slow");
        //alert(JSON.stringify($inputs.data('target')));
        $inputs.each(function(){
            var $childcontainers= $($(this).data('container')); //hide all 2nd+ level children
            var $childinputs= $($(this).data('target')); //uncheck all 2nd+ level children
            $childcontainers.hide("slow");
            $childinputs.prop("checked",false);
            $childinputs.each(function(){
                    $($(this).data('container')).hide("slow");
                    $($(this).data('target')).prop("checked" , false);
            });
                
        });
        $containers.hide("slow");
    }
})

</script>