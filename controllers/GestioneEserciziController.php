<?php

namespace app\controllers;

use Yii;
use app\models\Parola;
use app\models\ParolaSearch;
use app\models\Assegnazionesessione;
use app\models\Composizionesessione;
use app\models\ComposizionesessioneSearch;
use app\models\Sessione;
use app\models\Esercizio;
use app\models\Paziente;
use app\models\Caregiver;
use app\models\EsercizioSearch;
use app\models\Logopedista;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;

class GestioneEserciziController extends \yii\web\Controller
{
    public function actionAggiungiParola()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $model = new Parola();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect('vocabolario');
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
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $model = new Parola();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(Url::previous());
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('aggiungi-parola', [
            'model' => $model,
        ]);
    }

    public function actionVocabolario()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }
        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $searchModel = new ParolaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('vocabolario', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreaEsercizio()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $model = new Esercizio();
        $model->logopedista = Yii::$app->user->identity->id;
        Url::remember();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $searchModel = new EsercizioSearch();
                $dataProvider = $searchModel->searchByLogopedista(Yii::$app->user->identity->id);
                return $this->render('lista-esercizi', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $model = new Esercizio();
        $model->logopedista = Yii::$app->user->identity->id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(Url::previous());
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('crea-esercizio-popup', [
            'model' => $model,
        ]);
    }

    public function actionCreaSessione() //e componila
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $model1 = new Sessione();
        $model1->logopedista = Yii::$app->user->identity->id;
        if ($this->request->isPost) {
            if ($model1->load($this->request->post()) && $model1->save()) {
                //  return $this->actionComponiSessione($model1->idSessione);
                return $this->redirect(['componi-sessione', 'sessione' => $model1->idSessione]);
                //return $this->redirect(['view', 'idSessione' => $model1->idSessione]);
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
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        $numEsercizi = $this->findSessione($sessione)->numEsercizi;
        $arrModels = array();
        for ($k = 0; $k < $numEsercizi; $k++) {
            $model = new Composizionesessione();
            $model->sessione = $sessione;
            $arrModels[] = $model;
        }
        Url::remember();
        if ($this->request->isPost) {

            for ($k = 0; $k < $numEsercizi; $k++) {
                $arrModels[$k]->esercizio = $_POST['Composizionesessione'][$k]['esercizio'];
                $arrModels[$k]->save();
            }
            return $this->render('request-assegnazione', ['sessione' => $sessione]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('componi-sessione', [
            'arrModels' => $arrModels,
        ]);
    }


    public function actionAssegnaSessione($sessione = null, $paziente = null)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $model = new Assegnazionesessione();
        $model->sessione = $sessione;
        $model->paziente = $paziente;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $paziente = Paziente::findOne(['idPaziente' => $model->paziente]);
                $emailCG = $paziente->getCaregiver0()->one()->email;
                $logopedista = Logopedista::findOne(['idLogopedista' => Yii::$app->user->identity->id]);
                Yii::$app->mailer->compose()
                    ->setTo($emailCG)
                    ->setFrom([$logopedista->email => 'Dott.(ssa) ' . $logopedista->nome . ' ' . $logopedista->cognome])
                    ->setSubject('Pronuntia: ci sono nuovi esercizi')
                    ->setHtmlBody('Salve,<br/>su Pronuntia sono disponibili nuovi esercizi da svolgere per ' . $paziente->getNomeECognome() . '.<br/>
                Eseguiteli al più presto!<br/><br/><i>' . $logopedista->nome . ' ' . $logopedista->cognome . '</i>')
                    ->send();
                return $this->redirect(['/controllo-terapia/bacheca']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('assegna-sessione', [
            'model' => $model,
        ]);
    }


     public function actionModificaParola($idParola)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $model = $this->findParola($idParola);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect('vocabolario');
        }

        return $this->render('modifica-parola', [
            'model' => $model,
        ]);
    }

    public function actionViewEsercizi()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }

        $searchModel = new EsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view-esercizi', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewSessione($idSessione)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login-logopedista');
        }

        if (Yii::$app->user->identity->tipo == 'caregiver') {
            return $this->goHome();
        }
        if (Sessione::findOne(['idSessione' => $idSessione])->logopedista != Yii::$app->user->id) {
            return $this->goHome();
        }
        $searchModel = new ComposizionesessioneSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = $searchModel->searchBySessione($idSessione);

        return $this->render('view-sessione', [
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
    protected function findSessione($idSessione)
    {
        if (($model = Sessione::findOne(['idSessione' => $idSessione])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
