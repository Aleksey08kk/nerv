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
    public function actionRoom()
    {
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();
        return $this->render('room', [
            'userModel' => $userModel
        ]);
    }
    public function actionLobby()
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
