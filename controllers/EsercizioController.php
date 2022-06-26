<?php

namespace app\controllers;

use app\models\Esercizio;
use app\models\EsercizioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EsercizioController implements the CRUD actions for Esercizio model.
 */
class EsercizioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Esercizio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EsercizioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Esercizio model.
     * @param string $idEsercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEsercizio),
        ]);
    }

    /**
     * Creates a new Esercizio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Esercizio();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Esercizio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idEsercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEsercizio)
    {
        $model = $this->findModel($idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Esercizio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idEsercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEsercizio)
    {
        $this->findModel($idEsercizio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Esercizio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idEsercizio Id Esercizio
     * @return Esercizio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEsercizio)
    {
        if (($model = Esercizio::findOne(['idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSvolgiesercizio($idEsercizio)
    {
        
        return $this->render('svolgiesercizio', ['esercizio' => Esercizio::findOne(['idEsercizio' => $idEsercizio]) ] );
    }
}
