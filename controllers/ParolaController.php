<?php

namespace app\controllers;

use app\models\Parola;
use app\models\ParolaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ParolaController implements the CRUD actions for Parola model.
 */
class ParolaController extends Controller
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
     * Lists all Parola models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ParolaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parola model.
     * @param string $idParola Id Parola
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idParola)
    {
        return $this->render('view', [
            'model' => $this->findModel($idParola),
        ]);
    }

    /**
     * Creates a new Parola model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Parola();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idParola' => $model->idParola]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Parola model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idParola Id Parola
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idParola)
    {
        $model = $this->findModel($idParola);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idParola' => $model->idParola]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Parola model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idParola Id Parola
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idParola)
    {
        $this->findModel($idParola)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Parola model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idParola Id Parola
     * @return Parola the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idParola)
    {
        if (($model = Parola::findOne(['idParola' => $idParola])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
