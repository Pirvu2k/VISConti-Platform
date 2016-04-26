<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentAccount */

$ed_check=false;
$contact_check=false;
$experience_check=false;
$personal_check=false;
$bio_check=false;
$spec_check=false;

$this->title = 'View Profile';
$this->params['breadcrumbs'][] = ['label' => 'Student Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-account-view">

    <div class="row">
	
		<div class="col-md-11 col-xs-10">
			<div class="well panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-3 text-center">
							<img src="../web/images/avatar_big.png" class="img-rounded img-responsive">
					</div>
					<div class="col-xs-12 col-sm-8">
						<h2><?php if (!empty($model->given_name) || !empty($model->family_name)) {?><i class="glyphicon glyphicon-user text-muted"></i> <?= Html::encode($model->given_name) . " " . Html::encode($model->family_name)  ?><?php } else { ?><i class="glyphicon glyphicon-envelope text-muted"></i> <?= Html::a(Html::encode($model->email), 'mailto:' . Html::encode($model->email)) ?><?php }?></h2>
						<?php if (!empty($model->website)) { ?>
							<p><strong><i class="glyphicon glyphicon-globe text-muted"></i> Website :</strong> <?= Html::a(Html::encode($model->website), Html::encode($model->website)) ?></p>
						<?php }    ?>
						<?php if (!empty($model->given_name) || !empty($model->family_name)) { $personal_check=true; ?>
							<p><strong><i class="glyphicon glyphicon-envelope text-muted"></i> E-mail :</strong> <?= Html::a(Html::encode($model->email), 'mailto:' . Html::encode($model->email)) ?></p>
						<?php } ?>
						<?php if (!empty($model->birth_year)) { ?>
							<p><strong><i class="glyphicon glyphicon-calendar text-muted"></i> Year of Birth :</strong> <?= Html::a(Html::encode($model->birth_year), Html::encode($model->birth_year)) ?></p>
						<?php } ?>
						<p><strong><i class="glyphicon glyphicon-time text-muted"></i> Joined on : </strong> <?= $model->created_on ?>
					</div>        
					<div class="clearfix"></div>
					<?php if (!empty($model->bio)) { ?>
					<div class="col-xs-12">
							<h4><strong>Bio : </strong></h4>
							<blockquote>
								<p style="word-break: break-all;width:600px;"><?= Html::encode($model->bio) ?></p>
							</blockquote>
					</div>
					<?php  } ?>
					<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-6">
						<h4><strong>Contact info : </strong></h4>
							<?php if (!empty($model->phone)) { $contact_check=true; ?>
								<p><i class="glyphicon glyphicon-earphone text-muted"></i> Phone Number :  <?= Html::a(Html::encode($model->phone)) ?></p>
							<?php  } ?>
							<?php if (!empty($model->mobile)) { $contact_check=true; ?>
								<p><i class="glyphicon glyphicon-phone text-muted"></i> Mobile Number : <?= Html::a(Html::encode($model->mobile)) ?></p>
							<?php  } ?>
							<?php if (!empty($model->country)) { $contact_check=true; ?>
								<p><i class="glyphicon glyphicon-globe text-muted"></i> Country : <?= Html::a(Html::encode($model->country)) ?> <?php if (!empty($model->state)) { ?> , <?= Html::a(Html::encode($model->state)) ?> <?php  } ?></p>
							<?php  } ?>
							<?php if (!empty($model->address)) { $contact_check=true; ?>
								<p><i class="glyphicon glyphicon-map-marker text-muted"></i> Address : <?php if (!empty($model->city)) { ?> <?= Html::a(Html::encode($model->city)) ?> , <?php  } ?> <?= Html::a(Html::encode($model->address)) ?></p>
							<?php  } ?>
							<?php if (!empty($model->zip)) { $contact_check=true; ?>
								<p><i class="glyphicon glyphicon-home text-muted"></i> Zip/Postal Code : <?= Html::a(Html::encode($model->zip)) ?></p>
							<?php  } if($contact_check == false) echo "<p>Nothing here.</p>";?>
					</div>
					<div class="col-xs-12 col-sm-6">
						<h4><strong>Education : </strong></h4>
						<?php if (!empty($education)) { $ed_check=true; ?>
							<p><i class="glyphicon glyphicon-education text-muted"></i> Studies : 
									<ul style="margin-left:25px;">
										<?php foreach($education as $item) : ?>
											<li><i class="glyphicon glyphicon-check text-muted"></i> <?= $item->degree . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
											<li style="margin-left:10px;"><i class="glyphicon glyphicon-cog text-muted"></i> Degree Details: <?= $item->degree_details ?>;</li>
										<?php endforeach; ?>
									</ul>
							</p>
						<?php  } if($ed_check == false) echo "<p>Nothing here.</p>";  ?>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-6">
						<h4><strong>Experience : </strong></h4>
						<?php if (!empty($experience)) { $experience_check=true; ?>
							<p><i class="glyphicon glyphicon-star text-muted"></i> Work Experience : 
									<ul style="margin-left:25px;">
										<?php foreach($experience as $item) : ?>
											<li style="margin-top:5px;"><i class="glyphicon glyphicon-briefcase text-muted"></i> <?= $item->job_title . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
											<li style="margin-left:10px;"><i class="glyphicon glyphicon-cog text-muted"></i> Job Details: <?= $item->job_description ?>;</li>
										<?php endforeach; ?>
									</ul>
							</p> 
						<?php  }  if($experience_check == false) echo '<p>Nothing here.</p>'; ?>
					</div>
					<div class="col-xs-12 col-sm-6">
					<h4><strong>Specialization : </strong></h4>
                        <?php if (!empty($model->sector)) { $spec_check=true; ?>
                        <p><i class="glyphicon glyphicon-bookmark text-muted"></i> Sector : <?= $model->getSector() ?> </p>
                        <?php  } ?>
                        <?php if (!empty($model->sub_sector)) { $spec_check=true; ?>
                        <p style="margin-left:10px;"><i class="glyphicon glyphicon-arrow-right text-muted"></i> Sub-Sector : <?= $model->getSubSector() ?> </p>
                        <?php  } if($spec_check == false) echo '<p>Nothing here.</p>'; ?>
					</div>
				  </div>
				</div>
			  </div>
			</div>
</div>

</div>
