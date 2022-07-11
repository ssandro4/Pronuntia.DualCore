<?php

namespace app\controllers;

use Yii;
use app\models\Assegnazionesessione;
use app\models\Sessione;
use app\models\Paziente;

class ControlloTerapiaController extends \yii\web\Controller
{


    public function actionProgressi($idPaziente)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = Paziente::findOne(['idPaziente' => $idPaziente]);
        if ($model->caregiver != Yii::$app->user->id && $model->logopedista != Yii::$app->user->id)
            return $this->goHome();

        $sessioni = Assegnazionesessione::find()
            ->where(['paziente' => $idPaziente])
            ->orderBy(['dataCreazione' => SORT_DESC])
            ->all();

        for ($k = 0; $k < sizeof($sessioni); $k++) :

            $sessione = Sessione::findOne(['idSessione' => $sessioni[$k]['sessione']]);
            $esercizi[$k] =  $sessione['numEsercizi'];
            $percentuali[$k] = ($sessioni[$k]['cntErrori'] * 100 / $esercizi[$k]);

            if (!isset($esercizi)) {
                $esercizi = 0;
            }
            if (!isset($percentuali)) {
                $percentuali = 0;
            }
        endfor;



        return $this->render('progressi', [
            'model' => $model,
            'sessioni' =>  $sessioni,
            'percentuali' =>  $percentuali,
            'esercizi' =>  $esercizi,
        ]);
    }

    public function actionBacheca()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $sessioni = Assegnazionesessione::find()
            ->join('INNER JOIN', 'paziente', 'paziente.idPaziente = paziente')
            ->where(['nuovo' => '1', 'paziente.logopedista' => Yii::$app->user->id])
            ->orderBy(['paziente' => SORT_DESC])
            ->all();

        for ($k = 0; $k < sizeof($sessioni); $k++) :

            $nomePaziente[$k] = Paziente::findOne(['idPaziente' => $sessioni[$k]->paziente])->nome;
            $cognomePaziente[$k] = Paziente::findOne(['idPaziente' => $sessioni[$k]->paziente])->cognome;
            $idPaziente[$k] = Paziente::findOne(['idPaziente' => $sessioni[$k]->paziente])->idPaziente;

        endfor;

        return $this->render('bacheca', [
            'sessioni' =>  $sessioni, 'nomePaziente' =>  $nomePaziente, 'cognomePaziente' =>  $cognomePaziente, 'idPaziente' =>  $idPaziente,
        ]);
    }

    
    public function actionSessioni($idPaziente)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-caregiver');
        }
        
        $sessioni = Assegnazionesessione::find()
            ->where(['paziente' => $idPaziente])
            ->andwhere(['nuovo' => 1])
            ->orderBy(['paziente' => SORT_DESC])
            ->all();

            $nomePaziente = Paziente::findOne(['idPaziente' => $idPaziente])->nome;
            $cognomePaziente = Paziente::findOne(['idPaziente' => $idPaziente])->cognome;

        return $this->render('sessioni', [
            'sessioni' =>  $sessioni,'idPaziente' =>  $idPaziente,'nomePaziente' =>  $nomePaziente, 'cognomePaziente' =>  $cognomePaziente,
        ]);
    }

}
