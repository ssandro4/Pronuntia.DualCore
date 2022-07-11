<?php

namespace app\controllers;

use Yii;
use app\models\Caregiver;
use app\models\Paziente;
use app\models\PazienteSearch;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;


class GestioneUtentiController extends \yii\web\Controller
{
    public function actionCreaProfiloCaregiver()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //    return $this->redirect(['view-profilo-caregiver', 'idCaregiver' => $model->idCaregiver]);
                return $this->redirect('index-logopedista');
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
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
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
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        Url::remember();
        $model = new Paziente();
        $model->logopedista = Yii::$app->user->identity->id;
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
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        $model = $this->findPaziente($idPaziente);
        if ($model->logopedista != Yii::$app->user->id) {
            return $this->goHome();
        }
        $model->visibile = false;
        $model->save();

        return $this->redirect(['index-logopedista']);
    }

    public function actionIndexLogopedista()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $searchModel = new PazienteSearch();
        $dataProvider = $searchModel->searchByLogopedista(Yii::$app->user->identity->id);

        return $this->render('index-logopedista', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexCaregiver()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-caregiver');
        }
        if (Yii::$app->user->identity->tipo == 'logopedista') {
            return $this->goHome();
        }
        $pazienti = Caregiver::findOne(['idCaregiver' => Yii::$app->user->identity->id])->getPazientes()->all();
        return $this->render('index-caregiver', ['pazienti' => $pazienti]);
    }

    public function actionModificaProfiloCaregiver($idCaregiver)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-caregiver');
        }
        if (Yii::$app->user->identity->tipo == 'logopedista') {
            return $this->goHome();
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
            return $this->goHome();
        }
        $model = $this->findPaziente($idPaziente);
        if (Yii::$app->user->identity->id != $model->caregiver)
            return $this->redirect('/site/index');
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (Yii::$app->user->identity->tipo == 'logopedista') {
                return $this->redirect('index-logopedista');
            } else if (Yii::$app->user->identity->tipo == 'caregiver') {
                return $this->redirect('index-caregiver');
            }
        }

        return $this->render('modifica-profilo-paziente', [
            'model' => $model,
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
