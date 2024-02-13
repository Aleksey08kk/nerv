<?php

namespace app\modules\webrtc\controllers;

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
        return $this->render('room');
    }
    public function actionLobby($taskid, $myid) 
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
            'username' => $username
        ]);
    }

    public function actionLobbyy($taskid, $username) //функция вызывается из списка стримов
    {
        return $this->render('lobby', [
            'taskid' => $taskid,
            'username' => $username
        ]);
    }


    public function actionTest($id)
    {
        return $this->render('test', [
            'id' => $id
        ]);
    }

    public function actionDelroom($myid, $taskid)
    {
        $streamModel = Stream::find()->where(['user_id' => $myid])->andWhere(['task_id' => $taskid])->one();
        $streamModel->delete();
        return $this->redirect(['/site/index']);
    }
    

}
