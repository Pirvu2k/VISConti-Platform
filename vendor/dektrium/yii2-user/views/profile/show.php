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

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <img src="http://gravatar.com/avatar/<?= $profile->gravatar_id ?>?s=230" alt="" class="img-rounded img-responsive" />
            </div>
            <div class="col-sm-6 col-md-8">
                <h4><?= $this->title ?></h4>
                <?php if (!empty($profile->bio)): ?>
                    <h5> <b>Bio :</b> <br> </h5>
                    <p><?= Html::encode($profile->bio) ?></p>
                <?php endif; ?>

                <ul style="padding: 0; list-style: none outside none;">
                    <h5> <b>Personal info :</b> </h5> 
                    <?php if (!empty($profile->website)): ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Website : <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->public_email)): ?>
                        <li><i class="glyphicon glyphicon-envelope text-muted"></i> E-mail : <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->byear)): ?>
                        <li><i class="glyphicon glyphicon-calendar text-muted"></i> Year of Birth : <?= Html::a(Html::encode($profile->byear), Html::encode($profile->byear)) ?></li>
                    <?php endif; ?>
                    <h5> <b>Contact info :</b> </h5>
                    <?php if (!empty($profile->phone_number)): ?>
                        <li><i class="glyphicon glyphicon-earphone text-muted"></i> Phone Number :  <?= Html::a(Html::encode($profile->phone_number)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->fax_number)): ?>
                        <li><i class="glyphicon glyphicon-print text-muted"></i> Fax Number : <?= Html::a(Html::encode($profile->fax_number)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->country)): ?>
                        <li><i class="glyphicon glyphicon-globe text-muted"></i> Country : <?= Html::a(Html::encode($profile->country)) ?> <?php if (!empty($profile->state)): ?> , <?= Html::a(Html::encode($profile->state)) ?> <?php endif; ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->address)): ?>
                        <li><i class="glyphicon glyphicon-map-marker text-muted"></i> Address : <?php if (!empty($profile->city)): ?> <?= Html::a(Html::encode($profile->address)) ?> , <?php endif; ?> <?= Html::a(Html::encode($profile->address)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->zip)): ?>
                        <li><i class="glyphicon glyphicon-home text-muted"></i> Zip/Postal Code : <?= Html::a(Html::encode($profile->zip)) ?></li>
                    <?php endif; ?>
                     <h5> <b>Education :</b> </h5>
                     <?php if (!empty($profile->degree)): ?>
                        <li><i class="glyphicon glyphicon-education text-muted"></i> Degree : <?= Html::a(Html::encode($profile->degree)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->degree_details)): ?>
                        <li><i class="glyphicon glyphicon-unchecked text-muted"></i> Degree Details : <?= Html::a(Html::encode($profile->degree_details)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->institution_name)): ?>
                        <li><i class="glyphicon glyphicon-unchecked text-muted"></i> Instutition : <?= Html::a(Html::encode($profile->institution_name)) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($profile->start_year) && !empty($profile->end_year)): ?>
                        <li><i class="glyphicon glyphicon-unchecked text-muted"></i> Period : <?= Html::a(Html::encode($profile->start_year)) ?> to <?php if($profile->end_year == "2016") echo "<a>Present</a>"; else echo Html::a(Html::encode($profile->end_year)); ?></li>
                    <?php endif; ?>
                     <h5> <b>Experience :</b> </h5>
                    <li><i class="glyphicon glyphicon-time text-muted"></i> <?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?></li>
                </ul>
                
            </div>
        </div>
    </div>
</div>
