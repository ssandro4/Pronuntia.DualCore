<?php

namespace app\controllers;

use Yii;
use app\models\Caregiver;
use app\models\Paziente;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;


class GestioneUtentiController extends \yii\web\Controller
{
    public function actionCreaProfiloCaregiver()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //    return $this->redirect(['view-profilo-caregiver', 'idCaregiver' => $model->idCaregiver]);
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-profilo-caregiver', [
            'model' => $model,
        ]);
    }
    public function actionCreaProfiloCaregiverPopup()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //    return $this->redirect(['view-profilo-caregiver', 'idCaregiver' => $model->idCaregiver]);
                return $this->redirect(Url::previous());
            }
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
            return $this->redirect('/site/login-logopedista');
        }
        Url::remember();
        $model = new Paziente();
        $model->logopedista = Yii::$app->user->identity->idLogopedista;
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-caregiver');
        }
        if (Yii::$app->user->identity->id != $idCaregiver)
            return $this->redirect('/site/index');
        $model = $this->findCaregiver($idCaregiver);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('modifica-profilo-caregiver', [
            'model' => $model,
        ]);
    }

    public function actionModificaProfiloPaziente($idPaziente)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/index');
        }
        $model = $this->findPaziente($idPaziente);
        if (Yii::$app->user->identity->id != $model->caregiver)
            return $this->redirect('/site/index');
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
