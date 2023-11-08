<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_from_viewer}}`.
 */
class m231108_082048_create_task_from_viewer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_from_viewer}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'proposed_task'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_from_viewer}}');
    }
}
