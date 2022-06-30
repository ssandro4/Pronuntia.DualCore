<?php

namespace app\controllers;

use Yii;
use app\models\Paziente;
use app\models\PazienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PazienteController implements the CRUD actions for Paziente model.
 */
class PazienteController extends Controller
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
     * Lists all Paziente models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PazienteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paziente model.
     * @param int $idPaziente Id Paziente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPaziente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPaziente),
        ]);
    }

    /**
     * Creates a new Paziente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Paziente();
        $model->logopedista=Yii::$app->user->identity->idLogopedista;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idPaziente' => $model->idPaziente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paziente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPaziente Id Paziente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPaziente)
    {
        $model = $this->findModel($idPaziente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPaziente' => $model->idPaziente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paziente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPaziente Id Paziente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPaziente)
    {
       
        $model = $this->findModel($idPaziente);
        $model->visibile = false;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paziente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPaziente Id Paziente
     * @return Paziente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPaziente)
    {
        if (($model = Paziente::findOne(['idPaziente' => $idPaziente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
