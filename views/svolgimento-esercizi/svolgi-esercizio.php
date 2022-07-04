<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;
use app\models\Assegnazionesessione;
use app\models\Sessione;
use app\models\Composizionesessione;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$img = Parola::findOne(['idParola' => $esercizio->parola])->pathIMG;
$img2 = Parola::findOne(['idParola' => $esercizio->parola2])->pathIMG;
$id = Parola::findOne(['idParola' => $esercizio->parola])->idParola;
$id2 = Parola::findOne(['idParola' => $esercizio->parola2])->idParola;
$rand = rand(0, 999);
$sound = Parola::findOne(['idParola' => $esercizio->parola])->pathMP3;
//$note=Assegnazionesessione::findOne(['note'=>$esercizio->Assegnazionesessione])->note;
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
            AUDIO <div>
                <p>Clicca play per riprodurre l'audio</p>
                <audio src=<?php echo " $sound " ?> controls>
            </div>
        <?php elseif ($esercizio->tipo == 'Immagine') : ?>
            IMMAGINE <div>
                <img src=<?php echo " $img " ?>, alt=<?php echo "$id" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
            </div>
    </div>
<?php elseif ($esercizio->tipo == 'Coppia Minima') : ?>
    COPPIA
    <div>
        <?php if ($rand % 2 == 0) : ?>

            <img src=<?php echo " $img " ?>, alt=<?php echo "$id" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
            <img src=<?php echo " $img2 " ?>, alt=<?php echo "$id2" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
    </div>

<?php else : ?>

    <img src=<?php echo " $img2 " ?>, alt=<?php echo "$id2" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
    <img src=<?php echo " $img " ?>, alt=<?php echo "$id" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
</div>
<div>
    La parola giusta e' (<?php echo "$id" ?>)
    <div>
        <audio controls="controls">
            <source src="<?php echo "$sound" ?>" type="audio/mp3">
        </audio>
    </div>
</div>


</div>


<?php endif; ?>


<?php else : ?>
    Nothing
<?php endif; ?>

<div class="center">
    <form action="/action_page.php">
        <label for="fname">Nota</label>

        <div class="center">
            <input type="text" id="fname" name="fname"><br><br>
        </div>
    </form>
</div>

<div class="center">
    <button type="button" style="width: 90px; border-radius: 9px; background-color: #b7e2a1; border: 2px solid black;" onclick="alert('bla bla esito positivo')">Bene! </button>

    <button type="button" style="width: 90px; border-radius: 9px; background-color: #ff6666; border: 2px solid black;" onclick="alert('bla bla esito negativo')">Male!</button>
</div>

<div class="center">
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Avanti!', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <button type="button" style="width: 90px; border-radius: 9px; background-color: #3399ff; border: 2px solid black;">Avanti! </button>
</div>

</div>
</div>
