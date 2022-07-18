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
        padding: 15px;
    }


    .btn {
        border-radius: 8px;
        border: 2px;
        padding: 15px;
        text-align: center;
        background-color: #555555;
        font-size: 20px;
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
        <div>
            <div class="box" style=" padding: 7px;">


                <?php if ($sessioni[$k]['nuovo'] == 0) : ?>

                    <div> <?php echo $sessioni[$k]['sessione']; ?>, assegnata il: <?php echo $sessioni[$k]['dataCreazione'] ?> </div>
                    <?php if ($percentuali[$k] != 0) : ?>
                        <div class="progress">
                            <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="$esercizi['numEsercizi']" aria-valuenow="<?php echo $percentuali[$k] ?>" style="width:<?php echo $percentuali[$k] ?>%">
                                <?php echo $percentuali[$k] ?>%
                            </div>
                        </div>
                    <?php else : ?>
                        Nessun errore!
                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endfor; ?>
</div>

<?php for ($k = 0; $k < sizeof($sessioni); $k++) : ?>

    <?php if ($sessioni[$k]['nuovo'] == 0) : ?>
        <p>
        <div class="card" style="max-width: 40rem; 
            margin-right: auto;  border-radius: 7px;   border: 1px solid black; background: white;">
            <div class="box" style=" padding: 7px;">
                <div> Sessione: <?php echo $sessioni[$k]['sessione']; ?> </div>
                <div> Esito: <?php echo $sessioni[$k]['esito']; ?></div>

                <div> Numero esercizi sbagliati: <?php echo $sessioni[$k]['cntErrori'] ?>
                    su <?php echo $esercizi[$k]; ?></div>
                <div> Nota Caregiver: <?php echo $sessioni[$k]['note']; ?></div>
            </div>
        </div>
        </p>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($percentuali == 0) : ?>
    
    <div class="card" style="max-width: 40rem; 
            margin-right: auto;  border-radius: 7px;   border: 1px solid black; background: white;">
        <div class="box" style=" padding: 7px;">
            Il paziente non ha svolto alcun Esercizio
        </div>
    </div>
<?php endif; ?>