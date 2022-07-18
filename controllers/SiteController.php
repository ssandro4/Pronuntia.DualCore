<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginFormLogopedista;
use app\models\LoginFormCaregiver;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login actions.
     *
     * @return Response|string
     */
    
    public function actionLoginLogopedista()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->tabellaAccessi();
        $model = new LoginFormLogopedista();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login-logopedista', [
            'model' => $model,
        ]);
    }

    public function actionLoginCaregiver()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->tabellaAccessi();
        $model = new LoginFormCaregiver();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login-caregiver', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    



    public function actionQuestionario()
    {
        return $this->render('questionario');
    }

    public function actionDownloadquestionario()
    {
    return Yii::$app->response->sendFile(Yii::getAlias('@app/src/tvl.pdf'));
    }
    
  

    protected function tabellaAccessi()
    {
        Yii::$app->db->createCommand('drop table if exists utente;')->execute();
        Yii::$app->db->createCommand('CREATE TABLE utente AS SELECT * FROM
        (SELECT 
            idLogopedista AS id, email, password, authkey,  "logopedista" as tipo
        FROM
            logopedista UNION SELECT 
            idCaregiver AS id, email, password, authkey, "caregiver" as tipo
        FROM
            caregiver) a;')->execute();
        Yii::$app->db->createCommand('ALTER TABLE utente 
            ADD PRIMARY KEY (`id`);')->execute();
    }
}
