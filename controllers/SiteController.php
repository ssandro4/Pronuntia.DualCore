<?php

namespace app\controllers;

use app\models\Caregiver;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\LoginFormLogopedista;
use app\models\LoginFormCaregiver;
use app\models\User;

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
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLoginselect()
    {
        return $this->render('loginselect');
        
    }


    public function actionQuestionario()
    {
        return $this->render('questionario');
    }

    public function actionDownloadquestionario()
    {
    return Yii::$app->response->sendFile(Yii::getAlias('@app/src/tvl.pdf'));
    }
    
    public function actionSay()
    {
        
        return $this->render('say');
    }

    
    public function actionAggiungicaregiver()
    {
        $model = new \app\models\Caregiver();
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
    
        return $this->render('aggiungicaregiver', [
            'model' => $model,
        ]);
    }
    
    public function actionAggiungiparola()
    {
        $model = new \app\models\Parola();
    
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
    
        return $this->render('aggiungiparola', [
            'model' => $model,
        ]);
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
