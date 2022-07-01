<?php

namespace app\controllers;

use Yii;
use app\models\Sessione;
use app\models\SessioneSearch;
use app\models\Composizionesessione;
use app\models\ComposizionesessioneSearch;
use app\controllers\ComposizionesessioneController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * SessioneController implements the CRUD actions for Sessione model.
 */
class SessioneController extends Controller
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
     * Lists all Sessione models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SessioneSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sessione model.
     * @param string $idSessione Id Sessione
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idSessione)
    {
        $searchModel = new ComposizionesessioneSearch();
       // $dataProvider = $searchModel->search($this->request->queryParams);
       $dataProvider = $searchModel->searchBySessione($idSessione);

        return $this->render('composizione', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Sessione model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model1 = new Sessione();
        $model1->logopedista=Yii::$app->user->identity->idLogopedista;
        if ($this->request->isPost) {
            if ($model1->load($this->request->post()) && $model1->save()) {
                if (!Sessione::findOne('idSessione' == $model1->idSessione)->getComposizionesessiones()->all())
                return Yii::$app->runAction('composizionesessione/create', ['sessione'=>$model1->idSessione]);
            return $this->redirect(['view', 'idSessione' => $model1->idSessione]);
            }
        } else {
            $model1->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model1,
        ]);
    }

    /**
     * Updates an existing Sessione model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idSessione Id Sessione
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idSessione)
    {
        $model = $this->findModel($idSessione);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSessione' => $model->idSessione]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sessione model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idSessione Id Sessione
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSessione)
    {
        $this->findModel($idSessione)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sessione model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idSessione Id Sessione
     * @return Sessione the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSessione)
    {
        if (($model = Sessione::findOne(['idSessione' => $idSessione])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
