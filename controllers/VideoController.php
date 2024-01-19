<?php

namespace app\controllers;
use app\models\Task;
use app\models\TaskFromViewer;
use app\models\User;
use Yii;
use yii\web\NotFoundHttpException;

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
            return $this->redirect(['viewer']);
        }

        $tasks = TaskFromViewer::find()->all();
        return $this->render('viewer', [
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

}



