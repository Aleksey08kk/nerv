<?php

namespace app\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use Yii;
use app\models\Task;
use app\models\User;
use app\models\TaskFromViewer;

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

    

    public function actionPlayer()
    {
        $id = Yii::$app->user->identity->id;;
        $model = Task::find()->where('id = :id', [':id' => $id])->one();
        $task = $model->description; 

        return $this->render('player', [
            'task' => $task,
        ]);
    }


    public function actionViewer(){ 
        $model = new TaskFromViewer();
        $userId = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $userId;
            $model->save();
            return $this->redirect(['viewer']);
        }

        $allTasks = TaskFromViewer::find()->all();

        return $this->render('viewer', [
            'allTasks' => $allTasks,
            'model' => $model,
        ]);
    }




    public function actionNoaccess(){ 
        return $this->render('noaccess');
    }
    
    public function actionViewerAccess(){ 
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();

            if ($userModel->role == 3) { // 3 - зритель
                return $this->redirect(['viewer']);
            } else {
                return $this->render('noaccess');
            }
    }

    
    
    

    
    



}

