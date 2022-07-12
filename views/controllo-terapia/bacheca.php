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
        font-size: x-large;
        padding: 2px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        padding: 4px;
    }

    .red {
        background-color: red;

    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 2px;
    }

    tr:nth-child(even) {
        background-color: #e3e3e3;
        padding: 2px;
    }
</style>

<h2>
    Bacheca
</h2>
<div class='center'>
    <table>
        <tr>
            <th>Paziente</th>
            <th>Sessioni non svolte</th>
            <th>Data</th>
        </tr>
        <?php for ($k = 0; $k < sizeof($sessioni); $k++) : ?>

            <tr>
                <td> <a href=<?php echo '/controllo-terapia/progressi?idPaziente=' . $idPaziente[$k] ?>><?php echo $nomePaziente[$k]; ?> <?php echo $cognomePaziente[$k]; ?></td>
                <td><?php echo $sessioni[$k]['sessione']; ?></td>
                <td><?php echo date('d/m/Y', $timestamp = strtotime($sessioni[$k]['dataCreazione'])) ?></td>

                <?php 
                $dataOggi = date("Y/m/d");
                $differenza = -floor((strtotime($sessioni[$k]['dataCreazione']) - strtotime($dataOggi)) / 86400);
                ?>
                <?php if ($differenza>=5) : ?>
                    <td> <div class='red'> assegnata <?php echo $differenza; ?> giorni fa</div></td>
                    <?php else : ?>
                    <td>assegnata <?php echo $differenza; ?> giorni fa</td>
                <?php endif; ?>
            </tr>

        <?php endfor; ?>
    </table>
</div>