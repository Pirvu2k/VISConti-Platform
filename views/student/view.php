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
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="../web/images/avatar_big.png" alt="" class="img-rounded img-responsive" />
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $this->title ?></h4>
                <?php if (!empty($model->bio)) { ?>
                    <h5> <b>Bio :</b> <br> </h5>
                    <p style="word-break: break-all;width:600px;"><?= Html::encode($model->bio) ?></p>
                <?php  }$bio_check=true; ?>

                <ul style="padding: 0; list-style: none outside none;">
                    <h5> <b>Personal info :</b> </h5> 
                    <?php if (!empty($model->given_name) || !empty($model->family_name)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-user text-muted"></i> Name : <?= Html::a(Html::encode($model->given_name)) . " " . Html::a(Html::encode($model->family_name))  ?></li>
                    <?php }    ?>
                    <?php if (!empty($model->website)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Website : <?= Html::a(Html::encode($model->website), Html::encode($model->website)) ?></li>
                    <?php }    ?>
                    <?php if (!empty($model->email)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-envelope text-muted"></i> E-mail : <?= Html::a(Html::encode($model->email), 'mailto:' . Html::encode($model->email)) ?></li>
                    <?php }    ?>
                    <?php if (!empty($model->birth_year)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-calendar text-muted"></i> Year of Birth : <?= Html::a(Html::encode($model->birth_year), Html::encode($model->birth_year)) ?></li>
                    <?php }    if($personal_check==false) echo "<li> Nothing Here </li>";?>

                    <h5> <b>Contact info :</b> </h5>
                    <?php if (!empty($model->phone)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-earphone text-muted"></i> Phone Number :  <?= Html::a(Html::encode($model->phone)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($model->mobile)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-phone text-muted"></i> Mobile Number : <?= Html::a(Html::encode($model->mobile)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($model->country)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Country : <?= Html::a(Html::encode($model->country)) ?> <?php if (!empty($model->state)) { ?> , <?= Html::a(Html::encode($model->state)) ?> <?php  } ?></li>
                    <?php  } ?>
                    <?php if (!empty($model->address)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-map-marker text-muted"></i> Address : <?php if (!empty($model->city)) { ?> <?= Html::a(Html::encode($model->city)) ?> , <?php  } ?> <?= Html::a(Html::encode($model->address)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($model->zip)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-home text-muted"></i> Zip/Postal Code : <?= Html::a(Html::encode($model->zip)) ?></li>
                    <?php  } if($contact_check == false) echo "<li>Nothing here.</li>";?>
                     <h5> <b>Education :</b> </h5>

                    <?php if (!empty($education)) { $ed_check=true; ?>
                        <li><i class="glyphicon glyphicon-education text-muted"></i> Studies : 
                                <ul style="margin-left:25px;">
                                    <?php foreach($education as $item) : ?>
                                        <li><i class="glyphicon glyphicon-check text-muted"></i> <?= $item->degree . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
                                        <li style="margin-left:10px;"><i class="glyphicon glyphicon-cog text-muted"></i> Degree Details: <?= $item->degree_details ?>;</li>
                                    <?php endforeach; ?>
                                </ul>
                        </li>
                    <?php  } if($ed_check == false) echo "<li>Nothing here.</li>";  ?>

                     <h5> <b>Experience :</b> </h5>
                     <?php if (!empty($experience)) { $experience_check=true; ?>
                        <li><i class="glyphicon glyphicon-star text-muted"></i> Work Experience : 
                                <ul style="margin-left:25px;">
                                    <?php foreach($experience as $item) : ?>
                                        <li style="margin-top:5px;"><i class="glyphicon glyphicon-briefcase text-muted"></i> <?= $item->job_title . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
                                        <li style="margin-left:10px;"><i class="glyphicon glyphicon-cog text-muted"></i> Job Details: <?= $item->job_description ?>;</li>
                                    <?php endforeach; ?>
                                </ul>
                        </li> 
                    <?php  }  if($experience_check == false) echo '<li style="height:25px;">Nothing here.</li>'; ?>
                    <h5> <b>Specialization :</b> </h5>
                        <?php if (!empty($model->sector)) { $spec_check=true; ?>
                        <li><i class="glyphicon glyphicon-bookmark text-muted"></i> Sector : <?= $model->getSector() ?> </li>
                        <?php  } ?>
                        <?php if (!empty($model->sub_sector)) { $spec_check=true; ?>
                        <li style="margin-left:10px;"><i class="glyphicon glyphicon-arrow-right text-muted"></i> Sub-Sector : <?= $model->getSubSector() ?> </li>
                        <?php  } ?>

                    <br>
                    <li><i class="glyphicon glyphicon-time text-muted"></i> <?= 'Joined on '.$model->created_on ?></li>
                </ul>
                
            </div>
        </div>
    </div>
</div>

</div>
