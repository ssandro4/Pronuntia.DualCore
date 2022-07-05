<?php

namespace app\controllers;

use app\models\Assegnazionesessione;
use app\models\Esercizio;
use app\models\Sessione;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class SvolgimentoEserciziController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSvolgiSessione($sessione, $paziente)
    {
        $model = $this->findAssegnazioneSessione($sessione, $paziente);
        $esercizi = $model->getSessione0()->one()->getEsercizios()->all();
        foreach ($esercizi as $esercizio) {
          
                //echo $esercizio->idEsercizio;
                
                $model = $this->findEsercizio($esercizio);
                // echo $this->svolgiEsercizio('svolgi-esercizio', ['esercizio'=> $model]);
                return $this->svolgiEsercizio($model);
           
        }
    }



    /* $esercizi = $sessioneAssegnata->getEsercizi(); //e qui quindi abbiamo un array o quel che è degli esercizi che compongono quella sessione
foreach($esercizi as $esercizio) //non so bene la sintassi
{$esiti = svolgiEsercizio($esercizio) // qua capiamo se svolgi esercizio lo scriviamo come funzione/azione o se scriviamo direttamente dentro qui tutto il fatto render("svolgi-esercizio"), nel caso sia una funzione può essere una funzione che restituisce qualcosa
$sessioneAssegnata->nota += $esiti->nota;
if (esito negativo){
$sessioneAssegnata->cntSbagliate++;
$sessioneAssegnata->listaSbagliate += $esercizio->parola // e magari punto e a capo, na virgola, qualcosa
}
$sessioneAssegnata->esito = 'ha sbagliato ' . $sessioneAssegnata->cntSbagliate . ' parole, ovvero: ' . $$sessioneAssegnata->listaSbagliate;
$sessioneAssegnata->save();*/
    //   return $this->render('svolgi-sessione', ['model'=> $esercizio]);


    protected function svolgiEsercizio($esercizio)
    {
        $var = '';
        echo $this->render('svolgi-esercizio', ['esercizio' => $esercizio, 'var' => $var]);
        return $var;
    }

    protected function findAssegnazioneSessione($sessione, $paziente)
    {
        if (($model = Assegnazionesessione::findOne(['sessione' => $sessione, 'paziente' => $paziente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findEsercizio($esercizio)
    {
        if (($model = Esercizio::findOne(['idEsercizio' => $esercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
