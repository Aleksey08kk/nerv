<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%like}}`.
 */
class m240205_172449_create_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%like}}', [
            'id' => $this->primaryKey(),
            'video_id'=>$this->integer(),
            'user_id'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%like}}');
    }
}
