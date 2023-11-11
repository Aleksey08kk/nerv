<?php

namespace app\controllers;


use app\models\Completing;
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

    

public function actionShowVideo($id){ 
        $model = new TaskFromViewer();
        
        $completing = Completing::find()->where(['user_id' => $id])->one();
        $completingNum = $completing->id;
        $completing = Completing::find()->where(['id' => $completingNum])->one();
        $videoOne = $completing->getImageOne();
        $videoTwo = $completing->getImageTwo();
        $videoThree = $completing->getImageThree();
        $videoFour = $completing->getImageFour();
        $videoFive = $completing->getImageFive();
        $videoSix = $completing->getImageSix();
        $videoSeven = $completing->getImageSeven();
        $videoEight = $completing->getImageEight();
        $videoNine = $completing->getImageNine();
        $videoTen = $completing->getImageTen();

        $allTasks = TaskFromViewer::find()->all();
        $allUser = User::find()->where(['role' => 2])->all();

        $userOne = User::find()->where(['id' => $id])->one();


        return $this->render('viewer', [
            'allTasks' => $allTasks,
            'model' => $model,
            'allUser' => $allUser,
            'completing' => $completing,
            'videoOne' => $videoOne,
            'videoTwo' => $videoTwo,
            'videoThree' => $videoThree,
            'videoFour' => $videoFour,
            'videoFive' => $videoFive,
            'videoSix' => $videoSix,
            'videoSeven' => $videoSeven,
            'videoEight' => $videoEight,
            'videoNine' => $videoNine,
            'videoTen' => $videoTen,
            'userOne' => $userOne,
            'taskName' => $taskName
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

        $completing = Completing::find()->where(['id' => 21])->one();
        $videoOne = $completing->getImageOne();

        $allTasks = TaskFromViewer::find()->all();
        $allUser = User::find()->where(['role' => 2])->all();

        return $this->render('viewer', [
            'allTasks' => $allTasks,
            'model' => $model,
            'allUser' => $allUser,
            'completing' => $completing,
            'videoOne' => $videoOne,
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

    
    public function actionLike($id){ 
        $customer = TaskFromViewer::find()->where(['id' => $id])->one();
        $like = $customer->like;
        $customer->like = $like + 1;
        $customer->save();
        return $this->redirect(['viewer']);
    }
    

    
    



}

