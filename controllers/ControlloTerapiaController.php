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

        return $this->render('progressi', [
            'model' => $model, 'sessioni' =>  $sessioni,
        ]);
    }
}
