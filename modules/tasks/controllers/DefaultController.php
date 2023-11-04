<?php

namespace app\modules\tasks\controllers;

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
        $customer = new User();
        $customer = User::find()->where(['id' => $userId])->one();
        $money = $customer->money;

        return $this->render('index', [
            'money' => $money
        ]);
    }
}
