<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_from_viewer".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $proposed_task
 */
class TaskFromViewer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_from_viewer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['proposed_task'], 'string', 'max' => 255],
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
            'proposed_task' => 'Proposed Task',
        ];
    }

    

}
