<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$ed_check=false;
$contact_check=false;
$experience_check=false;
$personal_check=false;
$bio_check=false;

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="../web/images/avatar_big.png" alt="" class="img-rounded img-responsive" />
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $this->title ?></h4>
                <?php if (!empty($profile->bio)) { ?>
                    <h5> <b>Bio :</b> <br> </h5>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php  }$bio_check=true; ?>

                <ul style="padding: 0; list-style: none outside none;">
                    <h5> <b>Personal info :</b> </h5> 
                    <?php if (!empty($profile->website)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Website : <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?></li>
                    <?php }    ?>
                    <?php if (!empty($profile->public_email)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-envelope text-muted"></i> E-mail : <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?></li>
                    <?php }    ?>
                    <?php if (!empty($profile->byear)) { $personal_check=true; ?>
                        <li><i class="glyphicon glyphicon-calendar text-muted"></i> Year of Birth : <?= Html::a(Html::encode($profile->byear), Html::encode($profile->byear)) ?></li>
                    <?php }    if($personal_check==false) echo "<li> Nothing Here </li>";?>

                    <h5> <b>Contact info :</b> </h5>
                    <?php if (!empty($profile->phone_number)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-earphone text-muted"></i> Phone Number :  <?= Html::a(Html::encode($profile->phone_number)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($profile->fax_number)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-print text-muted"></i> Fax Number : <?= Html::a(Html::encode($profile->fax_number)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($profile->country)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Country : <?= Html::a(Html::encode($profile->country)) ?> <?php if (!empty($profile->state)) { ?> , <?= Html::a(Html::encode($profile->state)) ?> <?php  } ?></li>
                    <?php  } ?>
                    <?php if (!empty($profile->address)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-map-marker text-muted"></i> Address : <?php if (!empty($profile->city)) { ?> <?= Html::a(Html::encode($profile->address)) ?> , <?php  } ?> <?= Html::a(Html::encode($profile->address)) ?></li>
                    <?php  } ?>
                    <?php if (!empty($profile->zip)) { $contact_check=true; ?>
                        <li><i class="glyphicon glyphicon-home text-muted"></i> Zip/Postal Code : <?= Html::a(Html::encode($profile->zip)) ?></li>
                    <?php  } if($contact_check == false) echo "<li>Nothing here.</li>";?>
                     <h5> <b>Education :</b> </h5>
                    
                    <?php if (!empty($profile->ed_desc)) { $ed_check=true; ?>
                        <li><i class="glyphicon glyphicon-list-alt text-muted"></i> Education Details : <br> <?= Html::a(Html::encode($profile->ed_desc)) ?></li>
                    <?php  } ?>

                    <?php if (!empty($education)) { $ed_check=true; ?>
                        <li><i class="glyphicon glyphicon-education text-muted"></i> Studies : 
                                <ul style="margin-left:50px;">
                                    <?php foreach($education as $item) : ?>
                                        <li><i class="glyphicon glyphicon-check text-muted"></i> <?= $item->degree . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
                                    <?php endforeach; ?>
                                </ul>
                        </li>
                    <?php  } if($ed_check == false) echo "<li>Nothing here.</li>";  ?>

                     <h5> <b>Experience :</b> </h5>
                     <?php if (!empty($profile->exp_desc)) { $experience_check=true; ?>
                        <li><i class="glyphicon glyphicon-briefcase text-muted"></i> Experience Details : <br> <?= Html::a(Html::encode($profile->exp_desc)) ?></li>
                     <?php  } ?>
                     <?php if (!empty($experience)) { $experience_check=true; ?>
                        <li><i class="glyphicon glyphicon-star text-muted"></i> Work Experience : 
                                <ul style="margin-left:50px;">
                                    <?php foreach($experience as $item) : ?>
                                        <li><i class="glyphicon glyphicon-check text-muted"></i> <?= $item->job_title . " at " . $item->institution . " , from " . $item->from . " to " . $item->to ?>;</li>
                                    <?php endforeach; ?>
                                </ul>
                        </li>
                    <?php  }  if($experience_check == false) echo '<li style="height:25px;">Nothing here.</li>'; ?>
                    <li><i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?></li>
                </ul>
                
            </div>
        </div>
    </div>
</div>
