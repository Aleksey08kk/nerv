<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coins_stream".
 *
 * @property int $id
 * @property int|null $task_id
 * @property int|null $author_stream_id
 * @property int|null $who_pay_id
 * @property int|null $coins
 * @property string|null $date
 */
class CoinsStream extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coins_stream';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'author_stream_id', 'who_pay_id', 'coins'], 'integer'],
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
            'task_id' => 'Task ID',
            'author_stream_id' => 'Author Stream ID',
            'who_pay_id' => 'Who Pay ID',
            'coins' => 'Coins',
            'date' => 'Date',
        ];
    }
}
