<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;
/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$img=Parola::findOne(['idParola'=>$esercizio->parola])->pathIMG;
$id=Parola::findOne(['idParola'=>$esercizio->parola])->idParola;
?>

<?php echo $esercizio->idEsercizio ?> 
<?php echo $esercizio->tipo ?> 
<?php echo $esercizio->parola ?> 
<?php echo $esercizio->parola2 ?> 

<?php
if ($esercizio->tipo=='Immagine') {
        echo "IMMAGINEEEEEEEEEEEEEEEEEEEEEEEEEEEE";
    } elseif ($esercizio->tipo=='Audio') {
        echo "AUDIOOOOOOOOOOOOOOOOO";
    } elseif ($esercizio->tipo=='Coppia Minima'){
        echo "COPPIAAAAAAAAAAAAAAAAAAAA";
    }
?>

<?php if($esercizio->tipo == 'Audio') : ?>
    AUDIOOOOOOOOOOOOOOOOO



<?php elseif($esercizio->tipo == 'Immagine') : ?>
    IMMAGINEEEEEEEEEEEEEEEEEEEEEEEEEEEE
    
    <img src= <?php echo "$img" ?>,
             alt=<?php echo "$id" ?>, 
            width="300" ,
            height="300">
    </div>



<?php elseif($esercizio->tipo == 'Coppia Minima') : ?>
    COPPIAAAAAAAAAAAAAAAAAAAA
<?php else : ?>
 Diocane
<?php endif; ?>