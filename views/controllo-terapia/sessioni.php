<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\controllers\ControlloTerapiaController;
?>
<style>
    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        padding: 10px;
    }

    .bigfont {
        font-size: 20px;
    }

    .card {
        margin-right: auto;
        max-width: 40rem;
        margin-right: auto;
        border-radius: 8px;
        border: 2px solid black;
        background: white;
        padding: 10px;
    }

    .padding {
        max-width: 50rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        padding: 10px;
    }

    .smallcard {
        margin-left: auto;
        margin-right: auto;
        max-width: 50rem;
        border-radius: 8px;
        border: 2px solid black;
        padding: 7px;
        font-size: 20px;
    }


    .btn {
        border-radius: 8px;
        border: 2px;
        padding: 15px;
        text-align: center;
        background-color: #0092ff;
        font-size: 20px;
    }
</style>

<h3>
    Sessioni nuove per <?php echo $nomePaziente ?>:
</h3>
<div class='center'>

    <div class="card">
        <?php for ($k = 0; $k < sizeof($sessioni); $k++) : ?>
            <div class="padding">
                <div class="smallcard">

                    <h3> <?php echo $sessioni[$k]['sessione']; ?> assegnata il <?php echo $sessioni[$k]['dataCreazione'] ?> </h3>

                    <a class='btn' href=<?php echo '/svolgimento-esercizi/svolgi-sessione/?sessione='.$sessioni[$k]['sessione'].'&paziente='.$idPaziente?>>Svolgi Sessione</a>

                </div>
            </div>

        <?php endfor; ?>
    </div>
</div>