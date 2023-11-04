<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m231101_152526_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'task_name'=>$this->string(),
            'description'=>$this->text(),
            'completion_date'=>$this->date(),
            'completion_time'=>$this->time(),
            'image'=>$this->string(),
            'video'=>$this->string(),
            'viewed'=>$this->integer(),
            'user_id'=>$this->integer(),
            'status'=>$this->integer(),
            'price'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
