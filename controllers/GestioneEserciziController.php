<?php

namespace app\controllers;

use Yii;
use app\models\Parola;
use app\models\Assegnazionesessione;
use app\models\Composizionesessione;
use app\models\ComposizionesessioneSearch;
use app\models\Sessione;
use app\models\Esercizio;
use app\models\EsercizioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GestioneEserciziController extends \yii\web\Controller
{
    public function actionAggiungiParola()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Parola();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('aggiungi-parola', [
            'model' => $model,
        ]);
    }

    public function actionAggiungiParolaPopup()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Parola();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('aggiungi-parola', [
            'model' => $model,
        ]);
    }

    
    public function actionCreaEsercizio()
    {
        $model = new Esercizio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-esercizio', [
            'model' => $model,
        ]);
    }

    public function actionCreaEsercizioPopup()
    {
        $model = new Esercizio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-esercizio', [
            'model' => $model,
        ]);
    }

    public function actionCreaSessione() //e componila
    {
        $model1 = new Sessione();
        $model1->logopedista=Yii::$app->user->identity->idLogopedista;
        if ($this->request->isPost) {
            if ($model1->load($this->request->post()) && $model1->save()) {
                if (!Sessione::findOne('idSessione' == $model1->idSessione)->getComposizionesessiones()->all())
                return $this->actionComponiSessione($model1->idSessione);
                //return Yii::$app->runAction('componi-sessione', ['sessione'=>$model1->idSessione]);
            return $this->redirect(['view', 'idSessione' => $model1->idSessione]);
            }
        } else {
            $model1->loadDefaultValues();
        }

        return $this->render('crea-sessione', [
            'model' => $model1,
        ]);
    }   

    public function actionComponiSessione($sessione)
    {
        $model = new Composizionesessione();
        $model->sessione = $sessione;
        
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
    
    }

    public function actionAssegnaSessione()
    {
        $model = new Assegnazionesessione();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sessione' => $model->sessione, 'paziente' => $model->paziente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('assegna-sessione', [
            'model' => $model,
        ]);
    }
    

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionModificaParola($idParola)
    {
        $model = $this->findParola($idParola);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('modifica-parola', [
            'model' => $model,
        ]);
    }

    public function actionViewEsercizi()
    {
        
        $searchModel = new EsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view-esercizi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewSessione($idSessione)
    {
        $searchModel = new ComposizionesessioneSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = $searchModel->searchBySessione($idSessione);
 
         return $this->render('composizione', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
    }
    protected function findParola($idParola)
    {
        if (($model = Parola::findOne(['idParola' => $idParola])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
