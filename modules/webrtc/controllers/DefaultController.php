<?php

namespace app\modules\webrtc\controllers;

use app\models\CoinsStream;
use app\models\Stream;
use app\models\Task;
use yii\web\Controller;
use Yii;
use app\models\User;

/**
 * Default controller for the `webrtc` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $streamModel = Stream::find()->all();
        return $this->render('index', [
            'streamModel' => $streamModel,
        ]);
    }
   /* public function actionRoomm($myid, $taskid)
    {
        $customer = new Task();
        $customer->user_id = $myid;
        $customer->task_name = $taskid;
        $customer->save();
        $userModel = User::find()->where(['id' => $myid])->one();
        return $this->render('room', [
            'userModel' => $userModel,
            'myid' => $myid,
            'taskid' => $taskid
        ]);
    }
*/
    public function actionRoom()
    {
        $coinsStreamModel = CoinsStream::find()->where(['task_id' => $_GET['room']])->andWhere(['author_stream_id' => $_GET['author']])->one();
        $streamModel = Stream::find()->where(['id' => $_GET['room']])->one();
        return $this->render('room', [
            'streamModel' => $streamModel,
            'coinsStreamModel' => $coinsStreamModel
        ]);
    }

    
    public function actionLobby($taskid, $myid, $author) 
    {
        if(!Stream::find()->where(['user_id' => $myid])->andWhere(['task_id' => $taskid])->one()){
            $customer = new Stream();
            $customer->user_id = $myid;
            $customer->task_id = $taskid;
            $customer->save();
        }
        
        $taskModel = Task::find()->all();
        $userModel = User::find()->where(['id' => $myid])->one();
        $username = $userModel->name;
        return $this->render('lobby', [
            'taskid' => $taskid,
            'myid' => $myid,
            'userModel' => $userModel,
            'taskModel' => $taskModel,
            'username' => $username,
            'author' => $author
        ]);
    }

    public function actionLobbyy($taskid, $username, $author) //функция вызывается из списка стримов
    {
        return $this->render('lobby', [
            'taskid' => $taskid,
            'username' => $username,
            'author' => $author
        ]);
    }


    public function actionCoins()
    {
        $howMoney = 50;
        $task = $_POST['roomid'];
        $author = $_POST['author'];
        $whoPay = Yii::$app->user->identity->id;

        $userPayModel = User::find()->where(['id' => $whoPay])->one();
        if($userPayModel->money > $howMoney){
            $userPayModel->money = $userPayModel->money - $howMoney;
            $userPayModel->save();
        
        if(!CoinsStream::find()->where(['task_id' => $task])->andWhere(['author_stream_id' =>  $author])->one()){
            $coinsModel = new CoinsStream();
            $coinsModel->task_id = $task;
            $coinsModel->author_stream_id = $author;
            $coinsModel->who_pay_id = Yii::$app->user->identity->id;
            $coinsModel->coins = $howMoney;
            $coinsModel->save();
        } else {
            $coinsModel = CoinsStream::find()->where(['task_id' => $task])->andWhere(['author_stream_id' =>  $author])->one();
            $coinsModel->coins = $coinsModel->coins + $howMoney;
            $coinsModel->save(); 
        }
    }
        return true;
    }

    public function actionDelroom($myid, $taskid)
    {
        $streamModel = Stream::find()->where(['user_id' => $myid])->andWhere(['task_id' => $taskid])->one();
        $streamModel->delete();
        return $this->redirect(['/site/index']);
    }
    

}
