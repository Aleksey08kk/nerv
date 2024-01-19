<?php

namespace app\controllers;

use app\models\ImageUpLoad;
use app\models\Subscription;
use yii\web\UploadedFile;
use app\models\Completing;
use app\models\Tape;
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
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
        $tapeModel = Tape::find()->orderBy('RAND()')->all();

        return $this->render('index', [
            'tapeModel' => $tapeModel
        ]);
    }


    public function actionProfile($userId)
    {
        $userModel = User::find()->where(['id' => $userId])->one();
        $myId = Yii::$app->user->identity->id;

        return $this->render('profile', [
            'userModel' => $userModel,
            'myId' => $myId
        ]);
    }

    public function actionMyprofile()
    {
        $myId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $myId])->one();

        $subsWho = Subscription::find()->where(['who' => $myId])->all();
        $countWho = count($subsWho);
        $subsWhom = Subscription::find()->where(['to_whom' => $myId])->all();
        $countWhom = count($subsWhom);

        return $this->render('myprofile', [
            'userModel' => $userModel,
            'myId' => $myId,
            'countWho' => $countWho,
            'countWhom' => $countWhom
        ]);
    }

    public function actionSubscribe($otherUser)
    {
        $myid = Yii::$app->user->identity->id;

        $userModel = User::find()->where(['id' => $otherUser])->one();

        $customer = new Subscription();
        $customer->who = $myid;
        $customer->to_whom = $otherUser;
        $customer->save();
        return $this->render('profile', [
            'userModel' => $userModel,
            'userId' => $otherUser
        ]);
    }

    public function actionSetImage()
    {
        $userId = Yii::$app->user->identity->id;
        $model = new ImageUpLoad;

        if (Yii::$app->request->isPost) {
            $user = User::find()->where(['id' => $userId])->one();
            $file = UploadedFile::getInstance($model, 'image');

            if ($user->saveImagee($model->uploadFile($file, $user->userPhoto))) {
                return $this->redirect(['myprofile']);
            }
        }
        return $this->render('image', ['model' => $model]);
    }






    public function actionOnetasks($tasknum)
    {
        $tasknumber = $tasknum;
        //$tapeModel = Tape::find()->orderBy('RAND()')->all();
        $complModel = Completing::find()->all();


        return $this->render('onetasks', [
            //'tapeModel' => $tapeModel,
            'tasknumber' => $tasknumber,
            'complModel' => $complModel
        ]);
    }




    public function actionRole()
    {
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();
        if ($userModel->role != 2) {
            $userModel->role = 3;
            $userModel->save();

            return $this->redirect('viewer-access');
        }
    }




    public function actionLike($id)
    {
        $customer = TaskFromViewer::find()->where(['id' => $id])->one();
        $like = $customer->like;
        $customer->like = $like + 1;
        $customer->save();
        return $this->redirect(['viewer']);
    }


    public function actionView($id)
    {
        $model = User::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'model' => $model
        ]);
    }
    public function actionUpdate($id)
    {
        $model = User::find()->where(['id' => $id])->one();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['myprofile']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionInside()
    {
        $tapeModel = Tape::find()->orderBy('RAND()')->all();
        return $this->render('inside', [
            'tapeModel' => $tapeModel
        ]);
    }




    
}
