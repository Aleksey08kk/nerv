<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stream}}`.
 */
class m240131_180243_create_stream_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stream}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'task_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stream}}');
    }
}
