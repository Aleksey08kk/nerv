<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coins}}`.
 */
class m240213_070753_create_coins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coins}}', [
            'id' => $this->primaryKey(),
            'video_id'=>$this->integer(),
            'author_video_id'=>$this->integer(),
            'who_pay_id'=>$this->integer(),
            'date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coins}}');
    }
}
