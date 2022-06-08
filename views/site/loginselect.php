<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
$this->title = 'Login Selection';

?>

<div class="site-loginselect">
    <style>
    .container {
    height: 30px;
    position: relative;
    }
    .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 500px;
    border-radius: 5px;
    border: 1px solid black;
    }
    </style>

    <div class="container">

        <div class="center">

                <div class="card border-dark mb-3" style="max-width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Pronuntia</h4>
                    <p class="card-text">Pronuntia è un software di supporto al percorso logopedico che consente sia al paziente di svolgere esercizi 
                    come forma di ausilio terapeutico che al logopedista di monitorarne l’andamento.</p>

                <p>           
                <form action="/site/login">

                <button class="btn btn-lg btn-primary" type="submit">Log in Cargiver</button></form>
                </p>
                
                <form action="https://www.google.it/">
                <button class="btn btn-lg btn-primary" type="submit">Log in Logopedista</button></form>

        </div>
    </div>
</div>

