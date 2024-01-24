<?php

namespace app\modules\webrtc\controllers;

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
        return $this->render('index');
    }
    public function actionRoom($player, $myid)
    {
        $userModel = User::find()->where(['id' => $myid])->one();
        return $this->render('room', [
            'userModel' => $userModel,
            'player' => $player,
            'myid' => $myid
        ]);
    }

    public function actionRoomm()
    {
        return $this->render('room');
    }
    public function actionLobby($id, $myid, $player)
    {
        return $this->render('lobby', [
            'id' => $id,
            'player' => $player,
            'myid' => $myid
        ]);
    }

    public function actionLobbyy()
    {
        return $this->render('lobby');
    }


    public function actionTest($id)
    {
        return $this->render('test', [
            'id' => $id
        ]);
    }
}
