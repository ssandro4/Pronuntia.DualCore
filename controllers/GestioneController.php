<?php

namespace app\controllers;

use app\models\Sessione;
use app\models\Composizionesessione;


class GestioneController extends \yii\web\Controller
{
    public function actionCreacomposizione()
    {
        $model = new Composizionesessione();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sessione' => $model->sessione, 'esercizio' => $model->esercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);

        // return $this->render('creacomposizione');
    }

    public function actionCreasessione()
    {
        $sessione = new Sessione();
        $composizione = new Composizionesessione();

        if ($this->request->isPost) {
            if (($sessione->load($this->request->post()) && $sessione->save())||($composizione->load($this->request->post()) && $composizione->save())) {
                
                $composizione->sessione = $sessione->idSessione;
                if ($this->request->isPost) {
                    if ($composizione->load($this->request->post()) && $composizione->save()) {

                        return $this->redirect(['view', 'sessione' => $composizione->sessione, 'esercizio' => $composizione->esercizio]);
                    }
                } else {
                    $composizione->loadDefaultValues();
                }

                return $this->render('creacomposizione', [
                    'composizione' => $composizione,
                ]);
            }
        } else {
            $sessione->loadDefaultValues();
        }

        return $this->render('creasessione', [
            'sessione' => $sessione,
        ]);
    }

    public function actionCreasessionecomposta()
    {
        return $this->render('creasessionecomposta');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
