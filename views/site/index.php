<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'Visconti';

?>

<div class="row">
    <h2> Recent Activities </h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($activities as $activity): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $activity->canvas ?> "><?= $activity->action_type ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $activity->activity_text ?></b>
                </data>
            </div>
            <time><?= $activity->created_on ?></a></time>
            <div class="clearfix visible-*"></div>
        </li>
        <?php endforeach; 
        if(empty($activities))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
</div>

<?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'e') {?>

<?php
    if(empty(Yii::$app->user->identity->role))
    {
        echo'<div class="alert alert-warning">
                 <strong>Warning!</strong> Your role in the community is not set, you won\'t be able to receive invitations for projects until you fully complete your profile.
             </div>';
    }
?>

<div class="row">
    <h2>Accepted projects</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($acceptedProjects as $project): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->getProject()->id ?> "><?= $project->getProject()->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->getProject()->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->getProject()->date_added ?></a></time>
            <div class="clearfix visible-*"></div>
        </li>
        <?php endforeach; 
		echo LinkPager::widget([
			'pagination' => $acceptedProjects_pages,
		]);
        if(empty($acceptedProjects))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
</div>

<div class="row">
    <h2>Invitations</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($invitations as $invitation): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $invitation->getProject()->id ?> "><?= $invitation->getProject()->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $invitation->getProject()->eng_summary ?></b>
                </data>
            </div>
            <time><?= $invitation->getProject()->date_added ?></a></time>
            <div class="clearfix visible-*"></div>
        </li>
        <?php endforeach; 
		echo LinkPager::widget([
			'pagination' => $invitations_pages,
		]);
        if(empty($invitations))
            echo "<p> Nothing here. </p>";
        ?>
    </ul></div>
    <?php } else { ?>

    <div class="row">
        <h2>Your currently in review projects </h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($studentAcceptedProjects as $project): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->id ?> "><?= $project->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->date_added ?></a></time>
            <div class="clearfix visible-*"></div>
        </li>
        <?php endforeach; 
		echo LinkPager::widget([
			'pagination' => $studentAcceptedProjects_pages,
		]);
        if(empty($studentAcceptedProjects))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
    </div>

    <div class="row">
        <h2>Your Submitted Projects</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($ownProjects as $project): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->id ?> "><?= $project->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->date_added ?></a></time>
            <div class="clearfix visible-*"></div>
        </li>
        <?php endforeach; 
		echo LinkPager::widget([
			'pagination' => $ownProjects_pages,
		]);
        if(empty($ownProjects))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
    </div>

    
    <?php } ?>
