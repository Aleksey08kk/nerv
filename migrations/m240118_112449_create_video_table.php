<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video}}`.
 */
class m240118_112449_create_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'video'=>$this->string(),
            'task'=>$this->string(),
            'description'=>$this->text(),
            'like'=>$this->integer(),
            'coins'=>$this->integer(),
            'date' => $this->dateTime()->defaultValue(new \yii\db\Expression('NOW()'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video}}');
    }
}
