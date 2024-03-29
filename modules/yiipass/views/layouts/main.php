<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">

        <?php
            NavBar::begin([
                'brandLabel' => 'YiiPass',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            // Add admin info to username in navigation bar.
            if(Yii::$app->user->identity->is_admin == 1) {
                $displayed_username = Yii::$app->user->identity->username . ' - admin';
            } else {
                $displayed_username = Yii::$app->user->identity->username;
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'About', 'url' => ['/site/about']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Account Credentials', 'url' => ['/']],
                        (Yii::$app->user->identity->is_admin == 1) ? ['label' => 'Users', 'url' => ['/users']] : '',
                        ['label' => 'Logout (' . $displayed_username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']]
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/script.js') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
