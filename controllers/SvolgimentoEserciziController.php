<?php

namespace app\controllers;

use app\models\Assegnazionesessione;
use app\models\Esercizio;
use app\models\Sessione;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use app\models\Paziente;
use app\models\Composizionesessione;

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
        $parole = array();
        for ($k = 0; $k < sizeof($esercizi); $k++) {
            $parole[$k] = Esercizio::findOne(['idEsercizio' => $esercizi[$k]->idEsercizio])->parola;
        }
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->elencoErrori = '';
            $model->cntErrori=0;
            for ($k = 0; $k < sizeof($esercizi); $k++) {
                if ($_POST['esiti'][$k] == 1) {
                    $model->cntErrori++;
                    $model->elencoErrori .= $parole[$k] . '<br />';
                }
            }
            $model->esito = 'Il paziente '.Paziente::findOne(['idPaziente' => $paziente])->getNomeECognome().' in '.sizeof($esercizi).'
            esercizi ha avuto difficoltà con '.$model->cntErrori.' parole, ovvero: '.$model->elencoErrori;
            if($model->save()){
                $model->nuovo=0;
                $model->save();
            }
            return $this->render('assegnazionesessione/view',['sessione'=>$sessione,'paziente'=>$paziente]);
            //return $this->redirect(['index']);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('svolgiesercizio', [
            'esercizi' => $esercizi, 'model' => $model
        ]);
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


    protected function svolgiEsercizio($sessione)
    {
        $numEsercizi = $this->findSessione($sessione)->getEsercizios()->all();
        $arrModels = array();
        for ($k = 0; $k < $numEsercizi; $k++) {
            $model = new Composizionesessione();
            $model->sessione = $sessione;
            $arrModels[] = $model;
        }
        if ($this->request->isPost) {
            for ($k = 0; $k < $numEsercizi; $k++) {
                $arrModels[$k]->esercizio = $_POST['Composizionesessione'][$k]['esercizio']; //$_POST['esercizi' . $k];//     
                $arrModels[$k]->save();
            }
            return $this->redirect(['index']);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('componi-sessione', [
            'arrModels' => $arrModels,
        ]);
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
