<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coins_stream}}`.
 */
class m240227_120117_create_coins_stream_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coins_stream}}', [
            'id' => $this->primaryKey(),
            'task_id'=>$this->integer(),
            'author_stream_id'=>$this->integer(),
            'who_pay_id'=>$this->integer(),
            'coins'=>$this->integer(),
            'date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coins_stream}}');
    }
}
