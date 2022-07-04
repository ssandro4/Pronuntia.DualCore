<?php

namespace app\controllers;

use Yii;
use app\models\Caregiver;
use app\models\Paziente;
use yii\web\NotFoundHttpException;


class GestioneUtentiController extends \yii\web\Controller
{
    public function actionCreaProfiloCaregiver()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
            //    return $this->redirect(['view-profilo-caregiver', 'idCaregiver' => $model->idCaregiver]);
            return $this->refresh();}
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-profilo-caregiver', [
            'model' => $model,
        ]);
        }

    public function actionCreaProfiloPaziente()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Paziente();
        $model->logopedista=Yii::$app->user->identity->idLogopedista;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-profilo-paziente', 'idPaziente' => $model->idPaziente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-profilo-paziente', [
            'model' => $model,
        ]);
    }

    public function actionEliminaProfiloPaziente($idPaziente)
    {
       
        $model = $this->findModel($idPaziente);
        $model->visibile = false;
        $model->save();

        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionModificaProfiloCaregiver($idCaregiver)
    {
        $model = $this->findPaziente($idCaregiver);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('modifica-profilo-caregiver', [
            'model' => $model,
        ]);
    }

    public function actionModificaProfiloPaziente($idPaziente)
    {
        $model = $this->findPaziente($idPaziente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-profilo-paziente', 'idPaziente' => $model->idPaziente]);
        }

        return $this->render('modifica-profilo-paziente', [
            'model' => $model,
        ]);
    }

    public function actionViewProfiloPaziente($idPaziente)
    {
        return $this->render('view-profilo-paziente', [
            'model' => $this->findPaziente($idPaziente),
        ]);
    }

    protected function findPaziente($idPaziente)
    {
        if (($model = Paziente::findOne(['idPaziente' => $idPaziente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCaregiver($idCaregiver)
    {
        if (($model = Caregiver::findOne(['idCaregiver' => $idCaregiver])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
