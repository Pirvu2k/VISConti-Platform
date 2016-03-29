<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<link rel="icon" type="image/png" href="../images/icon.png?v=1" />
    <title><?= Html::encode($this->title) ?></title>
    <?php //$this->head() ?>
    <?php
        if (YII_ENV_DEV)
            echo '<link href="/web/assets/ba2b43d0/toolbar.css" rel="stylesheet">	';
    ?>
	<?php
		$controller = Yii::$app->controller;
		$is = (($controller->action->id === "login")) ? true : false;
		if($is)
			echo '<link href="../web/css/login.css" rel="stylesheet">';
	?>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet'>
	<link href="../web/css/site.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>


<header id="primary" data-view="header_view" data-nosearch="true" data-model_name="user" data-model_id="5598ec54ad44d93f30b9f805">
    <div class="container">
        <nav class="row">
            <div class="col-sm-4">
                <ul class="nav-pills pull-left nav">
					<?php $isfaq = ($controller->action->id === "faq") ? true : false; ?>
					<li<?php if(!$isfaq) echo' class="active"'; ?>><a href="index.php?r=site/index">
					<?php if($isfaq && Yii::$app->user->isGuest) echo 'Login / Register'; else echo 'Home';?>
					</a></li>
					<li<?php if($isfaq) echo' class="active"'; ?>><a href="index.php?r=site/faq">FAQ</a></li>
				</ul>
            </div>

            <div id="header-actions" class="col-sm-4" data-view="header_actions" data-model_name="user" data-model_id="5598ec54ad44d93f30b9f805">
				<?php
					if(!Yii::$app->user->isGuest)
                        echo '<a class="btn purple" href="index.php?r=user/profile/show&id=' . Yii::$app->user->identity->id . '">'. Yii::$app->user->identity->username .'</a>';
				?>
            </div>
        </nav>
    </div>
</header>

<section id="home-header" class="hero in">
	<div class="container">
		<div class="row">
			</br></br>
			<img src="../images/1.png">
		</div>
	</div>
</section>


<div class="content">
	</br></br>
	<?php
		$is = (($controller->action->id === "faq" && Yii::$app->user->isGuest) || ($controller->action->id === "profile") || ($controller->action->id === "account") || ($controller->action->id === "login") || ($controller->action->id === "register")) ? true : false;
		if(!$is) {
			echo '<ul id="sidebar" class="col-sm-12 col-md-1"></ul>';
	?>

<?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
			'id' => 'menu1',
            'class' => 'col-md-2 col-sm-3',
        ],
    ]);
    $navItems=[
    ['label' => 'Home', 'url' => ['/site/index']]
  ];
    $navItemsRight=[];
  if (Yii::$app->user->isGuest) {
    array_push($navItemsRight,['label' => 'Sign In', 'url' => ['/user/security/login']],['label' => 'Sign Up', 'url' => ['/user/registration/register']]);
  } else {
    array_push($navItemsRight,['label' => 'Account', 'url' => ['/user/settings/profile']],
		['label' => 'Logout',
        'url' => ['/user/security/logout'],
        'linkOptions' => ['data-method' => 'post']]
    );
  }
  if(!Yii::$app->user->isGuest && Yii::$app->user->can('student'))
  {
    array_push($navItems,
        ['label'=>'Create Canvas', 'url'=>['canvas/create']]);
  }
  else if(!Yii::$app->user->isGuest && Yii::$app->user->can('expert'))
  {
    array_push($navItems,
        ['label'=>'Review Projects', 'url'=>['canvas/index']]);
  }
echo '<h3>Site Menu</h3>';
echo Nav::widget([
    'items' => $navItems,
]);
echo '<h3>Account Menu</h3>';
echo Nav::widget([
    'items' => $navItemsRight,
]);
    NavBar::end();
?>

	<?php } ?>
    <main id="new" class="container">
        <?= $content ?>
    </main>

	<footer>
		<div class="container">
			<small class="row">&copy; My Company <?= date('Y') ?></small>
		</div>
	</footer>
</div>

<?php $this->endBody() ?>
<?php
	if($isfaq && Yii::$app->user->isGuest)
		echo '<script src="/web/assets/3c8edb85/js/bootstrap.js"></script>';
?>
</body>
</html>
<?php $this->endPage() ?>
