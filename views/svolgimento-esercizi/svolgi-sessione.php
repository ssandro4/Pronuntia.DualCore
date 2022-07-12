<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;
use app\models\Assegnazionesessione;
use app\models\Sessione;
use app\models\Composizionesessione;
use views\esercizio\_esercizioAudio;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

?>

<style>
    .padding {
        max-width: 50rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        padding: 10px;
    }

    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        padding: 7px;
    }

    .side {
        margin-left: auto;
        margin-right: auto;
        text-align: right;
        padding: 7px;
    }

    .red {
        background-color: coral;
        max-width: 40rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        border: 5px;
        padding: 7px;
    }

    .yellow {
        background-color: yellow;
        max-width: 40rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        border: 5px;
        padding: 7px;
    }

    .green {
        background-color: greenyellow;
        max-width: 40rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        border: 5px;
        padding: 7px;
    }

    .body {
        max-width: 40rem;
        margin-left: auto;
        margin-right: auto;
        padding: 7px;
    }

    .bigfont {
        font-size: 20px;
    }

    input[type=radio] {
        border: 0px;
        width: 100%;
        height: 2em;
        background-color: #d1d3d1;
    }

    .card {
        max-width: 40rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        border: 2px solid black;
        background: white;
        padding: 7px;
    }
</style>

<div class="body">
    <div class="side">
        <?php
        Modal::begin([
            'title' => '<h2>Guida esercizi</h2>',
            'toggleButton' => ['label' => 'Problemi con gli esercizi?', 'class' => 'btn-info btn-sm'],
            'closeButton' => [
                'label' => 'Chiudi',
                'class' => 'btn-danger btn-sm',
            ]
        ]);
        echo 'Say hello...';
        Modal::end();
        ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <?php for ($k = 0; $k < sizeof($esercizi); $k++) : ?>
        <div class="padding">

            <div class="card">

                <div class="center">

                    <?php if ($esercizi[$k]->tipo == 'Audio') : ?>
                        <div class="red">

                            <?php echo $this->render('_esercizioAudio', ['esercizio' => $esercizi[$k]]); ?>

                        </div>

                    <?php elseif ($esercizi[$k]->tipo == 'Immagine') : ?>
                        <div class="yellow">

                            <?php echo $this->render('_esercizioImmagine', ['esercizio' => $esercizi[$k]]); ?>

                        </div>

                    <?php elseif ($esercizi[$k]->tipo == 'Coppia Minima') : ?>
                        <div class="green">

                            <?php echo $this->render('_esercizioCoppia', ['esercizio' => $esercizi[$k]]); ?>

                        </div>

                    <?php else : ?>
                        Nothing
                    <?php endif; ?>

                    <div class="center">

                    </div>

                    <div class="bigfont">
                        <p>Che valutazione daresti?</p>

                        <div class="biggertext">
                            <?php echo Html::radioList('esiti[' . $k . ']', false,  [false => 'Positiva', true => 'Negativa'], ['separator' => '', 'tabindex' => 2,]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
        </div>
    <?php endfor; ?>
    <div>
    </div>

    <div class="center">
        <div class="card">
            <div class="center">
                <form action="/action_page.php">
                    <h4>Nota</h4>

                    <?php echo Html::activeTextarea($model, 'note') ?>
            </div>
            </form>
            <div class="center">
                <button type="submit" style="width: 90px; border-radius: 9px; background-color:
     #3399ff; border: 2px solid black;padding: 7px;" onclick="alert('Risultati Sessione Inviati')">Avanti! </button>
            </div>
            <!-- < ?=Html::submitButton('Submit', ['class'=> 'submit'], ) ?> -->
        </div>
    </div>
</div>
<?php $form->end(); ?>
</div>