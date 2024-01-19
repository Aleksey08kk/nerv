<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tape}}`.
 */
class m231209_054501_create_tape_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tape}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'video'=>$this->string(),
            'date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tape}}');
    }
}
