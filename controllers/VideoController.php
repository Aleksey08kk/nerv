<?php

namespace app\controllers;

use app\models\TaskFromViewer;
use app\models\UploadImage;
use app\models\Video;
use Yii;
use yii\web\UploadedFile;

class VideoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionViewer()
    {
        $model = new TaskFromViewer();
        if(!Yii::$app->user->isGuest){
            $userId = Yii::$app->user->identity->id;
        } else {
            $userId = 0;
        }
        if(!Yii::$app->user->isGuest){
            $admin = Yii::$app->user->identity->isAdmin;
        } else {
            $admin = 0;
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $userId;
            $model->save();
            //return $this->redirect(['viewer']);
        }

        $tasks = TaskFromViewer::find()->all();
        return $this->render('viewer', [
            'tasks' => $tasks,
            'model' => $model,
            'userId' => $userId,
            'admin' => $admin
        ]);
    }

    public function actionPlayer()
    {
        $model = new TaskFromViewer();
        if(!Yii::$app->user->isGuest){
            $userId = Yii::$app->user->identity->id;
        } else {
            $userId = 0;
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $userId;
            $model->save();
            // return $this->redirect(['player']);
        }

        $tasks = TaskFromViewer::find()->all();
        return $this->render('player', [
            'tasks' => $tasks,
            'model' => $model,
            'userId' => $userId
        ]);
    }



    public function actionView($id)
    {
        $model = TaskFromViewer::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = TaskFromViewer::find()->where(['id' => $id])->one();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['viewer']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $model = TaskFromViewer::find()->where(['id' => $id])->one()->delete();
        return $this->redirect(['viewer']);
    }



    public function actionSetImage($taskid, $myid)
    {
        $model = new UploadImage;

        if (Yii::$app->request->isPost) {
            $video = new Video();
            $file = UploadedFile::getInstance($model, 'image');

            if ($video->saveImage($model->uploadFile($file), $taskid, $myid)) {
                return $this->redirect(['/site/myprofile']);
            }
        }
        return $this->render('image', ['model' => $model]);
    }

    public function actionStars()
    {
        $model = TaskFromViewer::find()->where(['id' => $_POST['id']])->one();
        $oldCountVote = $model->count_vote; 
        $oldStars = $model->stars;
        $model->count_vote = $_POST['coutVote'] + $oldCountVote;
        $model->stars = $_POST['stars'] + $oldStars;
        $model->save();

        return true;
    }
    
}
