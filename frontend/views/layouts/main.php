<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Bosh sahifa', 'url' => ['/site/index']],
        [
            'label' => 'Ta\'lim yo\'nalishlari',
            'items' => [
                ['label' => 'Bakalavr', 'url' => ['/site/bakalavr']],
                ['label' => 'Magistratura', 'url' => ['/site/magistratura']],
            ],
        ],
        ['label' => 'Fakultet haqida', 'url' => ['/site/contact']],
        ['label' => 'Yangiliklar', 'url' => ['/site/news']],
        ['label' => 'Elektron kutubxona', 'url' => ['/site/contact']],
        ['label' => 'Aloqa', 'url' => ['/site/contact']],
    ];

    // Ro'yxatdan o'tish va Kirish
    if (Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => 'Kirish',
            'items' => [
                ['label' => 'Kirish', 'url' => ['/site/login']],
                ['label' => 'Ro\'yxatdan o\'tish', 'url' => ['/site/signup']],
            ],
        ];
    } else {
        $menuItems[] = [
            'label' => 'Chiqish (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post'],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>



<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->  name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
