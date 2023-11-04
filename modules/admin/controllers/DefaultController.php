<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\UploadImage;
use yii\web\UploadedFile;
use Yii;

/**
 * Default controller for the `admin` module
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

    
    
}
