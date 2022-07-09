<?php
/* @var $this yii\web\View */

use app\models\Sessione;
use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<style>
    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .progress-bar {
        background-color: #B20000;
    }
</style>

<h2>
    Progressi: <?php echo $model['nome'] ?> <?php echo $model['cognome'] ?>
</h2>
<h4>
    Diagnosi: <?php echo $model['diagnosi'] ?>
</h4>

<div class="card" style="max-width: 40rem; 
            margin-right: auto;  border-radius: 7px;   border: 1px solid black; background: white;">
    <h6>
        Percentuale errori:
    </h6>
    <?php for ($k = 0; $k < sizeof($sessioni); $k++) : ?>

        <?php $esercizi = Sessione::findOne(['idSessione' => $sessioni[$k]['sessione']]); ?>

        <div>
            <div class="box" style=" padding: 7px;">

                <div>sessione assegnata il: <?php echo $sessioni[$k]['dataCreazione'] ?> </div>

                <div class="progress">

                    <div class="progress-bar " role="progressbar" aria-valuemin="0" 
                    aria-valuemax="$esercizi['numEsercizi']" 
                    aria-valuenow="<?php echo $sessioni[$k]['cntErrori'] * 100 / $esercizi['numEsercizi'] ?>" 
                    style="width:<?php echo $sessioni[$k]['cntErrori'] * 100 / $esercizi['numEsercizi'] ?>%">

                        <?php echo $sessioni[$k]['cntErrori'] * 100 / $esercizi['numEsercizi']; ?>%
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<?php for ($k = 0; $k < sizeof($sessioni); $k++) : ?>
    <p>
    <div class="card" style="max-width: 40rem; 
            margin-right: auto;  border-radius: 7px;   border: 1px solid black; background: white;">
        <div class="box" style=" padding: 7px;">
            <div> Sessione: <?php echo $sessioni[$k]['sessione']; ?> </div>
            <div> Esito: <?php echo $sessioni[$k]['esito']; ?></div>

            <!--    <div> errori: < ?php echo $sessioni[$k]['elencoErrori']; ?></div> -->

            <?php $esercizi = Sessione::findOne(['idSessione' => $sessioni[$k]['sessione']]); ?>
            <div> Numero esercizi sbagliati: <?php echo $sessioni[$k]['cntErrori'] ?>
                su <?php echo $esercizi['numEsercizi']; ?></div>
            <div> Nota Caregiver: <?php echo $sessioni[$k]['note']; ?></div>
        </div>
    </div>
    </p>
<?php endfor; ?>