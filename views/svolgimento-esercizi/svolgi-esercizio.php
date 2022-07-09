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

    .bigfont {
        font-size: 20px;
    }

    input[type=radio] {
    border: 0px;
    width: 100%;
    height: 2em;
    
    background-color: #d1d3d1;
}
</style>
<?php

$form = ActiveForm::begin();
?>
<?php for ($k = 0; $k < sizeof($esercizi); $k++) : ?>
    <div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;    margin-right: auto;  border-radius: 7px;   border: 1px solid black; background: white;"">

        <div class="center">

            <?php if ($esercizi[$k]->tipo == 'Audio') : ?>
                <div>
                    <?php echo $this->render('_esercizioAudio', ['esercizio' => $esercizi[$k]]); ?>
                </div>

            <?php elseif ($esercizi[$k]->tipo == 'Immagine') : ?>
                <div>
                    <?php echo $this->render('_esercizioImmagine', ['esercizio' => $esercizi[$k]]); ?>
                </div>

            <?php elseif ($esercizi[$k]->tipo == 'Coppia Minima') : ?>
                <div>
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
<?php endfor; ?>

<div class="center">
    <div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;  border-radius: 12px;    border: 5px solid black; ">
        <div class="center">
            <form action="/action_page.php">
                <h4>Nota</h4>

                <?php echo Html::activeTextarea($model, 'note') ?>
        </div>
        </form>
        <div class="center">
            <button type="submit" style="width: 90px; border-radius: 9px; background-color:
     #3399ff; border: 2px solid black;" onclick="alert('bla bla')">Avanti! </button>
        </div>
        <!-- < ?=Html::submitButton('Submit', ['class'=> 'submit'], ) ?> -->
    </div>
</div>
</div>
<?php $form->end(); ?>