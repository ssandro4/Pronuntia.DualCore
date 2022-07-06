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
</style>
<?php

$form = ActiveForm::begin();
?>
<?php for ($k = 0; $k < sizeof($esercizi); $k++) : ?>
    <div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;  border-radius: 12px;    border: 5px solid black; ">

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

            <div class="center">

                

                    <div>
                        <p>Che valutazione daresti?</p>
                      

                        <?php echo Html::radioList('esiti['.$k.']',false,  [false=>'Bene', true=>'Male']) ?>
                        <input type="radio" id="Bene" name='contaerrori' .'$k' value="bene " style="  height: 25px; width: 25px;">
                        <label for="html">
                            <h4>Positiva!</h4>
                        </label>
                        <input type="radio" id="Male" name="contaerrori" .'$k' value="male" style="  height: 25px; width: 25px;">
                        <label for="css">
                            <h4>Negativa!</h4>
                        </label><br>
                    </div>

            </div>
        </div>
    </div>
<?php endfor; ?>

<div class="card bg-secondary mb-3" style="max-width: 40rem; margin-left: auto;
            margin-right: auto;  border-radius: 12px;    border: 5px solid black; ">
    <div class="center">
        <form action="/action_page.php">
            <h4>Nota</h4>
            <div class="center">
                <input type="text" id="fname" name="fname"><br><br>

                <?php echo Html::activeTextarea($model, 'note') ?>
            </div>
        </form>
        <button type="submit" style="width: 90px; border-radius: 9px; background-color: #3399ff; border: 2px solid black;" onclick="alert('bla bla')">Avanti! </button>
    </div>
</div>
<?= Html::submitButton('Submit', ['class' => 'submit']) ?>
<?php $form->end(); ?>