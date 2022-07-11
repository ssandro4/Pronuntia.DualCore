<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\Utente;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>


<style>
    .col-3 {
        -moz-hyphens: auto;
        -ms-hyphens: auto;
        -webkit-hyphens: auto;
        hyphens: auto;
        word-wrap: break-word;
        margin: 16px 16px;
    }

    .logbtn {
        border-radius: 8px;
        border: 3px solid black;
        text-align: center;
        background-color: teal;

    }

    .btn {
        border-radius: 8px;
        border: 2px solid black;
        color: black;
        text-align: center;
        font-size: 18px;
        margin: 8px 8px;
        height: 60px;
        width: 240px;
    }

    hr.solid {
        border-top: 3px solid #bbb;
    }
</style>


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
        if (Yii::$app->user->isGuest) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Login Caregiver', 'url' => ['/site/login-caregiver']],
                    ['label' => 'Login Logopedista', 'url' => ['/site/login-logopedista']],
                ],
            ]);
            NavBar::end();
        } else if (Yii::$app->user->identity->tipo == 'caregiver') {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Modifica i tuoi dati', 'url' => ['/gestione-utenti/modifica-profilo-caregiver?idCaregiver='.Yii::$app->user->identity->id]],
                    
                    ['label' => 'I tuoi pazienti', 'url' => ['#URLDAAGGIUNGERE']],
                    
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ('<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->email . ')',
                            ['class' => 'logbtn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
            NavBar::end();
        } else if (Yii::$app->user->identity->tipo == 'logopedista') {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Crea Caregiver', 'url' => ['/gestione-utenti/crea-profilo-caregiver']],
                    ['label' => 'Crea Paziente', 'url' => ['/gestione-utenti/crea-profilo-paziente']],
                    ['label' => 'Crea Parola', 'url' => ['/gestione-esercizi/aggiungi-parola']],
                    ['label' => 'Crea Esercizio', 'url' => ['/gestione-esercizi/crea-esercizio']],
                    ['label' => 'Crea Sessione', 'url' => ['/gestione-esercizi/crea-sessione']],
                    ['label' => 'Vocabolario', 'url' => ['/gestione-esercizi/vocabolario']],
                    
                    ['label' => 'Pazienti', 'url'=> ['#URLDAAGGIUNGERE']],
                    
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ('<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->email . ')',
                            ['class' => 'logbtn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )],
            ]);
            NavBar::end();
        }
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
            <p class="float-left">&copy; My Company <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>