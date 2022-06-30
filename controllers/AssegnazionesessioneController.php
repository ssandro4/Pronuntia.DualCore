<?php

namespace app\controllers;

use app\models\Assegnazionesessione;
use app\models\AssegnazionesessioneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssegnazionesessioneController implements the CRUD actions for Assegnazionesessione model.
 */
class AssegnazionesessioneController extends Controller
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
     * Lists all Assegnazionesessione models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssegnazionesessioneSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assegnazionesessione model.
     * @param string $sessione Sessione
     * @param int $paziente Paziente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sessione, $paziente)
    {
        return $this->render('view', [
            'model' => $this->findModel($sessione, $paziente),
        ]);
    }

    /**
     * Creates a new Assegnazionesessione model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Assegnazionesessione();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sessione' => $model->sessione, 'paziente' => $model->paziente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assegnazionesessione model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $sessione Sessione
     * @param int $paziente Paziente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sessione, $paziente)
    {
        $model = $this->findModel($sessione, $paziente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sessione' => $model->sessione, 'paziente' => $model->paziente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assegnazionesessione model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $sessione Sessione
     * @param int $paziente Paziente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sessione, $paziente)
    {
        $this->findModel($sessione, $paziente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assegnazionesessione model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $sessione Sessione
     * @param int $paziente Paziente
     * @return Assegnazionesessione the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sessione, $paziente)
    {
        if (($model = Assegnazionesessione::findOne(['sessione' => $sessione, 'paziente' => $paziente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
