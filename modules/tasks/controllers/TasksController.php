<?php

namespace app\modules\tasks\controllers;

use app\models\Task;
use app\models\Tape;
use app\models\Completing;
use app\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadImage;
use app\models\User;
use yii\web\UploadedFile;
use Yii;
use yii\helpers\ArrayHelper;
use app\models\UploadForm;
use app\models\ImageUpLoad;

/**
 * TasksController implements the CRUD actions for Task model.
 */
class TasksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Task models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $tasks = Task::find()->all();

        $userId = Yii::$app->user->identity->id;
        $userModel = User::find()->where(['id' => $userId])->one();
        $userCountTasks = $userModel->cout_task;

        return $this->render('index', [
            'tasks' => $tasks,
            'userCountTasks' => $userCountTasks
        ]);
    }

    /**
     * Displays a single Task model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSuccess($id)
    {
        $price = Task::find()->where('id = :id', [':id' => $id])->one();
        $taskPrice = $price->price;

        return $this->render('success', [
            'taskPrice' => $taskPrice
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSetImage($id){ // эта для загрузки фото из админки
        $model = new UploadImage();
    if(Yii::$app->request->isPost){

        $product = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            if ($product->saveImage($model->uploadFile($file))) {
                return $this->redirect(['view', 'id' => $product->id]);
            }
        }
        return $this->render('image', ['model' => $model]);
    }


    public function actionImage($id) 
    {
        $taskDescription = Task::find()->where('id = :id', [':id' => $id])->one();
        $userId = Yii::$app->user->identity->id;
        $customer = Task::find()->where(['id' => $id])->one();
        $taskPrice = $customer->price;
        $player = User::find()->where(['id' => $userId])->one();

        $model = new UploadImage();
        
    if(Yii::$app->request->isPost){

            $task = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

          //  $task->status = 1;
           // $task->save();

            $taskPrice = Task::find()->where(['id' => $id])->one();
            $customer = User::find()->where(['id' => $userId])->one();

            $taskCount = $customer->cout_task;
            $customer->cout_task = $taskCount + 1;

            $money = $customer->money;
            $customer->money = $taskPrice->price + $money;
            $customer->save();

            $numberTask = Task::find()->where(['id' => $id])->one();
            $numberTask = $numberTask->number;
            $completingId = Completing::find()->where(['user_id' => $userId])->one();

            $video = 'video'; //столбец куда сохраняет видео. он идет как аргумент в saveImage
            $tape = new Tape();
            $tape->saveImage($model->uploadFile($file), $video, $userId, $player, $numberTask); //вот сюда video приходит

        if($completingId->id){
            $completingId->saveImage($model->uploadFile($file), $numberTask);
            return $this->redirect(['success' , 'taskPrice' => $taskPrice, 'id' => $id]);
        }
        }
        return $this->render('image', [
            'model' => $model,
            'taskDescription' => $taskDescription
        ]);
    }





    public function actionAgain(){
        $userId = Yii::$app->user->id;
        $customer = User::find()->where(['id' => $userId])->one();
        $customer->money = 0;
        $customer->cout_task = 0;
        $customer->save();
        return $this->redirect(['/site/inside']);
    }
    
}
