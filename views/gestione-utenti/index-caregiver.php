<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

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
        max-width: 40rem;
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

<h3>I miei pazienti</h3>


<div class="center">
    <div class="card">
        <?php for ($k = 0; $k < sizeof($pazienti); $k++) : ?>
            <div class="padding">
                <div class="smallcard">
                    <h3> Paziente: <?php echo $pazienti[$k]->nome ?> <?php echo $pazienti[$k]->cognome ?></h3>

                    <a class='btn' href=<?php echo '/controllo-terapia/progressi?idPaziente=' . $pazienti[$k]->idPaziente ?>>Progressi</a>

                    <a class='btn' href=<?php echo '/controllo-terapia/sessioni?idPaziente=' . $pazienti[$k]->idPaziente ?>>Sessioni</a>


                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>