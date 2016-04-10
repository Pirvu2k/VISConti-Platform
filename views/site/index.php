<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = 'Visconti';

?>

<div class="row">
    <h2>Recent activities</h2>

    <ul class="col-md-10 col-sm-9 feed">
        <!--<li>
            <h2 class="col-sm-12"><a href="#">Project 1</a></h2>
            <div class="col-sm-12 clearfix">
                <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                </data>
            </div>
            <time>Two hours ago by <a href="">Student 1</a>
            </time>
            </br>
        </li>
        <li>
            <h2 class="col-sm-12"><a href="#">Project 2</a></h2>
            <div class="col-sm-12 clearfix">
                <data><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</b>
                </data>
            </div>
            <time>Two hours ago by <a href="">Student 1</a>
            </time>
            </br>
        </li> -->
        <?php foreach ($projects as $project): ?>
            <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->id ?>"><?= $project->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->date_added ?> by <a href=""><?= $project->created_by ?></a></time>
            </br>
             </li>
        <?php endforeach; 
          if(empty($projects))
            echo "<p> Nothing here. </p>";
        ?>

    </ul>
</div>
<?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'e') {?>
<div class="row">
    <h2>Invitations</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($invitations as $invitation): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $invitation->id ?> "><?= $invitation->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $invitation->eng_summary ?></b>
                </data>
            </div>
            <time><?= $invitation->date_added ?> by <a href=""><?= $invitation->created_by ?></a></time>
            <br>
        </li>
        <?php endforeach; 

        if(empty($invitations))
            echo "<p> Nothing here. </p>";
        ?>
    </ul></div>
    <div class="row">
    <h2>Declined Projects</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($blockedProjects as $project): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->id ?> "><?= $project->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->date_added ?> by <a href=""><?= $project->created_by ?></a></time>
            <br>
        </li>
        <?php endforeach; 
        if(empty($blockedProjects))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
</div>
    <?php } else { ?>
    <div class="row">
        <h2>Your Projects</h2>
    <ul class="col-md-10 col-sm-9 feed">
        <?php foreach($ownProjects as $project): ?>
        <li>
            <h2 class="col-sm-12"><a href="?r=canvas/view&id=<?= $project->id ?> "><?= $project->title ?></a></h2>
            <div class="col-sm-12 clearfix">
                <data><b><?= $project->eng_summary ?></b>
                </data>
            </div>
            <time><?= $project->date_added ?> by <a href=""><?= $project->created_by ?></a></time>
            <br>
        </li>
        <?php endforeach; 
        if(empty($ownProjects))
            echo "<p> Nothing here. </p>";
        ?>
    </ul>
    <?php } ?>
