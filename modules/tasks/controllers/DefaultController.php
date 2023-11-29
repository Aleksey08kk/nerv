<?php

namespace app\modules\tasks\controllers;

use app\models\Completing;
use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\Task;
use app\models\ImageUpLoad;
use yii\web\UploadedFile;
use app\models\UploadImage;

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
/*        
        if($userModel->role !== 2){
            $userModel->role = 2; // 2 - роль усера игрок
            $userModel->save();
        }


        $complModel = Completing::find()->where(['user_id' => $userId])->one();
        if (isset($complModel->user_id)) {
            return $this->render('index', [
                'money' => $money,
                'userModel' => $userModel, 
            ]);
        } else {
            $completing = new Completing();
            $completing->user_id = $userId;
            $completing->save();
        }
*/        
$completing = Completing::find()->where(['user_id' => $userId])->one();
$videoOne = $completing->getImageOne();
$videoTwo = $completing->getImageTwo();
$videoThree = $completing->getImageThree();
$videoFour = $completing->getImageFour();
$videoFive = $completing->getImageFive();
$videoSix = $completing->getImageSix();
$videoSeven = $completing->getImageSeven();
$videoEight = $completing->getImageEight();
$videoNine = $completing->getImageNine();

        return $this->render('index', [
                    'money' => $money,
                    'userModel' => $userModel,'videoOne' => $videoOne,
                    'videoTwo' => $videoTwo,
                    'videoThree' => $videoThree,
                    'videoFour' => $videoFour,
                    'videoFive' => $videoFive,
                    'videoSix' => $videoSix,
                    'videoSeven' => $videoSeven,
                    'videoEight' => $videoEight,
                    'videoNine' => $videoNine,
                ]);
    }

    public function actionNoaccessplayer(){
        return $this->render('noaccessplayer');
    }


    public function actionRole(){
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();

        $completing = Completing::find()->where(['user_id' => $userId])->one();
        if (!$completing){
            $completing = new Completing();
            $completing->user_id = $userId;
            $completing->save();
        }
        

        if ($userModel->role <= 2){
            $userModel->role = 2;
            $userModel->save();
            return $this->redirect('access');
        }else {
            return $this->render('noaccessplayer');
    }
}

    public function actionAccess(){
        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();
        $money = $userModel->money;

        $task = Task::find()->all();
        
        $completing = Completing::find()->where(['user_id' => $userId])->one();
        $videoOne = $completing->getImageOne();
        $videoTwo = $completing->getImageTwo();
        $videoThree = $completing->getImageThree();
        $videoFour = $completing->getImageFour();
        $videoFive = $completing->getImageFive();
        $videoSix = $completing->getImageSix();
        $videoSeven = $completing->getImageSeven();
        $videoEight = $completing->getImageEight();
        $videoNine = $completing->getImageNine();

            if ($userModel->role <= 2) { // 2 - игрок
                return $this->render('index', [
                    'userModel' => $userModel, 
                    'money' => $money,
                    'videoOne' => $videoOne,
                    'videoTwo' => $videoTwo,
                    'videoThree' => $videoThree,
                    'videoFour' => $videoFour,
                    'videoFive' => $videoFive,
                    'videoSix' => $videoSix,
                    'videoSeven' => $videoSeven,
                    'videoEight' => $videoEight,
                    'videoNine' => $videoNine,
                    'task' => $task
                ]);
            } else {
                return $this->render('noaccessplayer');
            }
    }


    public function actionSetImage()
    {
        $model = new ImageUpLoad;
        $userId = Yii::$app->user->identity->id;

        if (Yii::$app->request->isPost) {
            $user = User::find()->where(['id' => $userId])->one();
            $file = UploadedFile::getInstance($model, 'image');

            if ($user->saveImage($model->uploadFile($file, $user->userPhoto))) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('image', ['model' => $model]);
    }






    

}
