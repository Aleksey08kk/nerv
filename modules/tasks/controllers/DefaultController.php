<?php

namespace app\modules\tasks\controllers;

use app\models\Completing;
use yii\web\Controller;
use Yii;
use app\models\User;

/**
 * Default controller for the `tasks` module
 */
class DefaultController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $userId = Yii::$app->user->identity->id;

        $userModel = User::find()->where(['id' => $userId])->one();
        $money = $userModel->money;

        
        if($userModel->role !== 2){
            $userModel->role = 2; // 2 - роль усера игрок
            $userModel->save();
        }

        $completing = new Completing(); // создается новая запись с новым игроком для заполнения базы заданиями
        $completingId = Completing::find()->where(['user_id' => $userId])->one();
        if(!$completingId->id){
            $completing->user_id = $userId;
            $completing->save();
        }
    
        return $this->render('index', [
                    'money' => $money
                ]);
    }

    public function actionNoaccessplayer(){
        return $this->render('noaccessplayer');
    }


    public function actionAccess(){
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();

            if ($userModel->role <= 2) { // 2 - игрок
                return $this->redirect(['index']);
            } else {
                return $this->render('noaccessplayer');
            }
    }

}
