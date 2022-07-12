<?php

namespace app\controllers;

use app\models\Assegnazionesessione;
use app\models\Esercizio;
use app\models\Sessione;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use app\models\Paziente;
use app\models\Composizionesessione;
use Yii;

class SvolgimentoEserciziController extends \yii\web\Controller
{


    public function actionSvolgiSessione($sessione, $paziente)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-caregiver');
        }
        if (Paziente::findOne(['idPaziente' => $paziente])->caregiver != Yii::$app->user->id) {
            return $this->goHome();
        }
        $model = $this->findAssegnazioneSessione($sessione, $paziente);
        if (!$model->nuovo){
            return $this->goHome();
        }
        $esercizi = $model->getSessione0()->one()->getEsercizios()->all();
        $parole = array();
        for ($k = 0; $k < sizeof($esercizi); $k++) {
            $parole[$k] = Esercizio::findOne(['idEsercizio' => $esercizi[$k]->idEsercizio])->parola;
        }
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->elencoErrori = '';
            $model->cntErrori = 0;
            for ($k = 0; $k < sizeof($esercizi); $k++) {
                if ($_POST['esiti'][$k] == 1) {
                    $model->cntErrori++;
                    $model->elencoErrori .= $parole[$k] . '<br />';
                }
            }
            $model->esito = 'Il paziente ' . Paziente::findOne(['idPaziente' => $paziente])->getNomeECognome() . ' in ' . sizeof($esercizi) . '
            esercizi ha avuto difficoltà con ' . $model->cntErrori . ' parole, ovvero: ' . $model->elencoErrori;
            if ($model->save()) {
                $model->nuovo = 0;
                $model->save();
            }
            return $this->render('congratulazioni', ['paziente' => $paziente]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('svolgi-sessione', [
            'esercizi' => $esercizi, 'model' => $model
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


    public function actionCongratulazioni()
    {
        return $this->render('congratulazioni');
    }
}
