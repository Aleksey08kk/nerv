<?php

namespace app\controllers;

use app\models\Coins;
use app\models\ImageUpLoad;
use app\models\Like;
use app\models\Subscription;
use app\models\Video;
use yii\web\UploadedFile;
use app\models\Completing;
use app\models\Tape;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use Yii;
use app\models\Stream;
use app\models\Task;
use app\models\User;
use app\models\TaskFromViewer;
use app\models\TaskSearch;
use yii\debug\models\search\Debug;

class SiteController extends Controller
{

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
        $videoModel = Video::find()->orderBy('RAND()')->all();
        $streamModel = Stream::find()->all();
        $myname = "Маскара";
        if(Yii::$app->user->identity){
            $myname = Yii::$app->user->identity->name;
        }
        $myid = 0;
        if(Yii::$app->user->identity){
            $myid = Yii::$app->user->identity->id;
        }
        return $this->render('inside', [
            'streamModel' => $streamModel,
            'videoModel' => $videoModel,
            'myname' => $myname,
            'myid' => $myid
        ]);
    }

    public function actionInside()
    {
        $videoModel = Video::find()->orderBy('RAND()')->all();
        $streamModel = Stream::find()->all();
        $myname = "Маскара";
        if(Yii::$app->user->identity){
            $myname = Yii::$app->user->identity->name;
        }
        $myid = 0;
        if(Yii::$app->user->identity){
            $myid = Yii::$app->user->identity->id;
        }
        return $this->render('inside', [
            'streamModel' => $streamModel,
            'videoModel' => $videoModel,
            'myname' => $myname,
            'myid' => $myid
        ]);
    }

    


    public function actionProfile($userId)
    {
        $userModel = User::find()->where(['id' => $userId])->one();
        $videoModel = Video::find()->where(['user_id' => $userId])->all();
        $subModel = Subscription::find()->where(['to_whom' => $userId])->one();
        
        if(!Yii::$app->user->isGuest){
            $myId = Yii::$app->user->identity->id;
        } else {
            $myId = 0;
        }
        if(Subscription::find()->where(['who' => $myId])->andWhere(['to_whom' => $userId])->one()){
            $subs = true;
        } else {
            $subs = false;
        }
        

        if($myId == $userId){
            return $this->redirect(['myprofile']);
        }

        $subsWho = Subscription::find()->where(['who' => $myId])->all();
        $countWho = count($subsWho);
        $subsWhom = Subscription::find()->where(['to_whom' => $myId])->all();
        $countWhom = count($subsWhom);

        return $this->render('profile', [
            'userModel' => $userModel,
            'videoModel' => $videoModel,
            'countWho' => $countWho,
            'countWhom' => $countWhom,
            'subs' => $subs
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

        $videoModel = Video::find()->where(['user_id' => $myId])->all();

        return $this->render('myprofile', [
            'userModel' => $userModel,
            'myId' => $myId,
            'countWho' => $countWho,
            'countWhom' => $countWhom,
            'videoModel' => $videoModel
        ]);
    }

    

    public function actionSubscribe($otherUser)
    {
        $myid = Yii::$app->user->identity->id;
        $customer = new Subscription();
        $customer->who = $myid;
        $customer->to_whom = $otherUser;
        $customer->save();
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    public function actionUnsubs($otherUser)
    {
        $myid = Yii::$app->user->identity->id;
        $subModel = Subscription::find()->where(['who' => $myid])->andWhere(['to_whom' => $otherUser])->one();
        $subModel->delete();
        return $this->redirect(Yii::$app->request->referrer);
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






    public function actionOnetasks($taskid)
    {
        $taskModel = TaskFromViewer::find()->where(['id' => $taskid])->one();
        $videoModel = Video::find()->where(['task' => $taskModel->proposed_task])->orderBy('RAND()')->all();
        $myid = 0;
        if(Yii::$app->user->identity){
            $myid = Yii::$app->user->identity->id;
        }
        return $this->render('onetasks', [
            'videoModel' => $videoModel,
            'myid' => $myid
        ]);
    }






    public function actionLike()
    {
        if(!Like::find()->where(['video_id' => $_POST['videoid']])->andWhere(['user_id' => Yii::$app->user->identity->id])->one()){
            $customer = Video::find()->where(['id' => $_POST['videoid']])->one();
            $customer->like = $customer->like + 1;
            $customer->save();
        
            $likeModel = new Like();
            $likeModel->video_id = $_POST['videoid'];
            $likeModel->user_id = Yii::$app->user->identity->id;
            $likeModel->save();
        }
            
        return true;
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


    

    
    
    public function actionCoins()
    {
        $videoId = $_POST['videoid'];
        $authorVideoId = $_POST['authorid'];
        $whoPay = Yii::$app->user->identity->id;

        $userPayModel = User::find()->where(['id' => $whoPay])->one();
        if($userPayModel->money == 0){
            Yii::$app->getSession()->setFlash('error', '✖');
            return $this->redirect('index');
        } else {
            $userPayModel->money = $userPayModel->money - 1;
        }
        $userPayModel->save();

        $videoModel = Video::find()->where(['id' => $videoId])->one();
        $videoModel->coins = $videoModel->coins + 1;
        $videoModel->save(); 

        if(!Coins::find()->where(['video_id' => $videoId])->andWhere(['who_pay_id' => Yii::$app->user->identity->id])->one()){
        $coinsModel = new Coins();
        $coinsModel->video_id = $videoId;
        $coinsModel->author_video_id = $authorVideoId;
        $coinsModel->who_pay_id = Yii::$app->user->identity->id;
        $coinsModel->coins = $coinsModel->coins + 1;
        $coinsModel->save();  
        } else {
            $coinsModel = Coins::find()->where(['video_id' => $videoId])->andWhere(['who_pay_id' => Yii::$app->user->identity->id])->one();
            $coinsModel->coins = $coinsModel->coins + 1;
            $coinsModel->save(); 
        }

        if(User::find()->where(['id' => $authorVideoId])->one()){
            $userModel = User::find()->where(['id' => $authorVideoId])->one();
            $userModel->coins_from_viewers = $userModel->coins_from_viewers + 1;
            $userModel->save(); 
        }
        
        return true;
    }


    
}
