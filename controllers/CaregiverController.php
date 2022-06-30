<?php

namespace app\controllers;

use Yii;
use app\models\Caregiver;
use app\models\CaregiverSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaregiverController implements the CRUD actions for Caregiver model.
 */
class CaregiverController extends Controller
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
     * Lists all Caregiver models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CaregiverSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caregiver model.
     * @param int $idCaregiver
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCaregiver)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCaregiver),
        ]);
    }

    /**
     * Creates a new Caregiver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCaregiver' => $model->idCaregiver]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Caregiver model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCaregiver
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCaregiver)
    {
        $model = $this->findModel($idCaregiver);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCaregiver' => $model->idCaregiver]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Caregiver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCaregiver
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idCaregiver)
    {
     
        $model = $this->findModel($idCaregiver);
        $model->visibile = false;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caregiver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCaregiver
     * @return Caregiver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCaregiver)
    {
        if (($model = Caregiver::findOne(['idCaregiver' => $idCaregiver])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
