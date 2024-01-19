<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $video
 * @property string|null $task
 * @property string|null $description
 * @property int|null $like
 * @property int|null $coins
 * @property string|null $date
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'like', 'coins'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['video', 'task'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'video' => 'Video',
            'task' => 'Task',
            'description' => 'Description',
            'like' => 'Like',
            'coins' => 'Coins',
            'date' => 'Date',
        ];
    }
}
