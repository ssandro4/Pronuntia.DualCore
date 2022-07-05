<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;
use app\models\Assegnazionesessione;
use app\models\Sessione;
use app\models\Composizionesessione;
use views\esercizio\_esercizioAudio;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

?>

<style>
    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
</style>


<div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;  border-radius: 12px;    border: 5px solid black; ">

    <div class="center">

        <?php if ($esercizio->tipo == 'Audio') : ?>
            <div>
                <?php echo $this->render('_esercizioAudio', ['esercizio' => $esercizio]); ?>
            </div>

        <?php elseif ($esercizio->tipo == 'Immagine') : ?>
            <div>
                <?php echo $this->render('_esercizioImmagine', ['esercizio' => $esercizio]); ?>
            </div>

        <?php elseif ($esercizio->tipo == 'Coppia Minima') : ?>
            <div>
                <?php echo $this->render('_esercizioCoppia', ['esercizio' => $esercizio]); ?>
            </div>

        <?php else : ?>
            Nothing
        <?php endif; ?>

        <div class="center">

        </div>

        <div class="center">

            <form action="/action_page.php">

                <div>
                    <p>Che valutazione daresti?</p>
                    <input type="radio" id="Bene" name="contaerrori" value="bene " style="  height: 25px; width: 25px;">
                    <label for="html"><h4>Positiva!</h4></label>
                    <input type="radio" id="Male" name="contaerrori" value="male" style="  height: 25px; width: 25px;">
                    <label for="css"><h4>Negativa!</h4></label><br>
                </div>

        </div>
    </div>
</div>


<div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;  border-radius: 12px;    border: 5px solid black; ">
    <div class="center">
        <form action="/action_page.php">
            <h4>Nota</h4>
            <div class="center">
                <input type="text" id="fname" name="fname"><br><br>
            </div>
        </form>
        <button type="button" style="width: 90px; border-radius: 9px; background-color: #3399ff; border: 2px solid black;" onclick="alert('bla bla')">Avanti! </button>
    </div>
</div>