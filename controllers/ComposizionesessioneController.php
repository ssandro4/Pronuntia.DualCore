<?php

namespace app\controllers;

use app\models\Composizionesessione;
use app\models\ComposizionesessioneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComposizionesessioneController implements the CRUD actions for Composizionesessione model.
 */
class ComposizionesessioneController extends Controller
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
     * Lists all Composizionesessione models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ComposizionesessioneSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Composizionesessione model.
     * @param string $sessione Sessione
     * @param string $esercizio Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sessione, $esercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($sessione, $esercizio),
        ]);
    }

    /**
     * Creates a new Composizionesessione model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($sessione)
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

    /**
     * Updates an existing Composizionesessione model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $sessione Sessione
     * @param string $esercizio Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sessione, $esercizio)
    {
        $model = $this->findModel($sessione, $esercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sessione' => $model->sessione, 'esercizio' => $model->esercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Composizionesessione model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $sessione Sessione
     * @param string $esercizio Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sessione, $esercizio)
    {
        $this->findModel($sessione, $esercizio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Composizionesessione model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $sessione Sessione
     * @param string $esercizio Esercizio
     * @return Composizionesessione the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sessione, $esercizio)
    {
        if (($model = Composizionesessione::findOne(['sessione' => $sessione, 'esercizio' => $esercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
