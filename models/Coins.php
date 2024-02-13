<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coins".
 *
 * @property int $id
 * @property int|null $video_id
 * @property int|null $author_video_id
 * @property int|null $who_pay_id
 * @property string|null $date
 * @property int|null $coins
 */
class Coins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'author_video_id', 'who_pay_id', 'coins'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'author_video_id' => 'Author Video ID',
            'who_pay_id' => 'Who Pay ID',
            'date' => 'Date',
            'coins' => 'Coins',
        ];
    }
}
