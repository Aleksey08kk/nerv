<?php

namespace app\controllers;
use app\models\TaskFromViewer;
use app\models\UploadImage;
use app\models\Video;
use Yii;
use app\models\ImageUpLoad;
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
        $userId = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $userId;
            $model->save();
            //return $this->redirect(['viewer']);
        }

        $tasks = TaskFromViewer::find()->all();
        return $this->render('viewer', [
            'tasks' => $tasks,
            'model' => $model,
            'userId' => $userId
        ]);
    }

    public function actionPlayer()
    {
        $model = new TaskFromViewer();
        $userId = Yii::$app->user->identity->id;
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
        //$model = new ImageUpLoad;
        $model = new UploadImage;

        if (Yii::$app->request->isPost) {
            $video = new Video();
            $file = UploadedFile::getInstance($model, 'image');

            if ($video->saveImage($model->uploadFile($file), $taskid, $myid)) {
                return $this->redirect(['/site/index']);
            }
        }
        return $this->render('image', ['model' => $model]);
    }


}



