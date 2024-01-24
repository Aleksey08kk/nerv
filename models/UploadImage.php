<?php

namespace app\models;

use yii\base\Model;
use Yii;

class UploadImage extends Model{

    public $image;

    public function rules(){
        return[
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'png, jpg, mp4, MOV, AVI, MPEG-4'],
        ];
    }

    

    public function uploadFile($file){

        $this->image = $file;
        return $this->saveImage();
    }

    public function getFolder()
    {
        return Yii::getAlias('@webroot') . '/uploads/';
    }

    public function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage){
        if($this->fileExists($currentImage))
        {
            @unlink(Yii::getAlias('@webroot') . '/uploads/' . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
            return file_exists($this->getFolder() . $currentImage);
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }

}
