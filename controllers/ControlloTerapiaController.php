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
        $model = Paziente::findOne(['idPaziente' => $idPaziente]);

        $sessioni= Assegnazionesessione::find()
            ->where(['paziente' => $idPaziente])
            ->orderBy(['dataCreazione'=> SORT_DESC])
            ->all();

            for ($k = 0; $k < sizeof($sessioni); $k++) : 

                $sessione = Sessione::findOne(['idSessione' => $sessioni[$k]['sessione']]);
                $esercizi[$k] =  $sessione['numEsercizi'] ;
                $percentuali[$k] = ($sessioni[$k]['cntErrori'] * 100 / $esercizi[$k]) ;

                if(!isset($esercizi)){
                    $esercizi = 0;
                    }
                    if(!isset($percentuali)){
                    $percentuali =0;
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

        $sessioni= Assegnazionesessione::find()
        ->where(['nuovo' => '1'])
        ->orderBy(['paziente'=> SORT_DESC])
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
    
}
