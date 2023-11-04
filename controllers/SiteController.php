<?php

namespace app\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\UploadImage;
use yii\web\UploadedFile;
use Yii;
use app\models\Task;
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
    public function actionIndex(){
        return $this->render('index', []);
    }
    public function actionInside(){
        return $this->render('inside', []);
    }

    public function actionViewer()
    {
        return $this->render('viewer');
    }

    public function actionPlayer()
    {
        $id = 1;
        $model = Task::find()->where('id = :id', [':id' => $id])->one();
        $task = $model->description; // достали задание из базы

        return $this->render('player', [
            'task' => $task,
        ]);
    }


    

    

    
    



}

